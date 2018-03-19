@extends('layouts.app')

@section('content')
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<h3>Kontaktirajte nas</h3>
    {!! Form::open(['url'=>'/kontakt','class'=>"form-horizontal AVAST_PAM_nonloginform", 'id'=>"contact_form", 'method'=>'POST']) !!}
            <div class="form-group">
        
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="ime" id="ime" placeholder="Ime" class="form-control" value="" type="text">
                    </div>
                            </div>
            </div>
        
        
            <div class="form-group">
        
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input name="email" id="email" placeholder="E-Mail " class="form-control" value="" type="text">
                    </div>
                            </div>
            </div>
        
        
            <div class="form-group">
        
                <div class="col-md-12 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <textarea class="form-control" rows="5" name="poruka" id="poruka" placeholder="Komentar" value="" style="resize: none;"></textarea>
                    </div>
                            </div>
            </div>
        
            <div class="form-group">
        
                <div class="col-md-12">
                    {!! Form::submit('Pošalji',['class'=>'btn btn-primary', 'id'=>'posalji']) !!}
                </div>
            </div>
    {!! Form::close() !!}  
    <br>
    <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
    Kontakt:
    <b>Broj</b>              

@endsection    