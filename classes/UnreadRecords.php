<?php

namespace JanVince\SmallContactForm\Classes;

use JanVince\SmallContactForm\Models\Message;

class UnreadRecords {
//未读记录
    public static function getTotal() {
        $unread = Message::where('new_message', 1)->count();
        return ($unread > 0) ? $unread : null;
    }

}

?>