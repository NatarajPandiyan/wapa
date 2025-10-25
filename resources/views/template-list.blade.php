@extends('layouts.app')

@section('content')
<div class="containers" >
    <div class="row justify-content-center" style="margin-left:0px;margin-right:0px;">
        
        
<div class="container-xxl flex-grow-1 container-p-y">
              
    <div class="content">  
    <!-- Form Section -->
     
        <div class="row mb-5">
             @foreach($template_lists as $template)
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{ asset('/img/elements/2.jpg')}}" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">{{$template['name']}}</h5>
                      <p class="card-text">
                        {{$template['components']['0']['text']}}
                      </p>
                      @if(isset($template['components']['2']))
                      <a href="{{$template['components']['2']['buttons']['0']['url']}}" class="btn btn-outline-primary">{{$template['components']['2']['buttons']['0']['text']}}</a>
                      @endif
                    @if($template['status']=='APPROVED')
                    <a href="#" class="btn rounded-pill btn-outline-success" style="background-color:green">{{$template['status']}}</a>
                    @else
                    <a href="#" class="btn rounded-pill btn btn-outline-danger" style="background-color:red">{{$template['status']}}</a>
                    @endif
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
       
    </div>
  </div>
 </div>
  </div>
   
@endsection
