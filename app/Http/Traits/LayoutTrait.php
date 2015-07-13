<?php namespace App\Http\Traits;

use Illuminate\Http\Request;
use \App\Http\Models\Layout;

trait LayoutTrait
{
	
	public static function arrangeToLayout($guid=false, $endpoints)
	{

		if (!$guid) return collect($endpoints);

		$layout = Layout::find($guid);

		if (!$layout) return collect($endpoints);

		$show_always = collect([]);
		$endpoints = collect($endpoints);

		//always show tiles appear at the top of each page - filter them into our array
		$show_always = $endpoints->filter(function ($endpoint) {
    		return $endpoint->always_show == 1;
		});

		$arrange = $endpoints->filter(function ($endpoint) {
    		return $endpoint->always_show == 0;
		});

		// Turn the collection into a keyed collection by guid
		
		foreach($arrange as $item) {
			$keyed_arrange[$item->guid] = $item;
		}
		//Arrange according to the layout

		$layout = json_decode($layout->layout, true);

var_dump($keyed_arrange);dd($layout);
		foreach($layout as $key) {

			$ordered[] = $keyed_arrange["$key"];
		}

		$arranged = $show_always->merge($ordered);

		return collect($arranged);

	}
}