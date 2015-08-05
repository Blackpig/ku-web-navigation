<?php namespace App\Console\Commands;
 
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
     protected $name = 'endpoints:verify';
 
     /**
     * The console command description.
     *
     * @var string
     */
     protected $description = "Tests Endpoint URLs are not broken";
 
     /**
     * Execute the console command.
     *
     * @return void
     */
     public function handle()
     {
          
          foreach (Endpoint::AllEndpoints() as $ep) {
               
               $client = new \GuzzleHttp\Client();
               $res = $client->get($ep->url);
               
               if ($res->getStatusCode() == 404) {

                    $this->dispatch(new SendIsBrokenEmail($ep));
                    Endpoint::SetIsBtoken($ep->guid);

               }
          }  
     }

}