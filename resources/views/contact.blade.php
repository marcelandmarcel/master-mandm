@extends('layouts.master')

@push('styles')

<link href="/css/contact.css" rel="stylesheet">

@endpush


@section('content')


<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

<div class="row">
<div class="main-contact col-12 col-md-6 col-lg-6">

<h4>Showcase open from 2 pm till 9 pm Mon-Sat</h4>
<br>
<div class="img-shop-div">
<img src="/storage/pages/shop.jpg" class="image-about testmm ml-auto img-shop">
  
</div>
</div>


<div class="map-contact col-12 col-md-6 col-lg-6">
  <h4>Find us:</h4>
  <br>

  <iframe class="google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.4232864782166!2d4.886338550753805!3d52.36274435552562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c609eb94432ad9%3A0x2cc3c47cd05ce7dd!2sPrinsengracht+813%2C+1017+Amsterdam%2C+Pays-Bas!5e0!3m2!1sfr!2sfr!4v1493797819242" width="400" height="300" frameborder="0" style="border:0" ></iframe>
</div>


<div class="col-12 col-md-6 col-lg-6"> 

  {!! Form::open(array('route' => 'contact', 'class' => 'form container')) !!}

  {{csrf_field()}}

  <h4>Contact us:</h4>
  <br>
  <div class="form-group col-8 col-md-8 col-lg-8">

      {!! Form::label('Your Name') !!}
      {!! Form::text('name', (Auth::check() && Auth::user()->name ) ? Auth::user()->name : '', 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Your name')) !!}


  </div>

  <div class="form-group col-8 col-md-8 col-lg-8">
      {!! Form::label('Your E-mail Address') !!}
      {!! Form::text('email', (Auth::check() && Auth::user()->email ) ? Auth::user()->email : '', 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Your e-mail address')) !!}
  </div>


  <div class="form-group col-12 col-md-12 col-lg-12">
      {!! Form::label('Your Message') !!}
      {!! Form::textarea('message', null, 
          array('required', 
                'class'=>'form-control', 
                'placeholder'=>'Your message')) !!}
  </div>

  <div class="form-group col-6 col-md-6 col-lg-6">

    <button type="submit" id="completed-task" class="btn-primary btn">
        <i class="voyager-paper-plane"></i> Contact Us!
    </button>

  </div>
  {!! Form::close() !!}

</div>


</div>


@endsection
