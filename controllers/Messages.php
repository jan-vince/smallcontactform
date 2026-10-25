<?php namespace Janvince\SmallContactform\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use JanVince\SmallContactForm\Models\Settings;
use JanVince\SmallContactForm\Models\Message;
use Flash;
use App;
use Carbon\Carbon;
use Redirect;
use Backend;
use Response;
use View;
use ApplicationException;


/**
 * Messages Back-end Controller
 */
class Messages extends Controller
{
  public $requiredPermissions = ['janvince.smallcontactform.access_messages'];

    public $implement = [
        'Backend.Behaviors.ListController',
        'Backend\Behaviors\FormController',
        'Backend.Behaviors.ImportExportController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $importExportConfig = 'config_export.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('JanVince.SmallContactForm', 'smallcontactform', 'messages');
    }

    public function update($recordId, $context = null)
    {
        parent::update($recordId, $context);

        /**
         * Mark message as read on opening
         */
        $message = Message::find( $recordId );

        if ( $message ) {

            $this->vars['message'] = $message;
            $message->new_message = 0;
            $message->save();

        } else{

            Flash::error( e( trans( 'janvince.smallcontactform::lang.controller.preview.record_not_found') ) );
            return Redirect::to( Backend::url( 'janvince/smallcontactform/messages' ) );

        }

        $formSettings = Settings::instance();
        
        $this->vars['formFields'] = $formSettings->form_fields;
        
        $formFieldsDetails = [];
        
        foreach( $formSettings->form_fields as $field ) {
          
          $formFieldsDetails[$field['name']] = $field;
          
        }
        
        $this->vars['formFieldsDetails'] = $formFieldsDetails;

    }

  /**
   * Generate messages statsitics
   * @param $part
   */
  public function getRecordsStats( $part ){

        switch( $part ){

            case 'all_count':
              return Message::count();
            break;

            case 'read_count':
              return Message::isRead()->count();
            break;

            case 'new_count':
              return Message::isNew()->count();
            break;

            case 'latest_message_date':

              $data = Message::orderBy( 'created_at', 'DESC' )->first();

              if ( !empty( $data->created_at ) ) {
                Carbon::setLocale( App::getLocale() );
                return Carbon::createFromFormat( 'Y-m-d H:i:s', $data->created_at )->diffForHumans();
              }

              return NULL;
            break;

            case 'latest_message_name':
              $data = Message::orderBy( 'created_at', 'DESC' )->first();

              if( !empty( $data->name ) ) {
                return $data->name;
              }

              return NULL;
            break;

            default:
              return NULL;
            break;

        }

  }

  /**
     * Preview page view
     * @param $id
     */
    public function preview( $id ){

    $message = Message::find( $id );

        if ( $message ) {

            $this->vars['message'] = $message;
            $message->new_message = 0;
            $message->save();

        } else{

            Flash::error( e( trans( 'janvince.smallcontactform::lang.controller.preview.record_not_found') ) );
            return Redirect::to( Backend::url( 'janvince/smallcontactform/messages' ) );

        }

    }

    /**
     * Index page view
     */
    public function index(){

        parent::index();

        if (!$this->user->hasAccess('janvince.smallcontactform.access_messages')) {

          Flash::error( e(trans('janvince.smallcontactform::lang.controllers.index.unauthorized')) );
          return Redirect::to( Backend::url('/') );

        }

    }

    /**
     * Mark messages as read
     * @param $record
     */
    public function onMarkRead(){

        if (!$this->user->hasAccess('janvince.smallcontactform.access_messages')) {

            Flash::error( e(trans('janvince.smallcontactform::lang.controllers.index.unauthorized')) );
            return;

        }

        if ( ($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds) ) {

            foreach ($checkedIds as $item) {
                if (!$record = Message::find($item)) {
                    continue;
                }

                $record->new_message = 0;
                $record->save();

            }

            Flash::success( e(trans('janvince.smallcontactform::lang.controller.scoreboard.mark_read_success')) );

            return $this->listRefresh();

        }

    }

    /**
     * Mark messages as processed
     * @param $record
     */
    public function onMarkProcessed(){

        if (!$this->user->hasAccess('janvince.smallcontactform.process_messages')) {

            Flash::error( e(trans('janvince.smallcontactform::lang.controllers.index.unauthorized')) );
            return;

        }

        if ( ($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds) ) {

            foreach ($checkedIds as $item) {
                if (!$record = Message::find($item)) {
                    continue;
                }

                $record->processed_message = 1;
                $record->save();

            }

            Flash::success( e(trans('janvince.smallcontactform::lang.controller.scoreboard.mark_processed_success')) );

            return $this->listRefresh();

        }

    }

    /**
     * Server-side permission checks
     * (buttons are only hidden in views, handlers are reachable directly)
     * Overrides behavior methods to stay compatible with OC1 which lacks config based checks
     */
    public function index_onDelete()
    {
        $this->checkMessagesPermission('janvince.smallcontactform.delete_messages');

        return $this->asExtension('ListController')->index_onDelete();
    }

    public function update_onDelete($recordId = null)
    {
        $this->checkMessagesPermission('janvince.smallcontactform.delete_messages');

        return $this->asExtension('FormController')->update_onDelete($recordId);
    }

    public function export()
    {
        if (!$this->user->hasAccess('janvince.smallcontactform.export_messages')) {
            return Response::make(View::make('backend::access_denied'), 403);
        }

        return $this->asExtension('ImportExportController')->export();
    }

    public function download($name, $outputName = null)
    {
        if (!$this->user->hasAccess('janvince.smallcontactform.export_messages')) {
            return Response::make(View::make('backend::access_denied'), 403);
        }

        return $this->asExtension('ImportExportController')->download($name, $outputName);
    }

    public function onExport()
    {
        $this->checkMessagesPermission('janvince.smallcontactform.export_messages');

        return $this->asExtension('ImportExportController')->onExport();
    }

    public function onExportLoadForm()
    {
        $this->checkMessagesPermission('janvince.smallcontactform.export_messages');

        return $this->asExtension('ImportExportController')->onExportLoadForm();
    }

    /**
     * Throw exception if current user has not given permission
     * @param $permission
     */
    protected function checkMessagesPermission($permission)
    {
        if (!$this->user->hasAccess($permission)) {
            throw new ApplicationException(e(trans('janvince.smallcontactform::lang.controllers.index.unauthorized')));
        }
    }

}
