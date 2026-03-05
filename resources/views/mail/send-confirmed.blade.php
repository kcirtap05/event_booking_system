@component('mail::message')

# Hello!

{{ $title }} 
Your booking # $booking_id is confirmed 

@endcomponent

{{-- Thanks,<br>
{{ config('app.name') }} --}}
@endcomponent
