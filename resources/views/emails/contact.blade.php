@component('mail::message')
You received a message from <address>Marcel&amp;marcel.com</address> :

<p>
M. or Mme: {{ $name }}
</p>

<p>
Email:<br>
{{ $email }}
</p>

Message:<br>
<p>
{{ $user_message }}
</p>

@component('mail::panel', ['url' => 'https://www.marcelandmarcel.com/winebook'])
See the selection
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent