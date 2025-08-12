<?php
namespace JanVince\SmallContactForm\Classes;

use JanVince\SmallContactForm\Models\Message;

class UnreadRecords {

    public static function getTotal() 
    {
        $unread = null;

        try {
            $unread = Message::where('new_message', 1)->count();
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }

        return $unread;
    }

}

?>