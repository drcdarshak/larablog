@extends('common-files.app')

@section('content')

    <div class="container">
        <h2>Edit Blog</h2>
        {!! Form::open(['action' => ['BlogsController@update',$blog->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
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
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class'=>'btn brn-primary'])}}
        {!! Form::close() !!}
    </div>

@endsection()