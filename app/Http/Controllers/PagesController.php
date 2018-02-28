<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Article;

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
    	return view('rezervacija');
    }

    public function getJezero()
    {
    	return view('jezero');
    }

    public function getCenovnik()
    {
    	return view('cenovnik');
    }

    public function getFotoJezero()
    {
    	return view('galerija.jezero');
    }

    public function getFotoAlbumi()
    {
    	return view('galerija.albumi');
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
