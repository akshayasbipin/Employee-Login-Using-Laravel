<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\MyTestEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\WelcomeEmailNotification;

class LoginRegisterController extends Controller
{
    /**
     * Get the user type string based on the type value.
     *
     * @param int $type
     * @return string
     */
    protected function getUserType($type)
    {
        switch ($type) {
            case 0:
                return 'User';
            case 1:
                return 'Admin';
            case 2:
                return 'Super Admin';
            default:
                return 'Unknown';
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'salary' => 'required|numeric',
            'type' => 'required|in:0,1,2', // Ensure type is one of 0, 1, or 2
        ]);

        $user = User::create([
            'uname' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => $request->type,
            'sal' => $request->salary
        ]);

        // Determine the user type string
        $userType = $this->getUserType($user->type);

        // Send the email using the MyTestEmail mailable
        Mail::to($user->email)->send(new MyTestEmail($user->uname, $request->password, $userType));

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('user.dashboard')
            ->withSuccess('You have successfully registered & logged in!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            switch ($user->type) {
                case 0:
                    return redirect()->route('user.dashboard');
                case 1:
                    return redirect()->route('admin.dashboard');
                case 2:
                    return redirect()->route('superadmin.dashboard');
                default:
                    return redirect()->route('login')->withErrors(['email' => 'Invalid user type']);
            }
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
