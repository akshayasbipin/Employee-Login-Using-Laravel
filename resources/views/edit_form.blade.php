
@extends('layouts.nav_f')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit data</title>
</head>
<body>

    <centre><h1>Fill the form</h1></centre>
    <form action="{{url('update_data',$data->id)}}" method='POST' style="margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 4px; background-color: #f9f9f9;">
        @csrf
        Username: <input type="text" value="{{$data->uname}}" name="uname"><br><br>
        Email: <input type="text" value="{{$data->email}}" name="email"><br><br>
        Password: <input type="text" value="{{$data->password}}" name="pass"><br><br>
        Type: <input type="text" value="{{$data->type}}" name="type"><br><br>
        Salary: <input type="number" value="{{$data->sal}}" name="sal"><br><br>
        <button type="submit" name = "submit">Submit</button>
    </form>
    <br><br>
    
</body>
</html>