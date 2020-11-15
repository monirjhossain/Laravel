<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/update" method="POST">
    <h2>Student Form</h2>
    <input type="text" name="stname" placeholder="Enter Student name" value="{{$data->name}}"><br>
    <input type="text" name="email" placeholder="Enter email name" value="{{$data->email}}"><br>
    <input type="text" name="phone" placeholder="Enter Mobile Number" value="{{$data->phone}}"><br> 
    @php
        echo csrf_field();
    @endphp
    <input type="submit" name="submit" value="Update">
</form>
</body>
</html>