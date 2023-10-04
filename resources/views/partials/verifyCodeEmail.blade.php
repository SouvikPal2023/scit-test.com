<!DOCTYPE html>
<html>
<head>
    <title>Verification Code</title>
</head>
<body>
   <h1>Verification Code for SCIT Registration</h1>

Your code is:
@php echo  $body['code'] @endphp
<br>
Thanks,
<br>
{{ $general->sitename ?? env('APP_NAME') }} Team

</body>
</html>