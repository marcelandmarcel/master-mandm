@extends('layouts.master')

@push('styles')

<link href="/css/about.css" rel="stylesheet">

@endpush

@section('content')


<div class="text-center jumbotron">
	<h1>About us</h1>
</div>

<div>


@include('about.Partial')

</div>

<br>
<br>

<div class="text-center jumbotron">
	<h1>Genesis</h1>
</div>

<!--<div class="row">-->

	<div class="">	
		<p >Once upon a time, there were two fellows adventurers, crazy about climbing. Both friends shared also an equal taste for food and rare wines. 
	During a particularly hazardous journey, while they had been through a long and squeezing storm,
	they reached a middle-of-nowhere village in a lost valley of the deep french alps. 
	They were as much exhausted as starved not to mention the killing thirst which consumed their last forces.</p>
	<p>
	Through the snow-flocks a trembling light sparkled in the darkness out of an isolated house. It was a bar. For their great surprise all consumers, a bunch of authentic natives, would all be named after “Marcel”. All were testing a subtile combination of local cheeses with, most unlikely to be found in such a place, local wines and alcohols.</p>
	<p>
	Suspecting that the several “Marcel” were trying to make a fool of them, they started to call themselves in the same way. Not only Nobody cared, but locals adopted them naturally, sharing their food and wines with them. Each cheese had to be tasted with a wine, each pâté with another one, suggesting a pairing expertise that they would not have guessed in such a place.
	From that day on, they decided to keep Marcel & marcel as their nickname, embodying closely both their adventures and their gastronomic experiences.</p>
	 
	 
	</div>



		<img src="/storage/pages/papa_marcel.jpg" class="image-about testmm ml-auto">

<!--</div>-->

<div>
	


</div>

<div class="text-center">
	<a href="//marcelandmarcel.com/english/wine%20book.html" onclick=""><span class="red-link">See Selection</span></a>
</div>



@endsection