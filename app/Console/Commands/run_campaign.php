<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Campaign;
use App\Models\Customer;

use DB;
class run_campaign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:camapign {--id=}';

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
     
      $campaign_id=$this->option('id');

      if (!$campaign_id) {
        $this->error('Please provide an ID using --id=VALUE');
        return Command::FAILURE;
        }
        $campaign_det=Campaign::find($campaign_id);
        $customers= DB::table('campaigns_det')
        ->join('customers','customers.id','=','campaigns_det.customer_id')
        ->join('templates','templates.id','=','campaigns_det.template_id')
        ->where('campaign_id',$campaign_det->id)->get();

        // $data="{"messaging_product":"whatsapp","contacts":[{"input":"919790066948","wa_id":"919790066948"}],"messages":[{"id":"wamid.HBgMOTE5NzkwMDY2OTQ4FQIAERgSOEQ4MkFEM0M3MzkyNEFCNUQ4AA","message_status":"accepted"}]}";
      


        foreach($customers as $customer)
        {
     // dd($customer);

    $payload = [
    "messaging_product" => "whatsapp",
    "to" => "91" . $customer->mobile_no, 
    "type" => "template",
    "template" => [
        "name" => $customer->template_name, 
        "language" => [
            "code" => "en_US"
        ]
    ]
];
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v22.0/800327143173618/messages',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode($payload),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer EAALUtTr0boABP8zN15eLB9pZCDOxcfhKcjyKqbfuzj52Aa69BSy17ZCVDary5ZABYqw7ylnnrWZCFtk6OpNtAgPQ8997WyT3vrRbqNlD1OeJmtUL9hQd5q2PIly7vXPXfaNKqI4l9IDX8EKZCaPkYdcsxBB8VEqinqXkhuZATtEDZCGeL0BdKukkJR9dSeyWwZDZD'
        ),
        ));


        $response = curl_exec($curl);
        curl_close($curl);
        
         $template_data = json_decode($response, true);  
        if(isset($template_data['messages']['0']['id']))
        {
            DB::table('campaigns_det')->where('id',$customer->campaign_id)->update(['wamid'=>$template_data['messages']['0']['id'],'updated_at'=>now()]);
        }
     //   dd($response);
// echo $template_data['messages']['0']['id'].'---------'.$customer->id;
        }
        



    }
}
