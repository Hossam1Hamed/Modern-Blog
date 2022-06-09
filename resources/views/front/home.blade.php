@extends('layouts.app')

@section('content')

<div>
<a href="{{ route('post.create') }}"><button class="btn btn-secondry">Add New Post</button></a>
</div>

@foreach($posts as $post)

<div class="card mb-4">
  <div class="card-body">
    <a href="{{route('post.showOnePost',$post->id)}}"><h5 class="card-title">{{$post->title}}</h5></a>
    <p class="card-text">{{$post->content}}</p>
    <div>
    @foreach($post->tags as $tag)
    <a href=""><span class="badge bg-secondary">#{{$tag->name}}</span></a>
    @endforeach
    </div>
    <div class="m-2">
      <a href="{{route('post.showOnePost',$post->id)}}"><button type="button" class="btn btn-info">conmments</button></a>
    </div>
    <div>
    <p class="card-text"><small class="text-muted">created at  : {{$post->created_at}}</small></p>
    <p class="card-text"><small class="text-muted">updated at : {{$post->updated_at}}</small></p>
    </div>
  </div>
  <div>
    <span>written by : </span>
    <a href=""><button type="button" class="btn btn-primary">{{Auth::user()->name}}</button></a>
  </div>
</div>

@endforeach
@endsection
