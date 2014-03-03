<?php

class ArticlesController extends \BaseController {

    public function __construct() {
        $this->setupLayout();
    }

    protected function setupLayout()
    {
        if ( is_null($this->layout))
        {
            $this->layout = View::make('main.index')->with('title',Route::currentRouteAction());
        }
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return $this->layout->nest('content', 'articles.index', ['articles' => Article::paginate(15)]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return $this->layout->nest('content', 'articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validation = Article::validate(['title' => Input::get('title'), 'body'  => Input::get('body')]);

        if ($validation !== true) {
            return Redirect::back()->withErrors($validation)->withInput();
        }

        $article = new Article;
        $article->title   = Input::get('title');
        $article->body    = Input::get('body');
        $article->save();

        return Redirect::route('articles.edit', $article->id)->with('msg_success', 'The article was saved.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return $this->layout->nest('content', 'articles.show', ['article' => Article::find($id)]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

        return $this->layout->nest('content', 'articles.edit', ['article' => Article::find($id)]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $validation = Article::validate(['title' => Input::get('title'), 'body'  => Input::get('body')]);

        if ($validation !== true) {
            return Redirect::back()->withErrors($validation)->withInput();
        }

        $article = Article::find($id);
        $article->title   = Input::get('title');
        $article->body    = Input::get('body');
        $article->save();

        return Redirect::route('articles.edit', $article->id)->with('msg_success', 'The article was saved.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $article = Article::find($id);
        $article->delete();

        return Redirect::route('articles.index')->with('msg_success', 'The article was deleted.');
	}

    public function method() {
        return $this->layout->with('content', Route::currentRouteAction());
    }

}