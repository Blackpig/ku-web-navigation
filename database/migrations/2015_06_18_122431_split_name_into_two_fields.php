<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SplitNameIntoTwoFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->renameColumn('name', 'first_name');
			$table->string('last_name',100)->after('first_name');
			$table->string('gender',100)->after('avatar');

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
			$table->renameColumn('first_name', 'name');
			$table->dropColumn('last_name');
			$table->dropColumn('gender');
		});
	}

}
