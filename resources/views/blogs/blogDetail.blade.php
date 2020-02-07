@extends('common-files.app')

@section('content')

    <div class="container">
        <a href="/blogs"><button class="btn btn-primary">Back</button></a>
        <div class="row">
            <h2>{{$blog->title}} </h2><h4>{{$blog->created_at}}</h4>          
        </div>
        <div class="row">
            <img style="width:100%;" src="/storage/cover_images/{{$blog->cover_image}}" alt="">
        </div>
        <div class="row">
            <p>{{$blog->description}}</p>
        </div>
    </div>

    @if(!Auth::guest() && Auth::user()->id == $blog->user_id)
        <a href="/blogs/{{$blog->id}}/edit"><button class="btn btn-primary">Edit</button></a>
        {!!Form::open(['action'=>['BlogsController@destroy',$blog->id],'method'=>'POST','class'=>'pull-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
        {!!Form::close()!!}
    @endif
@endsection()