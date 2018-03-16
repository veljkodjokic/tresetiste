<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Article;
use App\Pass;

class PagesController extends Controller
{
    public function getNaslovna()
    {
        $articles=Article::orderBy('created_at', 'desc')->get();
    	return view('naslovna')->with('articles',$articles);
    }

    public function getPravilnik()
    {
    	return view('pravilnik');
    }

    public function getRezervacija()
    {
        $passes=Pass::all();
        $passes_array = array();
        foreach($passes as $pass)
            $passes_array[$pass->length] = $pass->pass;
    	return view('rezervacija')->with('passes',$passes_array);
    }

    public function getJezero()
    {
    	return view('jezero');
    }

    public function getCenovnik()
    {
    	return view('cenovnik');
    }

    public function getIstorija($godina)
    {
    	return view('istorija.'.$godina);
    }

    public function getEkologija()
    {
        return view('ekologija');
    }

    public function getHome()
    {
        return redirect('/');
    }

    public function getObjava($id)
    {
        $article=Article::find($id);
        return view('objava')->with('article',$article);
    }
}
