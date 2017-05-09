@component('mail::message')
# Introduction

Thanks so much for registering {{ $user->name }} !

@component('mail::button', ['url' => 'https://www.marcelandmarcel.com'])
start to browse
@endcomponent

@component('mail::panel', ['url' => 'https://www.marcelandmarcel.com/winebook'])
See the selection
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
