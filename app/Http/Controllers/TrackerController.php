<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TrackerController extends Controller
{
	public function index($source, $target) {

		// Add tracking here

		return redirect()->route('navigator');

	}
}