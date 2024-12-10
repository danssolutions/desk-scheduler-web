<?php

namespace App\Http\Controllers;

use notify;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Notification;

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
            'desk_id' => 'required|string', 
            'height' => 'required|integer',
            'time_from' => 'required|string',
            'days' => 'required|string', 
            'alarm_sound' => 'required|string',
        ]);
    
        $days = is_array($request->days) ? implode(',', $request->days) : $request->days;
    
        $post = new Post([
            'name' => $request->name,
            "desk_id" => $request->desk_id,
            'height' => $request->height,
            'time_from' => $request->time_from,
            'days' => $days, 
            'alarm_sound' => $request->alarm_sound,
        ]);
    
        $post->save();    
return redirect('/');
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
        'desk_id' => 'required|string',
        'height' => 'required|integer',
        'time_from' => 'required|string',
        'days' => 'required|string',    
        'alarm_sound' => 'required|string',
    ]);

    $post = Post::findOrFail($id);
    $post->update([
        'name' => $request->name,
        'desk_id' => $request->desk_id,
        'height' => $request->height,
        'time_from' => $request->time_from,
        'days' => $request->days,       
        'alarm_sound' => $request->alarm_sound,
    ]);
    notify()->success('Alarm updated successfully!');
    return redirect('/');
}

    
    
    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return back();
    }
  

    /*public function notificationdesk()
{
    $currentDay = Carbon::now()->format('l');
    $currentTime = Carbon::now()->format('H:i'); // current time without seconds

    // Calculate the time window in HH:MM format
    $timeWindowStart = Carbon::now()->subMinutes(2)->format('H:i'); // 2 minutes before current time
    $timeWindowEnd = Carbon::now()->addMinutes(2)->format('H:i');   // 2 minutes after current time
    
    // Fetch the posts within the time window and current day
    $posts = Post::where('days', 'like', '%' . $currentDay . '%')
                 ->whereRaw('time_from::time BETWEEN ? AND ?', [$timeWindowStart, $timeWindowEnd])
                 ->get();
    
    // Debugging: Check the fetched posts
    dd($posts);

    // Loop through the posts and send notification for each one
    foreach ($posts as $post) {
        // Send a notification for each post
        notify()->success('fire ⚡️ for ' . $post->name);
    }
}

    */
     
    

    
    }