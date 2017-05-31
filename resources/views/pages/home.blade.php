@extends('main')

@section('title', '| All posts')

@section('content')
  <div class="row">
    <div class="col-md-10">
      <h1>All posts</h1>
    </div>
    <div class="col-md-2">
      @if(Auth::check())
        <a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-margin">Create new posts</a>
      @endif
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      @forelse ($posts as $post)
        <div  class="well">
          <div class="media">
            <div class="media-left media-middle">
              <img src="{{asset('/images/profiles/' . $post->user->profile['image'])}}" class="media-object" style="width:60px">
              <p class="text-right">By: <strong>{{ $post->user->name }}</strong></p>
            </div>
            <div class="media-body" style="padding-left:60px;">
              <h4 class="media-heading">{{ $post->title }}</h4>
              
              <p>{!! substr($post->body, 0, 15) !!}{{strlen($post->body) > 15 ? "..." : ""}}</p>
              <img src="{{asset('/images/thumbnails/' . $post->thumbnail)}}" class="media-object" style="width:60px">
              <p>Posted at: {{ $post->created_at->diffForHumans() }}</p>
              <p>{{ $post->comments->count() }} comments</p>
              <p>
                <a href="{{route('posts.show', $post->id)}}" class="btn btn-success">View</a>
                @if(Auth::check() && Auth::id() == $post->user_id)
                  <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
                @endif
              </p>
            </div>
          </div>
        </div>
      @empty
        <h3>No Posts Found</h3>
      @endforelse
      <div class="text-center">
        {!! $posts->links() !!}
      </div>
    </div>
  </div>
@stop
