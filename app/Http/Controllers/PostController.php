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
        $user = auth()->user();
        if ($user->usertype === 'admin') {
            $posts = Post::paginate(5); // Admin sees all posts
        } else {
            $posts = Post::where('desk_id', $user->desk_id)->paginate(5); // Users see only their desk's posts
        }
        return view('scheduler', compact('posts'));
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
            'desk_id' => 'nullable|string', // Nullable because it might be auto-filled
            'height' => 'required|integer',
            'time_from' => 'required|string',
            'days' => 'required|string',
            'alarm_sound' => 'required|string',
        ]);

        $user = auth()->user();
        $deskId = $user->usertype === 'admin' ? $request->desk_id : $user->desk_id;

        $post = new Post([
            'name' => $request->name,
            'desk_id' => $deskId,
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
        $post = Post::findOrFail($id);
        $user = auth()->user();

        if ($user->usertype !== 'admin' && $post->desk_id !== $user->desk_id) {
            abort(403, 'Unauthorized access to this alarm.');
        }

        $wiFi2BLE = new WiFi2BLEAPI(env('WIFI2BLE_BASE_URL'), env('WIFI2BLE_API_KEY'));
        $desks = $wiFi2BLE->getAllDesks();

        return view('edit', compact('post', 'desks'));
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
        $user = auth()->user();

        if ($user->usertype !== 'admin' && $post->desk_id !== $user->desk_id) {
            abort(403, 'Unauthorized access to this alarm.');
        }

        $post->delete();
        return back();
    }

}