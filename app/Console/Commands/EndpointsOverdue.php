<?php namespace App\Console\Commands;
 
use Mail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use App\Http\Models\Endpoint;
 
class EndpointsOverdue extends Command
{
     /**
     * The console command name.
     *
     * @var string
     */
     protected $name = 'endpoints:overdue {--due=1}';
 
     /**
     * The console command description.
     *
     * @var string
     */
     protected $description = "Send email to endpoint owner if review date is overdue";
 
     /**
     * Execute the console command.
     *
     * @return void
     */
     public function Handle()
     {

        foreach (Endpoint::ForReview($this->option('due')) as $endpoint) {

            $mailer->send('emails.endpoints.overdue', ['endpoint' => $endpoint], function ($message) use ($endpoint) {
                $message->from('noreply@kingston.ac.uk', $name = null);
                $message->sender('noreply@kingston.ac.uk', $name = null);
                $message->to($endpoint->primary_email, $name = $endpoint->primary_contact);
                $message->cc('stuart@hunniedesign.com', $name = 'Stuart Hallewell');
                $message->subject('KU Navigator Endpoint overdue review reminder');
            });
        
        }  
    }
}