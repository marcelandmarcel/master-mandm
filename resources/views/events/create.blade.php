
@extends('layouts.master')

@push('styles')

<link href="/css/bootstrap-datetimepicker.css" rel="stylesheet">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

@endpush

@section('content')

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

<div class="col-sm-8">


  {!! Form::open(array('route' => 'events.create', 'class' => 'form container')) !!}

  {{csrf_field()}}

  <h4>Book a tasting Event!</h4>
  <br>
  <div class="form-group col-8 col-md-8 col-lg-8">

      {!! Form::label('Name') !!}
      {!! Form::text('name', (Auth::check() && Auth::user()->name ) ? 'Tasting event with ' . Auth::user()->name : '', 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Event name')) !!}


  </div>

  <div class="form-group col-8 col-md-8 col-lg-8">

      {!! Form::label('When') !!}
      {!! Form::text('start_at', '', 
          array('required', 
                'class'=>'form-control datepicker',
                'id'=>'start_at')) !!}


  </div>


  <div class="form-group col-8 col-md-8 col-lg-8">

      {!! Form::label('Open event? ') !!}
      {!! Form::select('type', $event->getTypes(), null, ['class'=>'type-select']) !!}


  </div>

  <div class="form-group col-8 col-md-8 col-lg-8">

      {!! Form::label('How many attendees?') !!}
      {!! Form::text('nb_attendees', '', 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'1')) !!}


  </div>


  <div class="form-group col-8 col-md-8 col-lg-8">
      {!! Form::label('Your E-mail Address') !!}
      {!! Form::text('email', (Auth::check() && Auth::user()->email ) ? Auth::user()->email : '', 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Your e-mail address')) !!}
  </div>


  <div class="form-group col-12 col-md-12 col-lg-12">
      {!! Form::label('Description') !!}
      {!! Form::textarea('description', null, 
          array( 'class'=>'form-control', 
                'placeholder'=>'description')) !!}
  </div>


  <div class="form-group col-6 col-md-6 col-lg-6">

    <button type="submit" id="completed-task" class="btn-primary btn">
        <i class="voyager-paper-plane"></i> book this event!
    </button>

  </div>
  {!! Form::close() !!}

</div>

@endsection

@push('scripts')

<script src="{{ asset('js/moment.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>


<script>

$(function () {
                $('#start_at').datetimepicker({
                icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
                },
                format: "YYYY-MM-DD hh:mm",
                sideBySide: true
            });
            });


</script>

@endpush

@include('layouts.errors')
