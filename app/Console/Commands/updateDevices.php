<?php

namespace App\Console\Commands;

use App\Device;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class updateDevices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatedevices';

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
     * @return mixed
     */
    public function handle()
    {


        $devices = Device::all();
        foreach ($devices as $device){

            $current_lecture = $device->getCurrentLecture();

            //Request Client
            $client = new Client([

                'base_uri' => 'http://' . $device->getIp() . '/',

                'timeout'  => 2.0,
            ]);




            //If there is active lecture ....
            if($current_lecture != null){

                //TODO Check if it has announcement..
                if($current_lecture->hasAnnouncement()) {
                    //Show the announcement .....
                    $client->request('GET', 'display?l=0&m=' . $device->getLocation());
                    $client->request('GET', 'displaysmall?l=2&m=' . $current_lecture->getCourseName() . ' - ' . $current_lecture->getInstructor());
                    $client->request('GET', 'displaysmall?l=3&m=' . $current_lecture->getStatusType() . '-' . $current_lecture->getAnnouncement());
                }else{
                    //Normal
                    $client->request('GET', 'display?l=0&m=' . $device->getLocation());
                    $client->request('GET', 'displaysmall?l=2&m=' . $current_lecture->getCourseName() . ' - ' . $current_lecture->getInstructor());
                    $client->request('GET', 'displaysmall?l=3&m=' . $current_lecture->getStartTime());


                }

            }
            // If there is no lecture
            //TODO showing next lecture
            else{
                $client->request('GET', 'display?l=0&m='. $device->getLocation());
                $client->request('GET', 'displaysmall?l=2&m=No lecture ..');
                $client->request('GET', 'displaysmall?l=3&m=');

            }









        }


        echo "Updated all devices ... ";
    }
}


//* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1