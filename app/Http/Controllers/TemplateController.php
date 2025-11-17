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
       //dd($request->all());
        $Template = Template::create([
            'template_name'=>$request->input('template_name'),
            'header_type'=> $request->input('header_type'),
            'header_text'=> $request->input('header_text'),
            'header_image_url'=>$request->input('header_image_url'),
            'body'=>$request->input('body'),
            'footer'=>$request->input('footer')
        ]);

        if($request->input('header_type')=='text' && ($request->input('header_text')!=null))
        {
             $body_data[]=[
                "type"=> "HEADER",
                "format"=>"TEXT",
                "text"=> $request->input('header_text')
            ];
        }
       /* elseif(($request->input('header_type')=='text')
        {
            $body_data[]=[
                "type"=> "HEADER",
                "format"=>"IMAGE",
                "text"=> $request->input('header_text'),
                "example": {
                "header_handle": [
                    "4::aW..."
                ]
            }
            ];
        }*/

        $body_data[]=["type"=> "BODY",
            "text"=> $request->input('body')];

        if($request->input('footer')!='')
        {
        $body_data[]=["type"=> "FOOTER",
            "text"=> $request->input('footer')];
        }

        /*
        $body_data[]=[
             "type"=>"BUTTONS",
             "buttons"=> [[ 
                    "type"=> "URL",
                    "text"=> "Shop Now",
                    "url"=> "https://kirtilals.com",
            ]],
        
        ];
*/
$data=[
    "name"=>$request->input('template_name'),
    "category"=>$request->input('category'),
    "language"=> "en_US",
    "components"=>$body_data,
];
// dd($data['components']['2']['buttons']['0']);
$post_data = http_build_query($data);

// dd($data);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://graph.facebook.com/v22.0/1193491932645452/message_templates',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer EAALUtTr0boABP5AZBhtmPUqfZBZB3NZCGgIECq1ywfDdnmj9GL1VhJrGU3ZAxmLWpqweXimSEbTrUIGvdVcuV2hL4EO169e9UB2zajU55ZA67S1ajelL4vwFVjWhHYcDEZBILkxLuUyl6AkAZAOsx06GmufWkKZAsGENVSdLh6LDZB2h9FXB1hGzyTVOvEQXwEPgZDZD'
  ),
  CURLOPT_POSTFIELDS => $post_data,
));

$response = curl_exec($curl);
$response_data = json_decode($response, true);  
if(array_key_exists('error',$response_data))
{
    dd($response_data);
}
else
{
    if($response_data['status'] =='PENDING')
    {
        //$this->show();
        //ECHO 'Success';
    }
    else
    {
        dd($response_data);
    }
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
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v22.0/1193491932645452/message_templates?access_token=EAALUtTr0boABP8zN15eLB9pZCDOxcfhKcjyKqbfuzj52Aa69BSy17ZCVDary5ZABYqw7ylnnrWZCFtk6OpNtAgPQ8997WyT3vrRbqNlD1OeJmtUL9hQd5q2PIly7vXPXfaNKqI4l9IDX8EKZCaPkYdcsxBB8VEqinqXkhuZATtEDZCGeL0BdKukkJR9dSeyWwZDZD',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

$response = curl_exec($curl);
  // dd($response);
$template_data = json_decode($response, true);  
     //dd($template_data);
    if(array_key_exists('error',$template_data))
{
    $template_lists=[];
}
else
{
$template_lists=$template_data['data'];
}


curl_close($curl);
//echo $response;
return view('template-list', compact('template_lists'));
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

    public function getTemplate($template_id)
    {
        $template=Template::find($template_id);
        return  response()->json($template);
    }
}
