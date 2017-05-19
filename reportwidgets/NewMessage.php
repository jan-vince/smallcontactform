<?php

namespace JanVince\SmallContactForm\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use JanVince\SmallContactForm\Controllers\Messages as MessagesController;

/**
 * Contact form sent messages report widget
 */
class NewMessage extends ReportWidgetBase
{

    public function render()
    {
        return $this->makePartial('newmessage');
    }

    public function getRecordsStats($value){

        $controller = new MessagesController;

        return $controller->getRecordsStats($value);

    }

}
