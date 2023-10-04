<!DOCTYPE html>
<html>
<head>
    <title>Contact Email</title>
</head>
<body>
   <h1>New Contact Email</h1>

Contact Email Detail:<br>
Name: @php echo $body['name'] @endphp<br>
Email:@php echo $body['email'] @endphp<br>
Subject: @php echo $body['subject'] @endphp<br>
Message:@php echo $body['message'] @endphp<br>
<br>
Thanks,
<br>
{{ $general->sitename ?? env('APP_NAME') }} Team

</body>
</html>