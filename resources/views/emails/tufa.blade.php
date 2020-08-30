@component('mail::message')

# Account Verification

<p>Another level of security for your account <strong>{{ $user->name }}</strong>.</p>
<p>The verification code below will expire in 5 minutes. Resend the code to access the account cricitical sections.</p>

<p>Verification code: <strong>{{ $user->code }}</strong></p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
