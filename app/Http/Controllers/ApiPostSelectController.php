<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Post\post;


class ApiPostSelectController extends Controller
{
    public function index()
    {
        return Post::all();
    }
    public function store(StorePost $request)
    // public function store(Request $request)
    {

    }
    public function show($id)
    {
        $post = Post::find($id);
        return $post;
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
