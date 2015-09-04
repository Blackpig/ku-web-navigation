<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TrackerController extends Controller
{
	public function index($view, $source) {

		$view = "routes.$view";

		return view($view);

	}
}