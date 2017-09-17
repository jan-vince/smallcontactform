<?php

namespace JanVince\SmallContactForm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class SmallContactFormTables_01 extends Migration
{
    public function up()
    {

        Schema::create('janvince_smallcontactform_messages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('message')->nullable();
            $table->text('form_data')->nullable();
            $table->boolean('new_message')->default(1);
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('janvince_smallcontactform_messages');
    }
}
