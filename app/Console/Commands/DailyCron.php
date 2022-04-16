<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;


class DailyCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $new_insert_array=array();
        $event = Event::orWhere('end_date','<',date('Y-m-d'))->orWhere('end_date', '=', null)->get();
        foreach($event as $result)
        {
															if($result->recurrence_type=='daily')
																	{
																		$d = ' + 1 days';
																	}
																	
                                                                    $start_date = date('Y-m-d', strtotime($d, strtotime($result->start_date)));
                                                           
        $new_insert_array[]=array('name'=>$result->name,'start_date'=>$start_date,'description'=>$result->description,'end_date'=>$result->end_date,'recurrence_type'=>$result->recurrence_type,'user_id'=>$result->user_id);

															
        }
        Event::insert($new_insert_array);
        \Log::info("Daily Cron is working fine!");

    }
}
