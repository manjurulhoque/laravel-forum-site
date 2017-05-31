@extends('main')

@section('title', '| Edit Post')

@section('content')

  <div class="row">

    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}{{-- Bind model into form --}}
    <div class="col-md-8">
      {{ Form::label('title', 'Tilte:') }}
      {{  Form::text('title', null, ['class' => 'form-control input-lg']) }}

      {{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
      {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

      {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
      {{ Form::textarea('body',null, ['class' => 'form-control']) }}
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <dt>Created At:</dt>
          <dd>{{ date('M j, Y H:ia', strtotime($post->created_at))}}</dd>
        </dl>
        <dl class="dl-horizontal">
          <dt>Last Updated:</dt>
          <dd>{{ date('M j, Y H:ia', strtotime($post->updated_at))}}</dd>
        </dl>
        <hr>
        <div class="row">
          <div class="col-sm-6">
            {{ Form::submit('Save changes', ['class' => 'btn btn-success btn-block']) }}
          </div>
          <div class="col-sm-6">
            {!! Html::linkRoute('posts.update', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
          </div>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>

@stop


