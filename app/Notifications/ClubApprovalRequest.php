<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class ClubApprovalRequest extends Notification
{
    use Queueable;

    protected $type = 16;
    protected $club;
    protected $owner;



    public function __construct($club,$owner)
    {
        $this->club = $club;
        $this->owner = $owner;

    }

    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    

    public function toDatabase($notifiable){
        return [
            'type'=>$this->type,
            'club'=>$this->club,
            'owner'=> $this->owner,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'data'=>[
                'type'=>$this->type,
                'club'=>$this->club,
                'owner'=> $this->owner,
            ]
        ]);
    }

    
    public function toArray($notifiable)
    {
        return [
            
        ];
    }
}
