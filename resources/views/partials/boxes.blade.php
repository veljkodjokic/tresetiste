<div id="mapa">
	<img src="/pics/mapa.png" width="100%">
	<div id="map-container">
		<div id="box-1" class="box" style="background-color: @if($boxes[1] == 0)  #B2F147 @elseif($boxes[1] == 1) #FFA500 @else #FF4E4E @endif"><b>1</b></div>
		<div id="box-2" class="box" style="background-color: @if($boxes[2] == 0)  #B2F147 @elseif($boxes[2] == 1) #FFA500 @else #FF4E4E @endif"><b>2</b></div>
		<div id="box-3" class="box" style="background-color: @if($boxes[3] == 0)  #B2F147 @elseif($boxes[3] == 1) #FFA500 @else #FF4E4E @endif"><b>3</b></div>
		<div id="box-4" class="box" style="background-color: @if($boxes[4] == 0)  #B2F147 @elseif($boxes[4] == 1) #FFA500 @else #FF4E4E @endif"><b>4</b></div>
		<div id="box-5" class="box" style="background-color: @if($boxes[5] == 0)  #B2F147 @elseif($boxes[5] == 1) #FFA500 @else #FF4E4E @endif"><b>5</b></div>
		<div id="box-6" class="box" style="background-color: @if($boxes[6] == 0)  #B2F147 @elseif($boxes[6] == 1) #FFA500 @else #FF4E4E @endif"><b>6</b></div>
		<div id="box-7" class="box" style="background-color: @if($boxes[7] == 0)  #B2F147 @elseif($boxes[7] == 1) #FFA500 @else #FF4E4E @endif"><b>7</b></div>
		<div id="box-8" class="box" style="background-color: @if($boxes[8] == 0)  #B2F147 @elseif($boxes[8] == 1) #FFA500 @else #FF4E4E @endif"><b>8</b></div>
		<div id="box-9" class="box" style="background-color: @if($boxes[9] == 0)  #B2F147 @elseif($boxes[9] == 1) #FFA500 @else #FF4E4E @endif"><b>9</b></div>
		<div id="box-10" class="box" style="background-color: @if($boxes[10] == 0)  #B2F147 @elseif($boxes[10] == 1) #FFA500 @else #FF4E4E @endif"><b>10</b></div>
		<div id="box-11" class="box" style="background-color: @if($boxes[11] == 0)  #B2F147 @elseif($boxes[11] == 1) #FFA500 @else #FF4E4E @endif"><b>11</b></div>
		<div id="box-12" class="box" style="background-color: @if($boxes[12] == 0)  #B2F147 @elseif($boxes[12] == 1) #FFA500 @else #FF4E4E @endif"><b>12</b></div>
		<div id="box-13" class="box" style="background-color: @if($boxes[13] == 0)  #B2F147 @elseif($boxes[13] == 1) #FFA500 @else #FF4E4E @endif"><b>13</b></div>
		<div id="box-14" class="box" style="background-color: @if($boxes[14] == 0)  #B2F147 @elseif($boxes[14] == 1) #FFA500 @else #FF4E4E @endif"><b>14</b></div>
		<div id="box-15" class="box" style="background-color: @if($boxes[15] == 0)  #B2F147 @elseif($boxes[15] == 1) #FFA500 @else #FF4E4E @endif"><b>15</b></div>
		<div id="box-16" class="box" style="background-color: @if($boxes[16] == 0)  #B2F147 @elseif($boxes[16] == 1) #FFA500 @else #FF4E4E @endif"><b>16</b></div>
		<div id="box-17" class="box" style="background-color: @if($boxes[17] == 0)  #B2F147 @elseif($boxes[17] == 1) #FFA500 @else #FF4E4E @endif"><b>17</b></div>
		<div id="box-18" class="box" style="background-color: @if($boxes[18] == 0)  #B2F147 @elseif($boxes[18] == 1) #FFA500 @else #FF4E4E @endif"><b>18</b></div>
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
<br>
<b id="tekst-mesta">Mesto broj: </b><select style="margin-left: 10px; max-width: 70px" id="mesto" name="mesto" class="form-control">
 	@for($i=1; $i<19; $i++)
 		@if($boxes[$i] == 0)
  			<option value="{{ $i }}">{{ $i }}</option>
  		@endif
  	@endfor
</select>

<div id="zed" style="margin-top: 50px;"><b>3. Unesite podatke</b></div>
{!! Form::hidden('start', $start ) !!}
{!! Form::hidden('end', $end ) !!}
<h4>Ime*</h4>
{!! Form::text('name','',['id'=>'name', 'style'=>'width:150px;', 'class'=>'form-control' ]) !!}
<h4>Email*</h4>
{!! Form::text('email','',['id'=>'email', 'style'=>'width:200px;', 'class'=>'form-control' ]) !!}
<h4>Kontakt telefon*</h4>
{!! Form::text('contact','',['id'=>'contact', 'style'=>'width:200px;', 'class'=>'form-control' ]) !!}
<h4>Država*</h4>
{!! Form::text('county','',['id'=>'county', 'style'=>'width:150px;', 'class'=>'form-control' ]) !!}
<h4>Grad*</h4>
{!! Form::text('city','',['id'=>'city', 'style'=>'width:150px;', 'class'=>'form-control' ]) !!}
<h4>Poštanski broj*</h4>
{!! Form::text('postalcode','',['id'=>'postalcode', 'style'=>'width:150px;', 'class'=>'form-control' ]) !!}
<h4>Adresa*</h4>
{!! Form::text('address','',['id'=>'address', 'style'=>'width:150px;', 'class'=>'form-control' ]) !!}
<h4>Komentar</h4>
{!! Form::textarea('comment',' ',['id'=>'comment','style'=>'min-height: 200px; width: 90%; resize: none;', 'class'=>'form-control']) !!}<br>

{!! Form::submit('Rezerviši',['class'=>'btn btn-primary', 'id'=>'reserve']) !!}
{!! Form::close() !!}