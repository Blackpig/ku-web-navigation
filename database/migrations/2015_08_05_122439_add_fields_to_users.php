<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->string('external_email',100)->after('email')->nullable();
            $table->string('employee_class',100)->after('employee_type');
            $table->renameColumn('homedir', 'job_title');
            $table->string('department', 200)->change();
            $table->string('tel',30)->after('department')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            
            $table->dropColumn('external_email');
            $table->dropColumn('employee_class');
            $table->dropColumn('tel');
            $table->renameColumn('job_title', 'homedir');
            $table->string('department', 100)->change();

        });
    }
}
