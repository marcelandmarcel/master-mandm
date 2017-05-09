@component('mail::message')

<p>
Hi {{ $event->creator->name }}! 
You just booked an event called: "{{ $event->name }}"
</p>
<p>
booked for {{ $event->nb_attendees }} persons.
</p>

<p>
on {{ $event->start_at }}.
</p>

<p>
Description:<br>
{{ $event->description }}
</p>

<p>
We will shortly get back to you using this email address: 
{{ $event->creator->email }}
to confirm the availability of our showcase for this period.
</p>

Best regards,
Thanks,<br>

{{ config('app.name') }}
@endcomponent