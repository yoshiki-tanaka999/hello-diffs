<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\post;


class ApiPostSelectController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }
    public function store(StorePost $request)
    // public function store(Request $request)
    {

    }
    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
