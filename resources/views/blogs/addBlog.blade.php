@extends('common-files.app')

@section('content')

    <div class="container">
        <h2>Add Blog</h2>
        {!! Form::open(['action' => 'BlogsController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
            <div class='form-group'>
                {{ Form::label('title', 'Title', ['class' => 'awesome'])}}
                {{ Form::text('title',isset($blog->title) ? $blog->title : '',['class' => 'form-control','placeholder'=> 'Title'])}}
            </div>
            <div class='form-group'>
                {{ Form::label('description', 'Description', ['class' => 'awesome'])}}
                {{ Form::textarea('description',isset($blog->description) ? $blog->description : '',['class' => 'form-control','placeholder'=> 'Description'])}}
            </div>
            <div class='form-group'>
                {{ Form::label('image','Cover Image')}}
                {{ Form::file('cover_image')}}
            </div>
            {{Form::submit('Submit',['class'=>'btn brn-primary'])}}
        {!! Form::close() !!}
    </div>

@endsection()