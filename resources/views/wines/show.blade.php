@extends('layouts.master')



@push('styles')

<link href="/css/wine.css" rel="stylesheet">

@endpush

@section('content')

  <div class="wine-card">

    <div class="row">
  
      <div class="col-6 wine-sho-description">

        <p class="card-text wine-region wine-{{$wine->color}}"> {{$wine->region}} </p>
        <p class="card-text wine-name"> {{$wine->name}} </p>
        <p class="card-text wine-appelation"> {{$wine->appelation}} </p>
        <p class="card-text wine-producer"> {{$wine->producer}} </p>  
        <p class="card-text wine-millesime"> {{$wine->millesime}} </p>  

      </div>

      <div class="col-6 wine-sho-image">   
        
        <img src="/storage/{{ $wine->image }}" class="wine-pic-xl" alt="WineImage" />
   
        <div class="reviewers">
        @foreach($wine->reviews as $review)

            
                <div class="reviewer media" id="{{$review->id}}" data-toggle="tooltip" data-placement="left" title="{{$review->user->name}}"><img src="{{$review->user->avatar}}" class="img-reviewer"></div>
            
            
            @foreach($review->getFullReview() as $attribute => $value)
            
            <div class="review-hidden-{{$attribute}}" style="display: none" id="review-{{$review->id}}-{{$attribute}}">
              {{$value}}
            </div>
            
            @endforeach

        @endforeach
        </div>

      </div>

    </div>
@foreach ($wine->grapeSoilAndAged() as $attribute => $value)
        <div class="wine-attribute-row row">

          <div class="wine-attribute">
            
            <img src="/storage/wines/icone/{{ $attribute }}.jpg" class="center-block wine-attribute-pic img-responsive">

          </div>

          <div class="wine-value wine-sho-value">
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

          <div class="wine-value wine-{{ $attribute }} wine-sho-value">
            {{$value}}
          </div>

        </div>

@endforeach

</div>
     


@if (Auth::check())
<!-- review modal -->
<button class="btn btn-primary btn-marcel review" data-toggle="modal" data-target=".modal-review">Review this wine</button>

  <div class="modal fade modal-review" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">         

        <div class="modal-header">

          <div class="col-6 wine-sho-description">

            <p class="card-text wine-region wine-{{$wine->color}}"> {{$wine->region}} </p>
            <p class="card-text wine-name"> {{$wine->name}} </p>
            <p class="card-text wine-appelation"> {{$wine->appelation}} </p>
            <!--<p class="card-text wine-producer"> {{$wine->producer}} </p> --> 
            <!--<p class="card-text wine-millesime"> {{$wine->millesime}} </p>  -->

          </div>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <form method="POST" action="/wines/{{$wine->id}}/reviews/">

        {{ csrf_field() }}

    @foreach ($wine->masterReview() as $attribute => $value)

          <div class="wine-attribute-row row">

            <div class="wine-attribute col-1 col-sm-1">
              
              <img src="/storage/wines/icone/{{ $attribute }}.jpg" class="center-block wine-attribute-pic img-responsive" >

            </div>

            <div class="form-group col-8 col-sm-8">
              <textarea name="{{ $attribute }}" placeholder="your {{ $attribute }}..." class="form-control" cols="100" rows="2" required></textarea>
            </div>

          </div>

    @endforeach
            <div class="form-group col-8 col-sm-8">
              <input name="wine_id" value="{{$wine->id}}" class="form-control" type="hidden">
            </div>

    <div class="row lead">
        <div id="hearts" class="starrr"></div>
        You gave a rating of <span id="count">0</span> heart(s)
  </div>
    
    <div class="row lead">
        <p>Also you can give a default rating by adding attribute data-rating</p>
        <div id="hearts-existing" class="starrr" data-rating='4'></div>
        You gave a rating of <span id="count-existing">4</span> heart(s)
    </div>
          
          <div class="modal-footer">
            <div class="form-group">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-marcel">save</button>
            </div>
          </div>

        </form>

      </div>
    </div>
  </div>
  <!-- end modal -->
@endif

        @include('layouts.errors')


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

  /*$('.btn-review-wine').click(function() {

  )};*/

</script>
<script src="{{ asset('js/wine.js') }}"></script>

@endpush



