@extends('layouts.app')

@section('content')


        @if(isset($artists))
        <div class="container">
        <div class="row">
          <div class="col-5 col-sm-6 col-md-3 col-lg-3 justify-content-center" style="text-align: right;">
            <img class="img-fluid img-circle" src="{{$artists->artists[0]->images[0]->url}}" alt="" style="width: 60%; ">
          </div>
          <div class="col-7 col-sm-6 col-md-9 col-lg-9" >
             <h2>{{$artists->artists[0]->name}}</h2>
             <a href="{{$artists->artists[0]->external_urls->spotify}}" class="btn btn-success" target="_blank">Ver en Spotify</a>
          </div>
         <div class="col-5 col-sm-6 col-md-3 col-lg-3 justify-content-center" style="text-align: right;">
           &nbsp;
          </div>
    <div class="col-12 col-sm-12 col-md-9 col-lg-9" >     
        <table id="albums" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th></th>
            <th>Foto</th>
            <th>Album</th>
            <th>Canción</th>
          </tr>
          </thead>
          <tbody>
             @foreach ($albums->items as $album) 
            <tr>
              <th></th>
              <td><img src="{{$album->images[2]->url}}" alt=""></td>
             <td>{{$album->name}}</td>
              <td>{{$album->name}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        </div>
      </div>
           
        @else
        <a href="{{ url('/login/spotify') }}" class="btn btn-success">Ingresar a Spotify</a>
        @endif
  
@endsection