@extends('layouts.app')

@section('content')
<style type="text/css">
	td{
		padding:5px;
	}

	@media only screen and (max-width: 450px){
        
        #sticky{
        	display:none;
        }
    }
</style>
<div id="article-title"><b>Galerija</b></div>
@if(\Auth::User())
    <a href="#" class="bad-link" onclick="album();return false;">
    <div id="album-plus">
		<table id="album-table">
        	<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td id="album-name" colspan="2"><b>Dodaj album</b></td>
			</tr>
        </table>
	</div>
	</a>
@endif

@foreach($albums as $album)
@php
	$count=$album->images()->count();
	$images=$album->images()->orderBy('created_at', 'desc')->get();
@endphp
<a href="/galerija/{{ $album->id }}" class="bad-link">
	<div id="album">
        <table id="album-table">
        	<tr>
				<td colspan="2"> @if($count >= 1) <img src="/mnt/galerija/{{ $images[0]->img }}" width="100%" height="100%" id="preview-pic"> @else &nbsp; @endif</td>
			</tr>
			<tr>
				<td id="album-name" colspan="2"><b>{{ $album->name }}</b></td>
			</tr>
        </table>
	</div>
</a>
@endforeach    
<script type="text/javascript">
function album(){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	swal({
  		title: 'Upišite ime novog albuma',
  		html:
  		  '<input id="swal-input1" class="swal2-input">',
  		preConfirm: function () {
  		  return new Promise(function (resolve) {
  		    resolve( $('#swal-input1').val() )
  		  })
  		},
  		onOpen: function () {
  		  $('#swal-input1').focus()
  	}
	}).then(function (result) {
		$.ajax({
		  type: 'POST',
		  url: '{{ url('/admin/nov-album') }}',
		  dataType: 'JSON',
		  data: {_token: CSRF_TOKEN,"name": result.value},
		  success: function(html){
                    location.reload();
                }
		});
	})
}
</script>

@endsection
