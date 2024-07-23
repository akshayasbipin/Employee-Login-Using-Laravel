<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    //
    function delete_record($id)
    {

        Article::destroy($id);
        return redirect()->route('superadmin.dashboard');
    }

    function edit_record($id)
    {
        $data = Article::find($id);
        if (!$data) {
            abort(404); // Handle case where article with given ID is not found
        }
        return view('edit_form', compact('data'));
    }

    function update_data($id, Request $request)
    {
        $data = Article::find($id);
        if (!$data) {
            abort(404); // Handle case where article with given ID is not found
        }
        // Update article data
        $data->uname = $request->input('uname');
        $data->email = $request->input('email');
        $data->type = $request->input('type');
        $data->sal =  $request->input('sal');
        $data->save();
        return redirect()->route('superadmin.dashboard');
    }
}
