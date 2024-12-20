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
use App\Services\WiFi2BLEAPI;

class PostController extends Controller
{
    public function scheduler()
    {
        $posts = Post::paginate(5);
        return view('scheduler')->with('posts', $posts);
    }

    public function create()
    {
        $wiFi2BLE = new WiFi2BLEAPI(env('WIFI2BLE_BASE_URL'), env('WIFI2BLE_API_KEY'));

        $desks = $wiFi2BLE->getAllDesks();

        return view('create', compact('desks'));
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

        $post = new Post([
            'name' => $request->name,
            "desk_id" => $request->desk_id,
            'height' => $request->height,
            'time_from' => $request->time_from,
            'days' => $request->days,
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
        $wiFi2BLE = new WiFi2BLEAPI(env('WIFI2BLE_BASE_URL'), env('WIFI2BLE_API_KEY'));
        
        $posts = Post::findOrFail($id);
        $desks = $wiFi2BLE->getAllDesks();
        return view('edit', compact('posts', 'desks'));
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

}