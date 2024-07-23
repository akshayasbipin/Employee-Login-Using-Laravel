<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowItController extends Controller
{
    //i dont think i need showUser
    public function showUser()
    {
        $user = Auth::user();
        $articles = Article::where('uname', $user->uname)->get(); // Adjust this line if you use user_id instead of uname
        return view('user_show_it', compact('articles'));
    }

    public function showAdmin()
    {
        $articles = Article::all();
        return view('admin_show_it', ['articles' => $articles]);
    }

    public function showSuperadmin()
    {
        $articles = Article::all();
        return view('superadmin_show_it', ['articles' => $articles]);
    }

    public function show()
    {
        $articles = Article::all();
        return view('show_it', ['articles' => $articles]);
    }
}
