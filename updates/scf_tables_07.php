<?php

namespace JanVince\SmallContactForm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallContactFormTables_07 extends Migration
{
    public function up()
    {
        Schema::table('janvince_smallcontactform_messages', function($table)
        {
            $table->boolean('processed_message')->default(0);
        });
    }

    public function down()
    {
        if (Schema::hasColumn('janvince_smallcontactform_messages', 'processed_message')) 
        {
            Schema::table('janvince_smallcontactform_messages', function($table)
            {
                $table->dropColumn('processed_message');
            });
        }
    }
}
