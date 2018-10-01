@extends('layouts.app')

@section('content')      
        <div class="container">
            <div class="row justify-content-center">
            <div class="content">
                <div class="h1">
                    Laravel
                </div>

                <div class="links">
                     <a href="{{ url('/login/spotify') }}" class="btn btn-success">Ingresar a Spotify</a>
                </div>
            </div>
        </div>
    </div>
@endsection
