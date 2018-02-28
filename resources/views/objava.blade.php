@extends('layouts.app')
@section('content')
<div id="article-wrapper">
    <div id="article-title"><b>{{ $article->title }}</b></div>
    <div id="date">Objavljeno {{ $article->created_at->format('d.m.Y H:i') }}</div><br>
    <div id="article-description">{!! $article->text !!}<br>
    @if(\Auth::User())
    	{!! Form::open(['url'=>'/admin/alt-objava/'.$article->id, 'method'=>'GET']) !!}
        {!! Form::submit('Izmeni Objavu',['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
        <br><br>
        {!! Form::open(['url'=>'/admin/del-objava','id'=>'predaj', 'method'=>'POST']) !!}
        {!! Form::hidden('id', $article->id ) !!}
        {!! Form::close() !!}
        <button class="btn btn-primary" onclick="ays()" style="background-color:#FD6770; margin-bottom:80px; border-color:#FD6770">Obriši Objavu</button>
    @endif
    </div>
</div>
<script type="text/javascript">
function ays(){
  swal({
  title: 'Da li ste sigurni?',
  text: "Obrisana objava je nepovratna!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  cancelButtonText: 'Ne',
  confirmButtonText: 'Da, obriši objavu!'
}).then((result) => {
  if (result.value) {
    document.getElementById('predaj').submit();
  }
})
};
</script>           
@endsection
