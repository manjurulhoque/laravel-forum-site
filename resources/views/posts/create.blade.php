@extends('main')

@section('title', '| Create question')

@section('content')
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(array('route' => 'posts.store', 'files' => true)) !!}
                {!! csrf_field() !!}

                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}

                {{ Form::hidden('user_id', Auth::id()) }}

                {{ Form::label('category_id', 'Category:') }}
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
						<option value='{{ $category->id }}'>{{ $category->name }}</option>
					@endforeach
				</select>

                {{ Form::label('image', 'Upload a Featured Image') }}
				{{ Form::file('image', ['class' => 'form-control']) }}

                {{ Form::label('body', 'Description:') }}
                {{ Form::textarea('body', null, ['class' => 'form-control']) }}

                <br>
                {{ Form::submit('Create', ['class' => 'btn btn-danger btn-block']) }}

            {!! Form::close() !!}
        </div>
    </div>

@endsection