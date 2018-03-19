<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use View;
use App\Reservation;
use App\Box;
use App\Pass;
use App\Mail\ReservationMail;

class ReservationController extends Controller
{
    public function postMesta()
    {
    	$start = Input::get('start');
    	$start = Carbon::parse($start)->addHours(6);
    	
    	$pass = Input::get('pass');
    	$end = $this->FigureEnd($start, $pass);

    	$reservation = new Reservation;
    	$reservation->start = $start;
    	$reservation->end = $end;

    	$boxes = Box::all();
    	$boxes_array = array();
    	foreach ($boxes as $box) {
    		if(!$box->Busy($reservation))
    			$boxes_array[$box->id] = 0;
    		else if($box->Busy($reservation)->paid == 0)
    			$boxes_array[$box->id] = 1;
    		else
    			$boxes_array[$box->id] = 2;
    	}

    	return View::make('partials.boxes')->with(['boxes'=>$boxes_array, 'start'=>$start,'end'=>$end]);
    }

    public function FigureEnd($start, $pass)
    {
    	if($pass == 0)
    		$end=Carbon::parse($start)->addHours(12);
    	if($pass == 1)
    		$end=Carbon::parse($start)->addDays(1);
    	if($pass == 2)
    		$end=Carbon::parse($start)->addDays(2);
    	if($pass == 3)
    		$end=Carbon::parse($start)->addDays(2)->addHours(12);
    	if($pass == 4)
    		$end=Carbon::parse($start)->addDays(3)->addHours(12);
    	if($pass == 5)
    		$end=Carbon::parse($start)->addDays(4)->addHours(12);
    	if($pass == 6)
    		$end=Carbon::parse($start)->addDays(5)->addHours(12);
    	if($pass == 7)
    		$end=Carbon::parse($start)->addDays(6)->addHours(12);

    	return $end;
    }

    public function postRezervacija(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:100',
            'email' => 'required|email|min:6|max:50',
            'contact' => 'required|min:6|max:13',
            'mesto' => 'required',
            'dozvola' => 'required',
            'start' => 'required',
            'end' => 'required',
            'address' => 'required|min:5|max:100',
            'country' => 'required|min:5|max:50',
            'city' => 'required|max:50',
            'postalcode' => 'required|max:10',
            'comment' => 'max:250',
        ]);

        if ($validator->fails()) {
            return \Redirect::back()
                        ->withErrors($validator)->withInput($request->all());;
        }

    	$reservation = new Reservation;
        $reservation->name=$request->name;
        $reservation->email=$request->email;
        $reservation->contact=$request->contact;
        $reservation->box_id=$request->mesto;
        $reservation->pass_id=$request->dozvola;
        $reservation->country=$request->country;
        $reservation->address=$request->address;
        $reservation->city=$request->city;
        $reservation->postalcode=$request->postalcode;
        $reservation->comment=$request->comment;
        $reservation->reserved=Carbon::now();
        $reservation->start=Carbon::parse($request->start)->addHours(6);
        $reservation->end=$request->end;
        $reservation->save();

        $price=$this->Price($reservation);

        \Mail::to($request->email)->send(new ReservationMail($reservation, $price));

        \Session::flash('confirm-res');
        return redirect('/');
    }

    public function postStatus($id)
    {
        $reservation=Reservation::find($id);
        $reservation->status=1;
        $reservation->save();

        \Session::flash('status_wtf');
        return redirect('/rezervacija/potvrda/'.$reservation->id);
    }

    public function getPotvrda($id)
    {
        $reservation=Reservation::find($id);
        $box=$reservation->Box()->first();
        $pass=$reservation->Pass()->first();
        $price=$this->Price($reservation);

        return view('uplatnica')->with(['reservation'=>$reservation,'box'=>$box,'pass'=>$pass,'price'=>$price]);
    }

    public function Price($reservation)
    {
        $box=$reservation->Box()->first();
        $pass=$reservation->Pass()->first();
        if($box->sector == 1)
            $price=$pass->price*0.8;
        else
            $price=$pass->price;

        return $price;
    }
}