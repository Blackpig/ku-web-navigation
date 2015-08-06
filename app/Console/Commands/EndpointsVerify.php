<?php namespace App\Console\Commands;
 
use Mail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use App\Http\Models\Endpoint;
 
class EndpointsVerify extends Command
{


     /**
     * The console command name.
     *
     * @var string
     */
     protected $signature = 'endpoints:verify';
 
     /**
     * The console command description.
     *
     * @var string
     */
     protected $description = "Send email to endpoint owner if link is broken";
 
     /**
     * Execute the console command.
     *
     * @return void
     */
     public function Handle(Mailer $mailer)
     {

          $client = new \GuzzleHttp\Client();

          foreach (Endpoint::AllEndpoints() as $endpoint) {
               
               $res = $client->get($endpoint->url);

               $this->info( $endpoint->url . " ==> " . $res->getStatusCode());
               
               if ($res->getStatusCode() == 404) {

                    /*$mailer->send('emails.endpoints.broken_link', ['endpoint' => $endpoint], function ($message) use ($endpoint) {
                         $message->from('noreply@kingston.ac.uk', $name = null);
                         $message->sender('noreply@kingston.ac.uk', $name = null);
                         $message->to($endpoint->primary_email, $name = $endpoint->primary_contact);
                         $message->subject('KU Navigator Endpoint broken link');
                      });*/
                    
                    //Endpoint::SetIsBtoken($ep->guid);

               }
          }  
     }
      
}