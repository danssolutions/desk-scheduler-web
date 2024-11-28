<?php

namespace App\Http\Controllers;

use notify;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;

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
            'tables' => 'required|array',
            'height' => 'required|integer',
            'time_from' => 'required|string',
            'days' => 'required|array',
            'alarm_sound' => 'required|string',
        ]);

        $post = new Post([
            "name" => $request->name,
            "tables" => json_encode($request->input('tables')),
            "height" => $request->height,
            "time_from" => $request->time_from,
            "days" => json_encode($request->days),
            "alarm_sound" => $request->alarm_sound,
        ]);
        
        $post->save();
        notify()->success('Alarm created successfully!');

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
            'tables' => 'required|array',
            'height'=>'required|integer',
            'time_from' => 'required|string',
            'days' => 'required|array',
            'alarm_sound' => 'required|string',
        ]);
    
        $post = Post::findOrFail($id);
    
        $post->update([
            'name' => $request->name,
            'tables' => $request->tables,
            'height' => $request->height,
            'time_from' => $request->time_from,
            'days' => $request->days,  // Przekazywanie bezpośrednio tablicy
            'alarm_sound' => $request->alarm_sound,
        ]);
    
        notify()->success('Alarm updated successfully!');
    
        return redirect("/");
    }
    
    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back();
    }
  

    public function notificationdesk()
{
    $currentDay = Carbon::now()->format('l');
    $currentTime = Carbon::now()->format('H:i:s'); 

    $timeWindowStart = Carbon::now()->subMinutes(2)->format('H:i:s');
    $timeWindowEnd = Carbon::now()->addMinutes(2)->format('H:i:s');

    $posts = Post::whereJsonContains('days', $currentDay) 
        ->whereBetween('time_from', [$timeWindowStart, $timeWindowEnd]) 
        ->get();


        $post = Post::first(); // Replace 'first()' with a valid query if needed
        dd(Post::find(29)->days); // Replace 1 with a valid ID
        

    foreach ($posts as $post) {
        notify()->success('Twój stół wkrótce się podniesie. ⚡️'); 
    }

    return response()->json([
        'message' => 'Sprawdzono powiadomienia o biurkach.',
        'posts' => $posts
    ]);
}

    }