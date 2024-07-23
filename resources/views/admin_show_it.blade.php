@extends('auth.layouts')

@section('styles')
    <!-- Specific styles for show_it.blade.php -->
    <style>
        .container {
            padding-top: 20px; /* Adjust as needed */
        }
        .table {
            margin-top: 20px; /* Adjust as needed */
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center">The Data</h1>
        {{-- <button class="btn btn-dark mb-3"><a href="{{ route('create') }}" style="text-decoration: none; color: white;">Create</a></button> --}}
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Type</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $ar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ar['uname'] }}</td>
                    <td>{{ $ar['email'] }}</td>
                    <td>
                        @if($ar['type'] == 0)
                            User
                        @elseif($ar['type'] == 1)
                            Admin
                        @elseif($ar['type'] == 2)
                            Super Admin
                        @else
                            Unknown
                        @endif
                    </td>      
                    <td>{{ $ar['sal'] }}</td>              
                    <td><a href="edit_record/{{ $ar['id'] }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="delete_record/{{ $ar['id'] }}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button class="btn btn-dark"><a href="{{ route('create') }}" style="text-decoration: none; color: white;">Back</a></button>
    </div>
@endsection
