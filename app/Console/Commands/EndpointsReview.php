<?php namespace App\Console\Commands;
 
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
     public function Handle()
     {

        foreach (Endpoint::ForReview($this->option('due')) as $ep) {
             
            $this->dispatch(new SendReviewEmail($ep));
        
        }  
     

     }
 
      
}