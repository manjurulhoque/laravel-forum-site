@extends('main')
@section('title', '| View Post')
@section('content')
<div class="row">
  <div class="col-md-8">
    <h1>{{ $post->title }}</h1>
    <p class="lead">{!! $post->body !!}</p>
    <hr>
  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <label>Category:</label>
        <p>{{ $post->category->name }}</p>
      </dl>
      <dl class="dl-horizontal">
        <label>Created At: {{ $post->created_at->diffForHumans() }}</label>
        <dd></dd>
      </dl>
      <dl class="dl-horizontal">
        <label>Last Updated: {{ $post->updated_at->diffForHumans() }}</label>
      </dl>
      <hr>
       @if(Auth::check() && Auth::id() == $post->user_id)
        <div class="row">
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}
          </div>
          <div class="col-sm-6">
          
              {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
              {!! csrf_field() !!}
              {{-- {!! Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class' => 'btn btn-danger btn-block')) !!} --}}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
              {!! Form::close() !!}
          </div>
        </div>
      @endif
      <div class="row">
        <div class="col-md-12">
          {{ Html::linkRoute('home', '<< See all posts', [], ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top: 20px']) }}
        </div>
      </div>
    </div>
  </div>
</div>
@if(Auth::check())
  <div class="row">
    <div class="col-md-12">
      <ul class="list-group">
        @forelse($post->comments as $comment)
          <li class="list-group-item" style="font-size:30px">{{ $comment->body }} <small style="font-size:15px">{{ $comment->user->name }}</small></li>
        @empty
          <h3>No Comments yet. Be first</h3>
        @endforelse
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
        {!! Form::open(array('route' => 'comments.store')) !!}
            {!! csrf_field() !!}

            {{ Form::hidden('post_id', $post->id) }}

            {{ Form::label('body', 'You comment:') }}
            {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => '']) }}

            <br>
            {{ Form::submit('Add Comment', ['class' => 'btn btn-success btn-block']) }}

        {!! Form::close() !!}
    </div>
  </div>
@else
  <h2>Please sign in to comment</h2>
@endif
@endsection