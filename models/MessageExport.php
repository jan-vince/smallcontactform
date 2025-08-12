<?php

namespace JanVince\SmallContactForm\Models;

use Db;
use \Backend\Models\ExportModel;
use \October\Rain\Support\Collection;
use \JanVince\SmallContactForm\Models\Message;

class MessageExport extends ExportModel {

    /**
     * @var array Fillable fields
     */
    // protected $fillable = [];
    
    public function exportData($columns, $sessionKey = null)
    {

        $records = Message::all();

        $records->each(function($record) use ($columns) {
            $record->addVisible($columns);
        });

        $data = $records->toArray();

        
        foreach($data as $key => $items) {

            foreach($items as $itemKey => $itemValue) {

                if( is_array($itemValue) ) {
                    $data[$key][$itemKey] = json_encode($itemValue);
                }
            }

        }

        return $data;
    }
}
