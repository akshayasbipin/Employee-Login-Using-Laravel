@extends('auth.layouts')

@section('content')

<style>
    .custom-margin-top {
        margin-top: 50px;
    }
</style>

<div class="row justify-content-center mt-5">
    <div class="col-md-8 custom-margin-top">

        <div class="card">
            <div class="card-header">Register</div>
            <div class="card-body">
                <form action="{{ route('store') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email Address</label>
                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-md-4 col-form-label text-md-end text-start">Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
                        <div class="col-md-6">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="salary" class="col-md-4 col-form-label text-md-end text-start">Salary</label>
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="salary" name="salary">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="type" class="col-md-4 col-form-label text-md-end text-start">Type</label>
                        <div class="col-md-6">
                            <select class="form-control" id="type" name="type">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                                <option value="2">Superadmin</option>
                            </select>
                        </div>
                    </div>                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Register">
                    </div>
                </form>
                
            </div>
        </div>
    </div>    
</div>
    
@endsection
