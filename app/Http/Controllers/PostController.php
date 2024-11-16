<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
   
    public function index()
{
    
    $posts = Post::paginate(3);
    return view('index')->with('posts', $posts);
}

    
    public function create()
    {
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'tables' => 'required|string',
            'height' => 'required|integer',
            'time_from' => 'required|string',
            'time_to' => 'required|string',
            'week_start' => 'required|string',
            'week_end' => 'required|string',
            'alarm_sound' => 'required|string',
        ]);

        $post = new Post([
            "name" => $request->name,
            "tables" => $request->input('tables'),
            'height' => $request->height,
            "time_from" => $request->time_from,
            "time_to" => $request->time_to,
            "week_start" => $request->week_start,
            "week_end" => $request->week_end,
            "alarm_sound" => $request->alarm_sound,
        ]);
        $post->save();

        return redirect("/");
    }

    
    public function show(Post $post)
    {
    }

    
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('edit')->with('posts', $posts);
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'tables' => 'required|string',
            'height'=>'required|integer',
            'time_from' => 'required|string',
            'time_to' => 'required|string',
            'week_start' => 'required|string',
            'week_end' => 'required|string',
            'alarm_sound' => 'required|string',
        ]);

        $post = Post::findOrFail($id);

        $post->update($request->only([
            'name', 
            'tables', 
            'height',
            'time_from', 
            'time_to', 
            'week_start', 
            'week_end', 
            'alarm_sound'
        ]));

        return redirect("/");
    }

    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back();
    }
}