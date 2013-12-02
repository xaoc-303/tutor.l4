<?php

class MainController extends BaseController {

	public function getIndex()
	{
		return View::make('main.index')
            ->with('title',__CLASS__)
            ->nest('content', 'main.welcome');
	}

}