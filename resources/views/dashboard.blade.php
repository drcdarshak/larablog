@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h3>Your blogs</h3>
                    <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <th colspan="2" class="text-center">Actions</th>
                    </tr>
                    @if(count($blogs)>0)
                        @foreach($blogs as $blog)
                            <tr>
                                <th>{{$blog->title}}</th>
                                <th class="text-center"><a href="/blogs/{{$blog->id}}/edit" class="btn btn-primary">Edit</a></th>
                                <th class="text-center">
                                {!!Form::open(['action'=>['BlogsController@destroy',$blog->id],'method'=>'POST'])!!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                {!!Form::close()!!}
                                </th>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>No blogs found</td>
                        </tr>
                    @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
