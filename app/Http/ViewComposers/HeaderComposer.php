<?php

namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Tag;

class HeaderComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  \Illuminate\View\View  $view
	 * @return void
	 */
	public function compose(View $view) {
		$category = Tag::where('type', '=', 0)->get();
		$view->with('headerCategory', $category);
	}
}