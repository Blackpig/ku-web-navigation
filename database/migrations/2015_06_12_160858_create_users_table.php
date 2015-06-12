<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->tinyinteger('employee_type');
            $table->string('employee_status', 15);
            $table->string('homedir')->nullable();
            $table->string('department',100)->nullable();
            $table->string('avatar');
            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}
