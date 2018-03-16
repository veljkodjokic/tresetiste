@extends('layouts.app')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<style type="text/css">
	#sticky{
		position: absolute;
		right:10px;
	}
</style>

<div id="article-title"><b>Rezervacija mesta</b></div> <br>  
<div id="zed"><b>1. Odaberite datum</b></div>

	{!! Form::open(['url'=>'/rezervacija', 'method'=>'POST']) !!}
	<h4>Dolazak</h4>
	{!! Form::text('day','',['id'=>'day', 'style'=>'max-width:150px;', 'placeholder'=>'YYYY-MM-DD', 'class'=>'form-control']) !!}
	<h4>Dozvola</h4>
	<div style="width: 180px; overflow: hidden;">
	{!! Form::select('dozvola',$passes,0,['id'=>'dozvola', 'class'=>'form-control']) !!}
	</div>
	
<div id="zed" class="btmrg"><b>2. Odaberite mesto</b></div>

<div id="markup">
	<div id="mapa">
		<img src="/pics/mapa.png" width="100%">
		<div id="map-container">
			<div id="box-1" class="box"><b>1</b></div>
			<div id="box-2" class="box"><b>2</b></div>
			<div id="box-3" class="box"><b>3</b></div>
			<div id="box-4" class="box"><b>4</b></div>
			<div id="box-5" class="box"><b>5</b></div>
			<div id="box-6" class="box"><b>6</b></div>
			<div id="box-7" class="box"><b>7</b></div>
			<div id="box-8" class="box"><b>8</b></div>
			<div id="box-9" class="box"><b>9</b></div>
			<div id="box-10" class="box"><b>10</b></div>
			<div id="box-11" class="box"><b>11</b></div>
			<div id="box-12" class="box"><b>12</b></div>
			<div id="box-13" class="box"><b>13</b></div>
			<div id="box-14" class="box"><b>14</b></div>
			<div id="box-15" class="box"><b>15</b></div>
			<div id="box-16" class="box"><b>16</b></div>
			<div id="box-17" class="box"><b>17</b></div>
			<div id="box-18" class="box"><b>18</b></div>
		</div>
	</div><br>
	<table>
		<tr>
			<th colspan="2">Sektori</th>
	   		<th colspan="2">Stanja</th>
		</tr>
		<tr>
			<td><div style="width: 10px; height: 10px; border:2px solid #B87333"></div></td>
			<td nowrap style="padding:0 15px 0 5px;">Sektor 1</td>
			<td><div style="width: 10px; height: 10px; background-color: #B2F147"></td>
			<td nowrap style="padding-left: 5px">Slobodno mesto</td>
		</tr>
		<tr>
			<td><div style="width: 10px; height: 10px; border:2px solid #C0C0C0"></div></td>
			<td nowrap style="padding:0 15px 0 5px;">Sektor 2</td>
			<td><div style="width: 10px; height: 10px; background-color: #FF4E4E"></td>
			<td nowrap style="padding-left: 5px">Zauzeto mesto</td>
		</tr>
		<tr>
			<td><div style="width: 10px; height: 10px; border:2px solid #D9D919"></div></td>
			<td nowrap style="padding:0 15px 0 5px;">Sektor 3</td>
			<td><div style="width: 10px; height: 10px; background-color: #FFA500"></td>
			<td nowrap style="padding-left: 5px">Čeka se uplata (48h)</td>
		</tr>
	</table>
	{!! Form::close() !!}
</div>
<script type="text/javascript">
$("#dozvola").prop("selectedIndex", -1);

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  $(function() {
    $( "#day" ).datepicker({
      changeMonth: true,
      changeYear: true,
      format: 'yyyy-m-d'
    });
  });

$( "#dozvola" ).change(function() {
  var pass = $("#dozvola option:selected").val();
  var start = document.getElementById("day").value;
  
	$.post('{{ url('/rezervacija_mesta') }}', {pass: pass, start: start}, function(markup)
   {
       $('#markup').html(markup);
   });
});

</script>
@endsection
