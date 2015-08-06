<?php

namespace App\Jobs;

use Mail;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReviewEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue;

    protected $payload;

    /**
     * Create a new job instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $mailer->send('emails.endpoints.review', ['endpoint' => $this->$endpoint], function ($m) {
            $message->from('noreply@kingston.ac.uk', $name = null);
            $message->sender('noreply@kingston.ac.uk', $name = null);
            $message->to($this->$endpoint->primary_email, $name = $this->$endpoint->primary_contact);
            $message->subject('KU Navigator Endpoint overdue review reminder');
        });
    }
}