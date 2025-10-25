@extends('layouts.app')

@section('content')
<div class="containers" >
    <div class="row justify-content-center" style="margin-left:0px;margin-right:0px;">
        
        
<div class="container-xxl flex-grow-1 container-p-y">
              
    <div class="content">  
    <!-- Form Section -->
        @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Bulk Uoloaf</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                      <form method="post" action="/customer-upload" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Group Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="group_name" id="basic-default-name" placeholder="John Doe">
                          </div>
                        </div>
                         <div class="row mb-3">
                       <label class="col-sm-2 col-form-label" for="basic-default-name">Upload CSV file</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="file" id="inputGroupFile02" enctype="multipart/form-data" accept=".csv">
                          </div>
                       
                        
                      </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Upload</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
       
    </div>
  </div>
 </div>
  </div>
   
@endsection
