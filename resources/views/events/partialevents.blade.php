<!-- list events -->

  <div class="album jumbotron">

 
    @foreach ($events as $event)
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


        <div class="event-div col-6">   
          <div class="event-name"> {{$event->name}} </div>
          <div class="event-description"> {{$event->description}} </div>
          <p class="event-creator" style="display: none;"> {{$event->creator->name}} </p>
          <?php echo '<p class="eventDateTime"> starting at ' . $string . '</p>'; ?>  
        </div>
      
      </div>

    </div>  
    @endforeach

  </div>