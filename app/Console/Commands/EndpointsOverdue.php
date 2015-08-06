<?php namespace App\Console\Commands;
 
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
 
class EndpointsOverdue extends Command
{
     /**
     * The console command name.
     *
     * @var string
     */
     protected $name = 'endpoints:Overdue {due=1}';
 
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

        foreach (Endpoint::ForReview($this->argument('due')) as $ep) {
            
            $this->dispatch(new SendOverdueEmail($ep));
        
        }  
     }
 
      
}