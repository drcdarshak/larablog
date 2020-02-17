@extends('common-files.app')

@section('content')
    <!-- <h1>Blogs</h1> -->

    @if(count($blogs) > 0)
        @foreach($blogs as $blog)
            <div class='row'>
                <div class="col-md-4">
                    <img style="width:100%;" src="/storage/app/public/cover_images/{{$blog->cover_image}}" alt="">
                </div>
                <div class="col-md-8">
                    <a href="/blogs/{{$blog->id}}"><h2>{{$blog->title}}</h2> </a>
                    <small>by {{$blog->user->name}}</small> 
                    <p>{{$blog->description}}</p>
                </div>
            </div>
        @endforeach
        {{$blogs->links()}}
    @else
        <p>No Blogs Found</p>
    @endif

@endsection