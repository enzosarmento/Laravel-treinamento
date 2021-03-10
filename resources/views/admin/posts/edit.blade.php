@extends('template')


@section('content')

    <h1>Edit Post: {{ $post->title }}</h1>

    @if($errors->any())

        <ul class="alert">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    @endif

    {{ Form::model($post, ['route'=>['admin.posts.update', $post->id], 'method'=>'put']) }}

        @include('admin.posts._form')

        <div class="form-group">
            {{ Form::label('tags', 'Tags:', ['class' => 'control-label']) }}
            {{ Form::textarea('tags', $post->tagList, ['class'=> 'form-control']) }}
        </div>

        <div class="form-group">
            {{ Form::submit('Save', ['class'=>'btn btn-primary']) }}
        </div>


    {{ Form::close() }}



@endsection
