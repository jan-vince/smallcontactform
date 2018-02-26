<?php

namespace JanVince\SmallContactForm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallContactFormTables_02 extends Migration
{
    public function up()
    {

        Schema::table('janvince_smallcontactform_messages', function($table)
        {
            $table->string('remote_ip')->nullable();
            $table->index('remote_ip');
        });

    }

    public function down()
    {
        if (Schema::hasColumn('janvince_smallcontactform_messages', 'remote_ip')) {

            Schema::table('janvince_smallcontactform_messages', function($table)
            {
                $table->dropColumn('remote_ip');
            });

        }
    }
}
