<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
   <h1>Forget Password Email</h1>

Your password reset code is:
@php echo  $body['code'] @endphp
<br>
Thanks,
<br>
{{ $general->sitename ?? env('APP_NAME') }} Team

</body>
</html>