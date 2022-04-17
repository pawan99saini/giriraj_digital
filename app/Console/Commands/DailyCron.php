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
        //event managment
        $new_insert_array=array();
        $event = Event::where('parent_id','=',null)->where(function ($query) {
            $query->where('end_date', '>', date('Y-m-d'))
                  ->orWhere('end_date', '=', null);
        })
        ->get();
        //current date for compare
        $current_date =date("Y-m-d");
        foreach($event as $result)
        {

            $r= Event::where('parent_id','=',$result->id)->orderBy('id','desc')->first();
            $start_dt = isset($r->start_date) ? $r->start_date : $result->start_date;
            if($result->recurrence_type=='daily')
            {
                $d = ' + 1 days';
                $start_date = date('Y-m-d', strtotime($d, strtotime($start_dt)));   
            }
            else if($result->recurrence_type=='weekly')
            {

                $d = ' + 7 day';
                $start_date = date('Y-m-d', strtotime($d, strtotime($start_dt)));  
                if($start_date != $current_date) 
                {
                    continue;
                }
            }
            else if($result->recurrence_type=='monthly')
            {
                $d = ' + 1 month';
                $start_date = date('Y-m-d', strtotime($d, strtotime($start_dt)));   
                if($start_date != $current_date) 
                {
                    continue;
                }
            }
            else if($result->recurrence_type=='yearly')
            {
                $d = ' + 1 years';
                $start_date = date('Y-m-d', strtotime($d, strtotime($start_dt))); 
                if($start_date != $current_date) 
                {
                    continue;
                }  
            }	
                                                        
        
            $new_insert_array[]=array('name'=>$result->name,'start_date'=>$start_date,'description'=>$result->description,'end_date'=>$result->end_date,'recurrence_type'=>$result->recurrence_type,'user_id'=>$result->user_id,'parent_id'=>$result->id);													
        }
        Event::insert($new_insert_array);
        \Log::info("Daily Cron is working fine!");

    }
}
