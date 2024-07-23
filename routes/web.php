<?php

use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowItController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginRegisterController;

Route::get('/', function () {
    return view('dashboard');
});

// Group routes that should have the 'prevent-back-button' and 'auth' middleware applied
Route::middleware(['auth', 'prevent-back-button'])->group(function () {
    Route::get('/user/dashboard', [ShowItController::class, 'showUser'])->name('user.dashboard')->middleware('user');
    Route::get('/admin/dashboard', [ShowItController::class, 'showAdmin'])->name('admin.dashboard')->middleware('admin');
    Route::get('/superadmin/dashboard', [ShowItController::class, 'showSuperadmin'])->name('superadmin.dashboard')->middleware('superadmin');

    Route::get('/show_it', [ShowItController::class, 'show'])->name('show_it');

    Route::get('/create', function () {
        return view('create');
    });

    Route::post('/create', function () {
        request()->validate([
            'uname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'type' => 'required|in:0,1,2',
            'sal' => 'required|numeric',
        ]);

        // Create user in the database
        $user = Article::create([
            'uname' => request('uname'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'type' => request('type'),
            'sal' => request('sal')
        ]);

        // Determine redirect based on user type
        // switch ($user->type) {
        //     case 0:
        //         return redirect()->route('user.dashboard');
        //     case 1:
        //         return redirect()->route('admin.dashboard');
        //     case 2:
        //         return redirect()->route('superadmin.dashboard');
        //     default:
        return redirect()->route('superadmin.dashboard');
        // }
    });

    Route::view('/create', 'create')->name('create');

    Route::get('superadmin/delete_record/{id}', [ArticleController::class, 'delete_record']);
    Route::get('superadmin/edit_record/{id}', [ArticleController::class, 'edit_record']);
    Route::post('update_data/{id}', [ArticleController::class, 'update_data']);
});

// Routes for registration and login that do not require authentication
Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
