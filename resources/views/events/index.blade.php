@extends('layouts.master')


@push('styles')

<link href="/css/event.css" rel="stylesheet">

@endpush

@section('content')

<div class="text-center jumbotron">
  <h1>Wine tasting Events</h1>
</div>

<div class="event-intro text-center">
         <p class="p-justify-marcel">

         - On our monthly <span style="font-weight: 500">Marcels event</span>, we invite in the shop our customers to give their reviews on the selection and new references to come. It is a good occasion to taste well crafted food and wines in a friendship atmosphear. <span style="font-weight: 500">You'll also have the chance to win one of the 2 mystery bottles...</span>
         </p>
         <br>
         <p class="p-justify-marcel">
          - Our "Marcel&marcel Atelier" chaired by a sommelier offers a rich experience over wine tasting, pairing and discovering.
        </p>


        @if (Auth::check() && Auth::user()->role_id == 1)
          
            <a href="/admin/events" class="btn btn-primary btn-marcel" id="btn-review-event">manage events</a>
                

        @endif

        @if (Auth::check())
          
          
            <a href="{{ URL::route('events.create') }}" class="btn btn-primary btn-marcel" id="btn-review-event">Book an event</a>
           

        @else

          <p class="login-fadeout">
            <a href="{{ URL::route('sessions.create') }}" class="mmlink">login/register</a> to book a tasting event!
          </p>   

        @endif
</div>

<!-- upcoming events -->
<h2>Upcoming</h2>

  <div class="album jumbotron">

    @foreach ($nextEvents as $event)
        
    <div class="container">

        <div class="row event-list">

          <div class="event-image">    

            <a href="{{ URL::route('events.show', $event->id) }}">
            
              <img src="/storage/{{ $event->image }}" class="eventImage" alt="EventImage" />

            </a>

          </div>

    @if($event->start_at)

        <div class="date">
        <?php 
            $datetime = strtotime($event->start_at);
            
            // Month and day are in absolute position
            echo '<div class="eventDate">';
            echo '<div class="eventDateMonth">' . date('M', $datetime) . '</div>';
            echo '<div class="eventDateDay">'. date('d', $datetime) . '</div>';
            echo '</div>';

            $string = date('g.i a', $datetime); ?>
            
        </div>         
       

    @endif


        <div class="event-div col-7">   
          <div class="event-name"> {{$event->name}} </div>
          <div class="event-description"> {{$event->description}} </div>
          <p class="event-creator" style="display: none;"> {{$event->creator->name}} </p>
          <?php echo '<p class="eventDateTime"> starting at ' . $string . '</p>'; ?>  
        </div>
      
      </div>

    </div>

    @endforeach

  </div>


<!-- upcoming events -->
<h2>Past</h2>

    <div class="album jumbotron">
      <div class="container"> 

    @foreach ($pastEvents as $event)
          
        <div class="row">

          <div class="event-image">    

            <a href="{{ URL::route('events.show', $event->id) }}">
            
              <img src="/storage/{{ $event->image }}" class="eventImage" alt="EventImage" />

            </a>

          </div>

    @if($event->start_at)

        <div class="date">
        <?php 
            $datetime = strtotime($event->start_at);
            
            // Month and day are in absolute position
            echo '<div class="eventDate">';
            echo '<div class="eventDateMonth">' . date('M', $datetime) . '</div>';
            echo '<div class="eventDateDay">'. date('d', $datetime) . '</div>';
            echo '</div>';

            $string = date('g.i a', $datetime); ?>
            
        </div>         
       

    @endif


        <div class="event-div">   
          <div class="event-name"> {{$event->name}} </div>
          <div class="event-description"> {{$event->description}} </div>
          <p class="event-creator" style="display: none;"> {{$event->creator->name}} </p>
          <?php echo '<p class="eventDateTime"> starting at ' . $string . '</p>'; ?>  
        </div>
      
      </div>


    </div>
  
    @endforeach

        </div>

      </div>
    </div>


@endsection

@push('scripts')

<script>

//$('.login-fadeout').fadeOut( 5000, "linear");

</script>

@endpush
