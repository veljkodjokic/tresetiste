@extends('layouts.app')

@section('content')
    <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
    <div id="new-article">
         {!! Form::open(['url'=>'/admin/alt-objava', 'method'=>'POST']) !!}
         <label for="title" class="col-md-4 control-label">Naslov</label>
         {!! Form::hidden('id', $article->id ) !!}
         {!! Form::text('title',$article->title,['id'=>'title','style'=>'width: 99%; margin-bottom:15px; position: relative;', 'class'=>'form-control']) !!} <label for="text" class="col-md-4 control-label">Tekst</label><br>
         {!! Form::textarea('text',$article->text,['id'=>'text','style'=>'min-height: 200px;width: 99%;position: relative;', 'class'=>'form-control']) !!}<br>
         {!! Form::submit('Izmeni',['class'=>'btn btn-primary', 'id'=>'static_save']) !!}
         {!! Form::close() !!}
    </div>
    <script type="text/javascript">
        CKEDITOR.replace ('text');
    </script>    
@endsection
