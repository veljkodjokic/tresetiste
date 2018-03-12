@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
<style type="text/css">
    a.fancybox img {
        border: none;
    } 
</style>

@if(\Auth::User())
{!! Form::open(['url'=>'/admin/edit-album', 'method'=>'POST']) !!}
<div id="article-title">{!! Form::text('title',$album->name,['id'=>'title','style'=>'width: 99%; margin-bottom:15px; position: relative;', 'class'=>'form-control']) !!}</div>
{!! Form::hidden('id',$album->id) !!}
{!! Form::submit('Izmeni ime',['class'=>'btn btn-primary', 'id'=>'static_save']) !!}
{!!Form::close() !!}
@else
<div id="article-title"><b>{{ $album->name }}</b></div>
@endif
<div id="date">Objavljeno {{ $album->created_at->format('d.m.Y H:i') }}</div><br>

@if(\Auth::User())
{!! Form::open(['url'=>'/galerija/add_pic', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
{!! Form::hidden('album', $album->id) !!}
<table>
	<td>
		<tr>Odaberi sliku</tr>
	</td>
	<td>
    	<tr>{!! Form::file('slika','',['id'=>'slika', 'style'=>'max-width:150px; left:0px; float:left; position:absolute;']) !!}</tr>
    </td>
    <td>
    	<tr>{!! Form::submit('Dodaj sliku',['class'=>'btn btn-primary', 'id'=>'static_save']) !!}</tr>
    </td>
</table><br>
{!! Form::close() !!}
@endif

@foreach($pics as $pic)

    <div id="album-pic" class="tooBig">
        <img src="/mnt/galerija/{{ $pic->img }}" class="fancybox" data-big="/mnt/galerija/{{ $pic->img }}" style="width: 100%">
        @if(\Auth::User()) 

        <div style="position: absolute; top:0px; right: 0px; width: 35px; height: 35px;" onclick="ays{{ $pic->id }}()"><img src="/pics/red-delete.gif" style="width: 100%; height: 100%"></div> 

        {!! Form::open(['url'=>'/admin/del-pic','id'=>'predaj'.$pic->id, 'method'=>'POST']) !!}
        {!! Form::hidden('id', $pic->id ) !!}
        {!! Form::close() !!}

        <script type="text/javascript">
            function ays{{ $pic->id }}(){
              swal({
              title: 'Da li ste sigurni?',
              text: "Obrisana slika je nepovratna!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText: 'Ne',
              confirmButtonText: 'Da, obriši sliku!'
            }).then((result) => {
              if (result.value) {
                document.getElementById('predaj{{ $pic->id }}').submit();
              }
            })
            };
        </script> 
        @endif
    </div>
@endforeach   

@if(\Auth::User())
{!! Form::open(['url'=>'/admin/del-album','id'=>'predaj', 'method'=>'POST']) !!}
{!! Form::hidden('id', $album->id ) !!}
{!! Form::close() !!}
<button class="btn btn-primary" onclick="ays()" style="background-color:#FD6770; margin-bottom:80px; border-color:#FD6770">Obriši Album</button>

<script type="text/javascript">
  function ays(){
    swal({
    title: 'Da li ste sigurni?',
    text: "Obrisan album je nepovratan!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Ne',
    confirmButtonText: 'Da, obriši album!'
  }).then((result) => {
    if (result.value) {
      document.getElementById('predaj').submit();
    }
  })
  };
</script> 
@endif

@include('partials.foto-zoom') 
@endsection