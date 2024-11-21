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
            'tables' => json_encode($request->tables),  
            'height' => $request->height,
            'time_from' => $request->time_from,
            'days' => json_encode($request->days),  
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
   /* public function notificationdesk($id)
    {

        $currentDay = Carbon::now()->format('l');        
        $currentTime = Carbon::now();
        
        $timeWindowStart = $currentTime->copy()->subMinutes(1)->format('H:i');
        $timeWindowEnd = $currentTime->copy()->addMinutes(1)->format(format: 'H:i');
        
        // Fetch records where the day matches and the time_from is near the current time
        $posts = Post::table('posts')
            ->whereJsonContains('days', $currentDay)
            ->whereTime('time_from', '>=', $timeWindowStart)
            ->whereTime('time_from', '<=', $timeWindowEnd)
            ->get();



            foreach ($posts as $post) {
                notify()->success('Your desk will move soon. ⚡️');
            }
        
            return response()->json(['message' => 'Desk notifications checked.']);
        }
            */
    }