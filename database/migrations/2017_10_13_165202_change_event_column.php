<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeEventColumn extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::table('events', function (Blueprint $table) {
			$table->renameColumn('event_name', 'name');
			$table->renameColumn('event_theme', 'theme');
			$table->renameColumn('event_venue', 'venue');
			$table->renameColumn('event_date', 'date');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}
}
