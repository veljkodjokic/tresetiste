@extends('layouts.app')

@section('content')

    <div style="width: 110%; position: relative; height: auto;">
        <img src="/pics/uplatnica.png" width="100%">
        <div id="uplatilac" class="box1"><p>{{ $reservation->name }}<br>{{ $reservation->postalcode }} {{ $reservation->city }}, {{ $reservation->address }}</p></div>
        <div id="svrha" class="box1">Rezervacija mesta</div>
        <div id="primalac" class="box1">???????????????</div>
        <div id="valuta" class="box1">RSD</div>
        <div id="iznos" class="box1">={{ $price }},00</div>
        <div id="primaoc" class="box1">310-152531-72</div>
    </div>

@endsection