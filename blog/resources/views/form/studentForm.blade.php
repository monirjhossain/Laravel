<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/insert" method="POST">
    <h2>Student Form</h2>
    <input type="text" name="stname" placeholder="Enter Student name"><br>
    <input type="text" name="email" placeholder="Enter email name"><br>
    <input type="text" name="phone" placeholder="Enter Mobile Number"><br> 
    @php
        echo csrf_field();
    @endphp
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>