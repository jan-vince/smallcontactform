<?php

namespace JanVince\SmallContactForm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallContactFormTables_04 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallcontactform_messages', function($table)
        {
            $table->text('url')->nullable();
        });

    }

    public function down()
    {
        if (Schema::hasColumn('janvince_smallcontactform_messages', 'form_description')) {

            Schema::table('janvince_smallcontactform_messages', function($table)
            {
                $table->dropColumn('url');
            });

        }
    }
}
