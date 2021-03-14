@extends('template')

@section('content')
    <br>
    <h1>Blog</h1>
    @foreach($posts as $post)
        <h2>{{ $post->title }} </h2>
        <i>Updated at {{ $post->created_at_format }}</i>
        <p>{{ $post->content }}</p>
        <b>Tags:</b><br>
        <ul>
            @foreach($post->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>

        <h4>Comments</h4>
        @foreach($post->comments as $comment)

            <b>Name: </b>  {{ $comment->name }}
            <b>Comment: </b>  {{ $comment->comment }}
            <hr>

        @endforeach
    @endforeach

@endsection
