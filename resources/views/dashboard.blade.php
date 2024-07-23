@extends('auth.layouts')

@section('styles')
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh; 
            display: flex;
            flex-direction: column;
            background-color: #f0f0f0; 
        }

        .top-half {
            background-image: url('{{ asset('images/download.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 50vh; 
            width: 100%; 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff; 
            text-align: center; 
        }

        .bottom-half {
            flex: 1; 
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px; 
        }
    </style>
@endsection

@section('content')
    <div class="top-half">
        <div class="container">
            <h1>Welcome to Dashboard</h1>
            <p>Your one-stop hub for managing all your work-related tasks and information.</p>
        </div>
    </div>

    <div class="bottom-half">
        <div class="container">
            <div class="row justify-content-center text-center mt-3">
                <div class="container">
                    <h1>Welcome to Employee Login</h1>
                    <p>This application provides employees with an efficient and secure way to manage their work-related tasks and information. Whether you're registering for the first time or logging in to access your dashboard, we're here to help you every step of the way.</p>
                
                    <h2>Features</h2>
                    <ul>
                        <li>Secure login and registration</li>
                        <li>Easy access to personal information and work schedules</li>
                        <li>Real-time notifications and updates</li>
                        <li>Comprehensive reporting and analytics</li>
                        <li>Divide login access between User, Admin and SuperAdmin</li>
                    </ul>
                
                    <h2>How to Get Started</h2>
                    <p>Follow these simple steps to get started:</p>
                    <ol>
                        <li>Click on the "Register" button to create a new account.</li>
                        <li>Fill in the required information, including your name, email, and password.</li>
                        <li>Verify your email address through the confirmation link sent to your inbox.</li>
                        <li>Log in using your email and password to access your personalized dashboard.</li>
                    </ol>
                
                </div>
                
            </div>
        </div>
    </div>
@endsection
