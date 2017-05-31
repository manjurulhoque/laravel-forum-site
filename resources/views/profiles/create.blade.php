@extends('main')

@section('title', '| User profile')
@section('stylesheets')
{{Html::style('css/profile.css')}}
@stop
@section('content')
<div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic">
					@if($profile)
						<img src="{{asset('/images/profiles/' . $profile->image)}}" class="img-responsive">
					@else
						<img src="{{asset('/images/avatar.png')}}" class="img-responsive">
					@endif
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ Auth::user()->name }}
					</div>
					<div class="profile-usertitle-job">
						About me
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">Follow</button>
					<button type="button" class="btn btn-danger btn-sm">Message</button>
				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li>
							<a href="{{ route('profiles.index') }}">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li class="active">
							<a href="{{ route('profiles.create') }}">
							<i class="glyphicon glyphicon-user"></i>
							Edit Account </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
			   {!! Form::open(array('route' => 'profiles.store', 'files' => true)) !!}
                    {!! csrf_field() !!}

                    {{ Form::label('location', 'Location:') }}
                    {{ Form::text('location', null, ['class' => 'form-control']) }}

                    {{ Form::hidden('user_id', Auth::id()) }}

                    {{ Form::label('image', 'Upload a Profile Image') }}
                    {{ Form::file('image', ['class' => 'form-control']) }}

                    {{ Form::label('about', 'About:') }}
                    {{ Form::textarea('about', null, ['class' => 'form-control', 'rows' => '3']) }}

                    <br>
                    {{ Form::submit('Create', ['class' => 'btn btn-danger btn-block']) }}

                {!! Form::close() !!}
            </div>
		</div>
	</div>
@stop