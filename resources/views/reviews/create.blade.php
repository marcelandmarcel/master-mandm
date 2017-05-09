@extends('layouts.master')


@section('content')

	<div class="col-sm-8">

		<h1>Review</h1>

		<form method="POST" action="/reviews">
			
			{{csrf_field()}}


			<div class="form-group">

				<label for="name">Name:</label>

				<input type="text" name="name" id="name" class="form-control">		

			</div>



			<div class="form-group">

				<label for="email">Email:</label>

				<input type="email" name="email" id="email" class="form-control" required>

			</div>

@endsection

@include('layouts.errors')
