<?php

namespace JanVince\SmallContactForm\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use JanVince\SmallContactForm\Controllers\Messages as MessagesController;

/**
 * Contact form sent messages report widget
 */
class Messages extends ReportWidgetBase
{

    public function render()
    {
        return $this->makePartial('messages');
    }

    public function getRecordsStats($value){

        $controller = new MessagesController;

        return $controller->getRecordsStats($value);

    }

}
