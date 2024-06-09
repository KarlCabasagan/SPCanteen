<x-mail::message>
Hello, {{ $emailData['name'] }}!

<p style="padding-bottom: 30px;">Welcome to {{config('app.name')}} Please click the link below to verify your email address and activate your account.</p>

<center>
    <a href="{{ $emailData['verificationLink'] }}" style="color: white; background-color: maroon; border: none; padding: 10px 20px 10px 20px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; text-decoration: none;">
        Verify
    </a>
</center>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>