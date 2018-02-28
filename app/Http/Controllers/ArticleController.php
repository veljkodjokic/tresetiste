<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Article;

class ArticleController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function getNovaObjava()
    {
        return view('admin.nova-objava');
    }

    public function getAltObjava($id)
    {
        $article=Article::find($id);
        return view('admin.alt-objava')->with('article',$article);
    }

    public function postAltObjava(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'text' => 'required|min:6|max:65500',
        ]);

        if ($validator->fails()) {
            return \Redirect::back()
                        ->withErrors($validator);
        }

        Article::find($request->id)->update($request->all());
        $article=Article::find($request->id);

        \Session::flash('izmena_objava');
    	return view('objava')->with('article',$article);
    }

    public function postNovaObjava(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'title' => 'required|max:191',
            'text' => 'required|min:6|max:65500',
        ]);

        if ($validator->fails()) {
            return \Redirect::back()
                        ->withErrors($validator);
        }

    	$article = new Article;
    	$article->title=$request->title;
    	$article->text=$request->text;
    	$article->img='jezero-tresetiste.jpg';
    	$article->save();

    	\Session::flash('new-article');
    	return redirect('/');
    }

    public function postDelObjava(Request $request)
    {
    	$article = Article::Find($request->id);
    	$article->delete();

    	\Session::flash('del-article');
    	return redirect('/');
    }
}