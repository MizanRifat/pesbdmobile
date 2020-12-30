<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClubApproved extends Notification
{
    use Queueable;

    protected $type = 17;
    protected $club_name;
    protected $club_slug;



    public function __construct($club_name,$club_slug)
    {
        $this->club_name = $club_name;
        $this->club_slug = $club_slug;

    }

    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    

    public function toDatabase($notifiable){
        return [
            'type'=>$this->type,
            'club_name'=>$this->club_name,
            'club_slug'=>$this->club_slug,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data'=>[
                'type'=>$this->type,
                'club_name'=>$this->club_name,
                'club_slug'=>$this->club_slug,
            ]
        ]);
    }

    
    public function toArray($notifiable)
    {
        return [
            
        ];
    }
}
