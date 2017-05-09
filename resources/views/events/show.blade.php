@extends('layouts.master')



@push('styles')

<link href="/css/wine.css" rel="stylesheet">

@endpush

@section('content')

  <div class="wine-card">

    <div class="row">
    <div class="col-12">    
      
      <div class="col-6 wine-sho-image">   
        
        <img src="/storage/{{ $wine->image }}" class="wine-pic-xl" alt="WineImage" />
   
        <div class="reviewers">
        @foreach($wine->reviews as $review)

            
                <div class="reviewer media" id="{{$review->id}}" data-toggle="tooltip" data-placement="right" title="{{$review->user->name}}"><img src="{{$review->user->avatar}}" class="img-reviewer"></div>
            
            
            @foreach($review->getFullReview() as $attribute => $value)
            
            <div class="review-hidden-{{$attribute}}" style="display: none" id="review-{{$review->id}}-{{$attribute}}">
              {{$value}}
            </div>
            
            @endforeach

        @endforeach
        </div>

      </div>


      <div class="col-6 wine-sho-description">

        <p class="card-text wine-region wine-{{$wine->color}}"> {{$wine->region}} </p>
        <p class="card-text wine-name"> {{$wine->name}} </p>
        <p class="card-text wine-appelation"> {{$wine->appelation}} </p>
        <p class="card-text wine-producer"> {{$wine->producer}} </p>  
        <p class="card-text wine-millesime"> {{$wine->millesime}} </p>  

      </div>

@foreach ($wine->grapeSoilAndAged() as $attribute => $value)
        <div class="wine-attribute-row row">

          <div class="wine-attribute">
            
            <img src="/storage/wines/icone/{{ $attribute }}.jpg" class="center-block wine-attribute-pic img-responsive">

          </div>

          <div class="wine-value">
            {{$value}}
          </div>

        </div>

@endforeach

@foreach ($wine->masterReview() as $attribute => $value)

        <!-- master hidden review to recover the masterReview-->
        <div class="review-hidden-{{$attribute}}" style="display: none" id="MasterReview-{{$attribute}}">
          {{$value}}
        </div>

        <div class="wine-attribute-row row">

          <div class="wine-attribute">
            
            <img src="/storage/wines/icone/{{ $attribute }}.jpg" class="center-block wine-attribute-pic img-responsive">

          </div>

          <div class="wine-value wine-{{ $attribute }}">
            {{$value}}
          </div>

        </div>

@endforeach

      
      
    
    </div>
    </div>

  </div>



@endsection

@push('scripts')

<script>

  $(function(){
    $('[data-toggle="tooltip"]').tooltip()
  });

  $('.reviewer').tooltip();

  $('.reviewer').click(function() {
      // get the contents of the link that was clicked
      var reviewid = $(this).attr('id');

  <?php  $arrayRev = array("eye"=>0,"nose"=>0,"taste"=>0,"pairing"=>0);?>
  @foreach($arrayRev as $attribute => $value)
      $('.wine-{{ $attribute }}').fadeOut('slow', function() {
        // replace the contents of the div with the reviewer div
        $('.wine-{{ $attribute }}').text($('#review-'+ reviewid +'-{{$attribute}}').text());
        $('.wine-{{ $attribute }}').fadeIn();

        var timer = setTimeout(function(){
          $('.wine-{{ $attribute }}').text($('#MasterReview-{{$attribute}}').text());
        }, 5000);

  });

  @endforeach

      // cancel the default action of the link by returning false
      return false;
  });

</script>
@endpush

