@component('mail::message')
# Introduction

Hello {{ $user->name }} !<br>
Remember You can always review a wine you liked, Your taste not only will be available on screen, it will also influence the next genration of "Marcels" :<br>

@component('mail::button', ['url' => 'https://www.marcelandmarcel.com/reviews'])
Review a wine
@endcomponent

@component('mail::panel', ['url' => 'https://www.marcelandmarcel.com/winebook/votes'])
Vote for a wine
@endcomponent

@component('mail::panel', ['url' => 'https://www.marcelandmarcel.com/winebook/votes'])
See the selection
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
