<?php namespace App\Console\Commands;
 
use Mail;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use App\Http\Models\Endpoint;
 
class EndpointsReview extends Command
{


     /**
     * The console command name.
     *
     * @var string
     */
     protected $signature = 'endpoints:review {--due=-14}';
 
     /**
     * The console command description.
     *
     * @var string
     */
     protected $description = "Send email to endpoint owner if review date is due";
 
     /**
     * Execute the console command.
     *
     * @return void
     */
     public function Handle(Mailer $mailer)
     {

        foreach (Endpoint::ForReview($this->option('due')) as $endpoint) {
             
            $mailer->send('emails.endpoints.review', ['endpoint' => $this->$endpoint], function ($m) {
                $message->from('noreply@kingston.ac.uk', $name = null);
                $message->sender('noreply@kingston.ac.uk', $name = null);
                $message->to($this->$endpoint->primary_email, $name = $this->$endpoint->primary_contact);
                $message->subject('KU Navigator Endpoint overdue review reminder');
            });
        
        }  
     

     }
 
      
}