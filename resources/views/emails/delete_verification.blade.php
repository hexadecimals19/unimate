<p>Dear {{ Auth::user()->name }},</p>

<p>We received a request to delete your account. Please use the following code to confirm your request:</p>

<h2>{{ $code }}</h2>

<p>If you did not request this, please ignore this email.</p>

<p>Thank you,<br>From Unimate Team</p>
