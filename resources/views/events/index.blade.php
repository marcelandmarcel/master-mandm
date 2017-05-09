@extends('layouts.master')


@push('styles')

<link href="/css/event.css" rel="stylesheet">

@endpush

@section('content')


    <section class="jumbotron text-center winbook-jumb">
      <div class="container">
        <h2>Events</h2>

        <p class="p-justify-marcel">
          - Our "Marcel&marcel Atelier" chaired by a sommelier offers a rich experience over wine tasting, pairing and discovering.
          We humbly try to bring to your attention the very best rare wine productions at fair price.
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
    </section>

<!-- upcoming events -->
<h1>Upcoming</h1>

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
<h1>Past</h1>

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

$('.login-fadeout').fadeOut( 5000, "linear");

</script>

@endpush
