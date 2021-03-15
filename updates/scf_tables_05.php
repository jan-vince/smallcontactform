<?php

namespace JanVince\SmallContactForm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallContactFormTables_05 extends Migration
{
    public function up()
    {
        if (Schema::hasColumn('janvince_smallcontactform_messages', 'form_description')) 
        {
            Schema::table('janvince_smallcontactform_messages', function($table)
            {
                $table->text('url', 2000)->nullable()->change();
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('janvince_smallcontactform_messages', 'form_description')) 
        {
            Schema::table('janvince_smallcontactform_messages', function($table)
            {
                $table->text('url')->nullable()->change();
            });
        }
    }
}
