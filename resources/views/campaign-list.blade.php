@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
                <div class="container-xxl flex-grow-1 container-p-y">
              <div class="card">
                <h5 class="card-header">Customer Group</h5>
                <div class="card-body">
              <div class="col-xl-8">
                  
                  <a href="/new-campaign" class="btn btn-primary">ADD New</a>
                  <div class="nav-align-top mb-4 mt-4">
                 <div class="table-responsive text-nowrap"> 
                    <table class="table table-bordered">
                      <thead>
                        <th>Campaign Name</th>
                        <!-- <th>Customer Count</th> -->
                      </thead>
                      <tbody>
                        @foreach($camapings as $camaping)
                        <tr>
                            <td>{{$camaping->campaign_name}}</td>
                            
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
</div>
            <!-- Footer -->
           
           
    </div>

@endsection
