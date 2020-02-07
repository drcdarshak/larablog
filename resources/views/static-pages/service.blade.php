@extends('common-files.app')

    @section('content')
        <div class="container">
            <h1>{{$title}}</h1>
            <h2>Services we provide are</h2>
            @if(count($services)>0)
                <ul>
                    @foreach($services as $service)
                        <li class="list-group-item">{{$service}}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endsection