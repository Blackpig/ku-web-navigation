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

               if (filter_var($endpoint->url, FILTER_VALIDATE_URL)){
               
                    try{
                         $res = $client->get($endpoint->url, ['http_errors' => false, 'allow_redirects' => false]);
                    
                         if ($res->getStatusCode() == 404) {
                              $this->notifyAndUpdate($mailer, $endpoint);
                         }
                    }
                    catch( \GuzzleHttp\Exception\ConnectException $e) {
                          $this->notifyAndUpdate($mailer, $endpoint);
                    }
               } else {
                    $this->notifyAndUpdate($mailer, $endpoint);
               }
          } 
     }

     private function notifyAndUpdate(Mailer $mailer, $endpoint) 
     {

          $mailer->send('emails.endpoints.broken-link', ['endpoint' => $endpoint], function ($message) use ($endpoint) {
                    $message->from('noreply@kingston.ac.uk', $name = null);
                    $message->sender('noreply@kingston.ac.uk', $name = null);
                    $message->to($endpoint->primary_email, $name = $endpoint->primary_contact);
                    //$message->cc('stuart@hunniedesign.com', $name = 'Stuart Hallewell');
                    $message->subject('KU Navigator Endpoint broken link');
               });
                              
                              
          Endpoint::SetIsBroken($endpoint->guid);

     }
      
}