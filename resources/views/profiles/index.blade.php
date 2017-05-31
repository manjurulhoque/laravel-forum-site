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
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							@if(Auth::user()->profile->about == null)
								<a href="{{ route('profiles.create') }}">
							@else
								<a href="{{ route('profiles.edit', $profile->id) }}">
							@endif
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
				<h3>Location: @if($profile){{ Auth::user()->profile->location }}@endif <br/></h3>
				<h3>About: @if($profile){{ Auth::user()->profile->about }}@endif</h3>
            </div>
		</div>
	</div>
@stop