<?php namespace App\Http\Traits;

use Illuminate\Http\Request;

trait LayoutTrait
{
	
	public static function arrangeToLayout($layout=null, $endpoints)
	{

		if (!$layout) return $endpoints;

		$show_always = collect([]);

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
		dd($layout);

		foreach($layout as $key) {

			$ordered[] = $keyed_arrange[$key];
		}

		$arranged = $show_always->merge($ordered);

		return $arranged;

	}
}