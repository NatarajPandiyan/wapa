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

        $body_data[]=["type"=> "BODY",
            "text"=> $request->input('body')];
        if($request->input('footer')!='')
        {
        $body_data[]=["type"=> "FOOTER",
            "text"=> $request->input('footer')];
        }

        $body_data[]=[
             "type"=>"BUTTONS",
             "buttons"=> [[ 
                    "type"=> "URL",
                    "text"=> "Shop Now",
                    "url"=> "https://kirtilals.com",
            ]],
        
        ];

$data=[
    "name"=>$request->input('template_name').'5',
    "category"=>$request->input('category'),
    "language"=> "en_US",
    "components"=>$body_data,
];
// dd($data['components']['2']['buttons']['0']);
$post_data = http_build_query($data);

// dd($data);
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
    'Authorization: Bearer EAARUezjzsD0BP4CZCub28RkU19OhFGTrOPpPnCVUhdiKGYSZCQOrpeJ74oIuTNSk1WXSRVXBVy87FsZCr00nps7lsQCVpr0m9VnzZC7AZAtaevQCd938GGhf7zE7v6GKz2D7hCNGZAywb4iR6OFQRyGLBb60vuiFrSrGZBYMWJTxAlTRz1WaFuBTHUPC8jW7q64fstlDS5JZARjq1zZBzMFoWY4DiBj9I9mb7G1pReRZBl141rOgZDZD'
  ),
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($curl);
$response_data = json_decode($response, true);  
curl_close($curl);
    if($response_data['status'] !='PENDING')
    {
        ECHO '1';
    }

        
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
