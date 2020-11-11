<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <form action="/process" method="GET">
    Name: <input type="text" name="name"><br>
    @php
        echo csrf_field();
    @endphp
    Email: <input type="email" name="email"><br>
    @php
        echo csrf_field();
    @endphp
    Address: <textarea name="address" id="" cols="20" rows="5"></textarea><br>
    @php
        echo csrf_field(); 
    @endphp

    <input type="submit" value="submit" name="submit"><br>
    </form>
</head>
<body>
    
</body>
</html>