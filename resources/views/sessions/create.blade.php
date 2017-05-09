
@extends('layouts.master')


@section('content')

	<div class="col-sm-8">

		<h1>Sign in</h1>
		
		<form method="POST" action="/login">
			
			{{csrf_field()}}


			<div class="form-group">

				<label for="email">Email:</label>

				<input type="email" name="email" id="email" class="form-control" required>

			</div>


			<div class="form-group">

				<label for="password">Password:</label>

				<input type="password" name="password" id="password" class="form-control" required>

			</div>

			
			<div class="form-group">

				<button type="submit" class="btn btn-primary btn-marcel">Sign In</button>

				<a href="{{ URL::route('registration.create') }}" class="">not yet a member, register</a>

		        <div class="social-login"> Or Sign in with: 
		            <a href="{{ url('/auth/google') }}" class="btn btn-google btn-marcel">Google login</a>
		            <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook btn-marcel">FB login</a>
		        </div>
	        </div>
			

		</form>
		
	</div>


@endsection


@include('layouts.errors')
