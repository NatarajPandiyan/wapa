<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Customer_Group;
use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\Template;
use Illuminate\Support\Facades\Artisan;
use DB;
class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $camapings= Campaign::all();
         return view('campaign-list',compact('camapings'));
        // dd($camapings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer_groups= Customer_Group::all();

        $templates= Template::where(['status'=>'Approved'])->get();

        
        return view('campaign',compact('customer_groups','templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campaign_id= DB::table('campaigns')->insertGetId(['template_id'=>$request->input('template_id'),'customer_group_id'=>$request->input('target_audience'),'campaign_name'=>$request->input('campaign_name'),'company_id'=>'1','created_at' => now()]);

        $customers=Customer::where('group_id',$request->input('target_audience'))->get();
        
        foreach( $customers as $customer)
        {
            DB::table('campaigns_det')->insertGetId(['campaign_id'=>$campaign_id,'customer_id'=>$customer->id,'mobile_no'=>$customer->mobile,'template_id'=>$request->input('template_id'),'created_at' => now()]);
        }

        Artisan::call('run:camapign', ['--id' => $campaign_id]);
        $output = Artisan::output();

         return response()->json(['Status'=>'Success','Data'=>$output]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
