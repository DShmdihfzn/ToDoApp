<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;
use App\Models\Reminder;
use App\Mail\MyEmail;


class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'saya_mencuba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $current = now();
    
        $reminders = Reminder::where('remind_date', $current->format('Y-m-d'))
                            ->whereRaw("TIME_FORMAT(remind_time, '%H:%i') = ?", $current->format('H:i'))->get();
      

      if (isset($reminders)) {
        
        foreach ($reminders as $reminder) {
           $user_email = $reminder->list->user->email;
           
           Mail::to($user_email)->send(new MyEmail());
        }
      }
       
    }
}
