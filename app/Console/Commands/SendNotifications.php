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
    protected $signature = 'app:send-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send desk notifications to users during alarms';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the current day and time, with timezone adjustment for GMT+1
        $currentDay = Carbon::now()->format('l');
        $currentTime = Carbon::now()->addHours(1)->format('H:i');

        // Fetch alarms for the exact current time
        $alarms = Post::where('time_from', $currentTime)
            ->where('days', $currentDay)
            ->get();
        
        if ($alarms->isEmpty()) {
            $this->info('No notifications to send at this time.');
            return;
        }

        $users = User::all();
        foreach ($alarms as $alarm) {
            $details = [
                'greetings' => 'Desk alarm activated',
                'body' => "Your desk is now changing position.",
                'lastline' => 'Be ready!',
            ];

            Notification::send($users, new NotificationDesk($details));
        }

        $this->info('Notifications sent successfully!');
    }
}
