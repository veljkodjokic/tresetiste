<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
use App\Image;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class GalleryController extends Controller
{
    public function getFoto()
    {
        $albums=Album::orderBy('created_at', 'desc')->get();
        return view('galerija')->with('albums', $albums);
    }

    public function getPics($id)
    {
    	$album=Album::find($id);
        $pics=$album->images()->orderBy('created_at', 'desc')->get();
    	return view('album')->with(["album"=>$album, "pics"=>$pics]);
    }

    public function postNovAlbum()
    {
        $album = new Album();
        $album->name= Input::get('name');
        $album->save();
    }

    public function postNovPic(Request $request)
    {
        $this->validate($request, [
        'slika' => 'required|image|mimes:jpeg,png,jpg,gif|max:6000',
        ]);

        $cover = $request->file('slika');

        $name = Carbon::now()->format('YmdHs').'.'.$cover->getClientOriginalExtension();

        $slika= new Image;
        $slika->img=$name;
        $slika->album_id=$request->album;

        $destinationPath ='/mnt/galerija/'; //pics\galerija\pics ;
        
        $cover->move($destinationPath, $name);
        
        $slika->save();
        return back();
    }

    public function postDelPic(Request $request)
    {
        $slika= Image::find($request->id);

        $file_path='/mnt/galerija/'.$slika->img;

        \File::delete($file_path);
        $slika->delete();

        return back();
    }

    public function postEditAlbum(Request $request)
    {
        $album = Album::find($request->id);
        $album->name=$request->title;
        $album->save();

        return back();
    }

    public function postDelAlbum(Request $request)
    {
        $album = Album::find($request->id);
        $images=$album->Images()->get();

        foreach($images as $image){
            $file_path='/mnt/galerija/'.$image->img;
            @unlink($file_path);
            $image->delete();
        }
        
        $album->delete();

        return redirect('/galerija');
    }
}
