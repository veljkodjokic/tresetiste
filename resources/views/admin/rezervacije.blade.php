@extends('layouts.app')

@section('content')
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size: 1vw;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#sticky{
    display: none;
}

#content-container{
    width: 100%;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

<table id="customers">
  <tr>
    <th>Ime</th>
    <th>Email</th>
    <th>Kontakt</th>
    <th>Potvrda</th>
    <th>Box</th>
    <th>Od-Do</th>
    <th>Cena</th>
  </tr>
@foreach($reservations as $reservation)
@php
    $box=$reservation->Box()->first();
    $pass=$reservation->Pass()->first();
    if($box->sector == 1)
        $price=$pass->price*0.8;
    else
        $price=$pass->price;
@endphp
    <tr>
      <td>{{ $reservation->name }}<br>

      {!! Form::open(['url'=>'/admin/potvrdi', 'method'=>'POST']) !!}
      {!! Form::hidden('id', $reservation->id ) !!}
      {!! Form::submit('Potvrdi uplatu',['class'=>'btn btn-primary']) !!}
      {!! Form::close() !!}</td>

      <td>{{ $reservation->email }}<br>
      {!! Form::open(['url'=>'/admin/del-res','id'=>'predaj', 'method'=>'POST']) !!}
      {!! Form::hidden('id', $reservation->id ) !!}
      {!! Form::close() !!}
      <button class="btn btn-primary" onclick="ays()" style="background-color:#FD6770; border-color:#FD6770">Obriši</button>
      </td>
      <td>{{ $reservation->contact }}</td>
      <td>@if($reservation->status) DA @else NE @endif</td>
      <td>{{$box->id}}</td>
      <td>{{ substr($reservation->start, 0,10)}} -<br>{{ substr($reservation->end, 0,10) }}</td>
      <td>{{ $price }} din</td>
    </tr>
@endforeach
</table>

<script type="text/javascript">
  function ays(){
    swal({
    title: 'Da li ste sigurni?',
    text: "Obrisana rezervacija je nepovratan!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Ne',
    confirmButtonText: 'Da, obriši rezervaciju!'
  }).then((result) => {
    if (result.value) {
      document.getElementById('predaj').submit();
    }
  })
  };
</script> 

@endsection
