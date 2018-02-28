@extends('layouts.app')

@section('content')
    @if(\Auth::User())
        <button type="button" class="btn btn-primary" onclick="window.location='{{ url("/admin/nova-objava") }}'">Nova Objava</button>
    @endif
    @foreach($articles as $article)
        <div id="article-wrapper">
            <div id="title"><b><a href="/objava/{{ $article->id }}" style="color:black">{{ $article->title }}</a></b></div>
            <div id="date">Objavljeno {{ $article->created_at->format('d.m.Y') }} u {{ $article->created_at->format('H:i') }}</div>
            <div id="article-img-div"><img src="/pics/jezero-tresetiste.jpg" id="article-img"></div>
            <div id="description">{!! Illuminate\Support\Str::limit($article->text, 600) !!} <a href="/objava/{{ $article->id }}">opširnije</a></div>
        </div><br><hr>
    @endforeach                
@endsection
