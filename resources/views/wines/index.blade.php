@extends('layouts.master')


@push('styles')

<link href="/css/wine.css" rel="stylesheet">

@endpush

@section('content')


    <section class="text-center winbook-jumb">
      <div class="container">
        <p class="lead">A fine selection of our confidential wines.</p>

        @if (Auth::check())
          <!--<p>
            <a href="{{ URL::route('reviews.create') }}" class="btn btn-primary btn-marcel" id="btn-review-wine">Review a wine<span class="jauge-vin"></span></a>
            <a href="" class="btn btn-primary btn-marcel" id="btn-vote-wine">Vote for a wine<span class="jauge-vin"></span></a>
          </p>-->

        @else

          <p class="login-fadeout">
            <a href="{{ URL::route('sessions.create') }}" class="mmlink">login</a> to review or vote for a wine that you tasted
          </p>          

        @endif
      
      </div>
    </section>

    <div class="album text-muted">
      <div class="container">

        <div class="row">
  
  @foreach ($wines as $wine)
          
          <div class="wine-card">

            <div class="row">
              
              <div class="wine-description">   
                <p class="card-text wine-region wine-{{$wine->color}}"> {{$wine->region}} </p>
                <p class="card-text wine-name"> {{$wine->name}} </p>
                <p class="card-text wine-appelation"> {{$wine->appelation}} </p>
                <p class="card-text wine-producer"> {{$wine->producer}} </p>  
              </div>
            
              <div class="wine-image ml-auto">    

                <a href="{{ URL::route('wines.show', $wine->id) }}">
                
                  <img src="/storage/{{ $wine->image }}" class="wineImagexs" alt="WineImage" />

                </a>

              </div>

            </div>

            <div class="row">  
              <div class="">
        

        @foreach ($wine->wineDescrip() as $attribute => $value)

 
                <div class="wine-attribute-row row">

                  <div class="wine-attribute">
                    
                    <img src="/storage/wines/icone/{{ $attribute }}.jpg" class="center-block wine-attribute-pic img-responsive">

                  </div>

                  <div class="wine-value">
                    {{$value}}
                  </div>

                </div>

        @endforeach
              
              </div>

            </div>


            <p class="card-text">
            </p>

          </div>
  
  @endforeach

        </div>

      </div>
    </div>

@endsection

@push('scripts')

<script>

$('.login-fadeout').fadeOut( 5000, "linear");

</script>

@endpush

