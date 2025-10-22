<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('new-template');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request->all());
        $Template = Template::create([
            'template_name'=>$request->input('template_name'),
            'header_type'=> $request->input('header_type'),
            'header_text'=> $request->input('header_text'),
            'header_image_url'=>$request->input('header_image_url'),
            'body'=>$request->input('body'),
            'footer'=>$request->input('footer')
        ]);



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://graph.facebook.com/v22.0/1344918480606360/message_templates',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer EAARUezjzsD0BP5T8bmNuCduN6lsyrfffpInZCS06AkSI09Mgh1B4ENu1ue7plBMwGf30uZBpvnzZAYMFkFiVZBUMYtkhZA4Erb2C0p6ZAZAhMAhhrQdj2gegdkJhx7HxIWvWpLPPzTi9mW6NnNoJ8HtlYIwZAqHUc2RVrKDPo6reduZC7XI5ecw7nUmKDb3PYPsyKb0XNPMg6ZBaaQYPJ28LIE5FYkbst09Kxz0qo11VIINyCs1gZDZD'
  ),
  CURLOPT_POSTFIELDS =>'{
    "name": "test_template_from_api",
    "category": "MARKETING",
    "language": "en_US",
    "components": [
        {
            "type": "BODY",
            "text": "Welcome to Kirtilals"
        },
        {
            "type": "FOOTER",
            "text": "Reply STOP to unsubscribe"
        },
        {
            "type": "BUTTONS",
            "buttons": [
                {
                    "type": "URL",
                    "text": "Shop Now",
                    "url": "https://kirtilals.com"
                }
            ]
        }
    ]
}'
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        //
    }
}
