<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserToLayoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('layouts', function(Blueprint $table)
        {
            $table->string('updated_by',100)->after('layout');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('layouts', function(Blueprint $table)
        {
            $table->dropColumn('updated_by');

        });
     }
}
