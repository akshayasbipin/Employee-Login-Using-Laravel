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
        <h1 class="text-center">Your Profile</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">UserName</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col">Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $ar)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ar->uname }}</td>
                    <td>{{ $ar->email }}</td>
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
                    <td>{{ $ar->sal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
