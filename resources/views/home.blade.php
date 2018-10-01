@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

        @if(isset($releases))
            @foreach ($releases->albums->items as $album)         
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 ml-auto row" style="margin-bottom: 10px;">
                    <div class="card" >
                      <img class="card-img-top" src="{{$album->images[0]->url}}" alt="Albun">
                      <div class="card-body">
                        <p class="card-text">{{$album->name}}</p>
                       <div style="position: relative;    bottom: 10px;">
                          @foreach($album->artists as $artista)
                            <span class="badge badge-pill badge-primary"><a href="{{ url('artista/' . $artista->id) }}" style="color: white;">{{$artista->name}}</a></span>
                          @endforeach 
                       </div>                        
                      </div>
                    </div>
                </div>
                
            @endforeach
        @else
        <a href="{{ url('/login/spotify') }}" class="btn btn-success">Ingresar a Spotify</a>
        @endif
        
</div>
</div>
@endsection
