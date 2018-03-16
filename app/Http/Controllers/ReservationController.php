<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use View;
use App\Reservation;
use App\Box;
use App\Pass;

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
    	dd($request);
    }
}
