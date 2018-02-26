<?php

namespace JanVince\SmallContactForm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallContactFormTables_03 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallcontactform_messages', function($table)
        {
            $table->text('form_description')->nullable();
            $table->string('form_alias')->nullable();
        });

    }

    public function down()
    {
        if (Schema::hasColumn('janvince_smallcontactform_messages', 'form_description')) {

            Schema::table('janvince_smallcontactform_messages', function($table)
            {
                $table->dropColumn('form_description');
            });

        }
        if (Schema::hasColumn('janvince_smallcontactform_messages', 'form_alias')) {

            Schema::table('janvince_smallcontactform_messages', function($table)
            {
                $table->dropColumn('form_alias');
            });

        }
    }
}
