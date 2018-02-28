@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="background-color: transparent;">
            <div class="panel panel-default" style="background-color: transparent; border-color: transparent;">
                <div class="panel-heading" style="background-color: transparent;"><img src="/pics/page-header.jpg" style="width: 100%; max-height: 315px;"></div><br>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    ISTORIJA >> 2006      
                </div>
            </div>
        </div>
</div>

@endsection
