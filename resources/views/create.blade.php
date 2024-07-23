@extends('layouts.nav_f')
{{-- @extends('auth.layouts') --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>
    <link rel="stylesheet" href="{{ asset('css/sam2.css') }}">
</head>
<body>
    <div class="container2">
    <h1>Fill the form</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form action='/create' method='POST'>
        @csrf
        <b>Username:</b> <input type="text" name="uname"><br><br>
        <b>Email:</b><input type="email" name="email"><br><br>
        <b>Password:</b><input type="password" name="password"><br><br>
        <b>Type(0=uesr, 1=admin, 2=superadmin):</b> <input type="number" name="type"><br><br>
        <b>Salary:</b> <input type="number" name="sal"><br><br>
        <button type="submit" name = "submit">Submit</button>
        {{-- <button><a href="{{ route('show_it') }}" style="text-decoration: none; color:black">Previews</a></button> --}}
    </form>
    <br><br>
    </div>
</body>
</html>