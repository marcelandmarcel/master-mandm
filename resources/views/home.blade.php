@extends('layouts.master')

@push('styles')

<link href="/css/event.css" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

@endpush

@section('content')

<div class="marcel-page">
<div class="text-center jumbotron">
	<h1>Marcel &amp; marcel</h1>
	<p ><span class="textnormal">Confidential wines at fair price</span></p>
</div>

<div class="text-center">
	<a href="//marcelandmarcel.com/english/wine%20book.html" onclick=""><span class="red-link">See Selection</span></a>
</div>

</div>
<br><br>


<!-- about excerpt -->
<div class="text-center jumbotron">
	<h3>About us</h3>
</div>

<div class="about-partial row">
	<div class="col-6 col-md-6 col-lg-6">
		<img src="/storage/pages/marcel-picole.jpg" class="ml-auto" width="80%">
	</div>
	<div class="col-6 col-md-6 col-lg-6">
	Marcel & marcel, is a fairy tail for conoisseurs, 
	An illusion for lost travelers. 
	This is the story of a legendary tavern, 
	where everybody drinks the same wine, 
	where everybody is called Marcel...
		<div class="text-center">
			<a href="/about" onclick=""><span class="red-link">Read more...</span></a>
		</div>
	</div>
</div>

<br>


<!-- events excerpt -->
<?php

$events = App\Event::ofDate('up')->ofType('open')->get();
if(count($events)){

	echo '<div class="text-center jumbotron">';
	echo '<h3>Upcoming Events</h3>';
	echo '</div>';

}
?>


@include('events.partialevents', array('events' => $events))

@include('layouts.share', ['url' => 'http://www.marcelandmarcel.com/'])

@endsection
