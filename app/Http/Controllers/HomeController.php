<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post; 
use App\Notifications\NotificationDesk;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;

class HomeController extends Controller
{
    public function sendnotification()
    {
        $currentDay = Carbon::now()->format('l');
        $currentTime = Carbon::now()->addMinutes(3)->format('H:i'); 

        $posts = Post::where('time_from', '<=', $currentTime)
                    ->where('days', 'LIKE', "%$currentDay%") 
            ->get();

        if ($posts->isEmpty()) {
            return response()->json(['message' => 'No notifications to send at this time.']);
        }

        $users = User::all();
        foreach ($posts as $post) {
            $details = [
                'greetings' => 'Reminder!',
                'body' => "Your desk is gonna move soon.",
                'lastline' => 'Be ready!',
            ];

            Notification::send($users, new NotificationDesk($details));
        }

        return response()->json(['message' => 'Notifications sent successfully!']);
    }
}
