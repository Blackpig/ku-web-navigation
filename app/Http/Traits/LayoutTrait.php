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

		//always_show tiles appear at the top of each page - filter them into our array
		$show_always = $endpoints->filter(function ($endpoint) {
    		return $endpoint->always_show == 1;
		});

		// Now filter so that we have the items to be arranged
		$arrange = $endpoints->filter(function ($endpoint) {
    		return $endpoint->always_show == 0;
		});

		// Turn the collection into a keyed collection by guid
		foreach($arrange as $item) {
			$keyed_arrange["$item->guid"] = $item;
		}
		
		//Arrange according to the layout
		$layout = json_decode($layout->layout, true);

		foreach($layout as $key) {
			$ordered[] = $keyed_arrange[$key];
			//remove the entry from the array
			$discard = $keyed_arrange->pull($key);
		}

		// If there are any entries left - new endpoints have been added since 
		// the last time the page was arranged, append these to the end of teh layout
		if (count($keyed_arrange)) {
			foreach($keyed_arrange as $key=>$item) {
				$ordered[] = $item;
			}
		}

		// Merge our arranged values with always_show items
		$arranged = $show_always->merge($ordered);

		return collect($arranged);

	}
}