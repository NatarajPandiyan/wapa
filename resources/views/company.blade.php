@extends('layouts.app')

@section('content')
<div class="containers" >
    <div class="row justify-content-center" style="margin-left:0px;margin-right:0px;">
        
        
<div class="container-xxl flex-grow-1 container-p-y">
              
    <div class="content">  
    <!-- Form Section -->
     
        <div class="row">
                <!-- Basic Layout -->
                <div class="col-lg-12">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Company Details</h5>
                      <small class="text-muted float-end"></small>
                    </div>
                    <div class="card-body">
                      <form method="post" action="/store-company" enctype="multipart/form-data">
                         @csrf
                        <div class="row mb-3">

                          <label class="col-sm-3 col-form-label" for="basic-default-name">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="company_name" id="basic-default-name" placeholder="John Doe">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-3 col-form-label" for="basic-default-company">Company</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="brand_name" id="basic-default-company" placeholder="ACME Inc.">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-3 col-form-label" name="phone_number_id" for="basic-default-email">Phone Number Id</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone_number_id" id="basic-default-company" placeholder="ACME Inc.">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-3 col-form-label" for="basic-default-phone">WABA ID</label>
                          <div class="col-sm-9">
                            <input type="text" id="basic-default-phone" name="wapa_id" class="form-control phone-mask" placeholder="" aria-label="" aria-describedby="basic-default-phone">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-message">Logo</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" name="file" id="inputGroupFile02" enctype="multipart/form-data" accept=".jpg">
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Basic with Icons -->
                
              </div>
       
    </div>
  </div>
 </div>
  </div>
   
@endsection
