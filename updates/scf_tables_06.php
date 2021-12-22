<?php

namespace JanVince\SmallContactForm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallContactFormTables_06 extends Migration
{
    public function up()
    {
        Schema::table('janvince_smallcontactform_messages', function($table)
        {
            $table->text('form_notes', 2000)->nullable()->change();
        });
    }

    public function down()
    {
        if (Schema::hasColumn('janvince_smallcontactform_messages', 'form_notes')) 
        {
            Schema::table('janvince_smallcontactform_messages', function($table)
            {
                $table->dropColumn('form_notes');
            });
        }
    }
}
