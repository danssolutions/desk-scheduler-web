<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Post;
use App\Notifications\NotificationDesk;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class SendNotifications extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notifications';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send desk notifications to users automatically';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currentDay = Carbon::now()->format('l');
        $currentTime = Carbon::now()->addMinutes(3)->format('H:i');

        $posts = Post::where('time_from', '<=', $currentTime)
                     ->where('days', 'LIKE', "%$currentDay%")
                     ->get();

        if ($posts->isEmpty()) {
            $this->info('No notifications to send at this time.');
            return;
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

        $this->info('Notifications sent successfully!');
    }
}
