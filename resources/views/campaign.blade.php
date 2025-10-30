@extends('layouts.app')
@push('css')
<style>
    .bs-stepper .line {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .bs-stepper .bs-stepper-circle {
      background-color: #696cff29;
      color: #696cff;
    }

    .bs-stepper .step.active .bs-stepper-circle {
      background-color: #696cff;
      color: #fff;
    }

    .content {
      padding: 1.5rem;
      background: #fff;
      border-radius: 0.5rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .content-header {
      border-bottom: 1px solid #dee2e6;
      padding-bottom: 0.5rem;
      margin-bottom: 1rem;
    }
    .select2-container{
      display: block;
      /*width: 100%;*/
      height: 38px;
    }
    .mobile_img_bg{
        background: url(https://gs-upload.gupshup.io/templates/images/template_preview_bg.png) 0 0 no-repeat;
         padding:15px;
         width: 100%;
         border-radius: 25px;
         margin-bottom: 15px;
         background-size: cover;
    }
    .cus_innr_bdy{
        overflow: auto;
        height: 350px;
        padding: 0;
    }
    .common_img_wrap{
        height: 155px;
        width: 100%;
      }
      .card_cus_bby {
        background-color: #fff;
        border-radius: 20px;
        padding: 15px;
    }
    .card-link.btns-coomon{
        border-top: 1px solid #ccc;
        width: 100%;
        text-align: center;
        display: inline-block;
        padding: 10px 10px 0px 10px;
      }
      .fs20{
        font-size: 18px;
      }
      .d_flex{
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
      }
      .form-label{
        display: block;
      }
      .select2_contain select{
        width: 100%;
      }
      .form-label-count{
        font-size: 14px;
        padding-left: 20px;
      }
      .mt20{
        margin-top: 20px;
      }
      label.form-label.fs20 {
          text-align: center;
          width: 100%;
      }
    .content-header  h6 {
    font-size: 0.9375rem;
    font-weight: 600;
    line-height: 1.1;
    color: #566a7f;
}
    </style>
@endpush
@section('content')
<div class="containers" >
    <div class="row justify-content-center" style="margin-left:0px;margin-right:0px;">
        
        
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Create Camapign</h4>

              <div class="row">
                <!-- Default Wizard -->
                 <div class="col-12 mb-6">
                  <div class="bs-stepper wizard-numbered mt-2">
                    <div class="bs-stepper-header">
                      <div class="step" data-target="#account-details">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">1</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title"> Setup </span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                      </div>
                      <div class="step" data-target="#personal-info">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">2</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title"> Content </span>
                          </span>
                        </button>
                      </div>
                      <div class="line">
                      </div>
                      <div class="step" data-target="#social-links">
                        <button type="button" class="step-trigger">
                          <span class="bs-stepper-circle">3</span>
                          <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Schedule </span>
                          </span>
                        </button>
                      </div>
                    </div>

                    <div class="bs-stepper-content mt-4">
                      <form onsubmit="return false">
                        <!-- Step 1: -->
                        <div id="account-details" class="content">
                          <div class="content-header mb-4">
                            <h6 class="mb-0">Campaign details</h6>
                          </div>
                          <div class="row g-3">
                            <div class="col-sm-4">
                              <label class="form-label" for="username">Campaign name</label>
                              <input
                                type="text"
                                id="username"
                                class="form-control"
                                placeholder=""
                              />
                            </div>
                            <div class="col-sm-4">
                              <label class="form-label" for="username">Target audience</label>
                              <div class="select2_contain">
                                <select class="form-select select2drop" multiple="multiple" id="">
                                  <option value=""></option>
                                  @foreach($customer_groups as $customer_group)
                                        <option value="{{$customer_group->id}}">{{$customer_group->group_name}}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-4">
                              <label class="form-label" for="username">&nbsp;</label>
                              <button type="button" class="btn btn-primary">Show Count</button>
                              <label class="form-label-count">123</label>
                            </div>
                            
                            
                            
                            <div class="col-12 d-flex justify-content-between mt-4">
                              <button class="btn btn-label-secondary btn-prev" disabled>
                                <i class="bx bx-chevron-left me-1"></i> Previous
                              </button>
                              <button class="btn btn-primary btn-next">
                                Next <i class="bx bx-chevron-right ms-1"></i>
                              </button>
                            </div>
                          </div>
                        </div>

                        <!-- Step 2 -->
                        <div id="personal-info" class="content">
                          <div class="content-header mb-4">
                            <h6 class="mb-0">Content</h6>
                          </div>
                          <div class="row g-3">
                            <div class="col-sm-8">
                              <label class="form-label" for="username">Select template</label>
                              <select class="form-select select2drop"  id="template_id" name="template_id">
                                <option label=""></option>
                               @foreach($templates as $template)
                                        <option value="{{$template->id}}">{{$template->template_name}}</option>
                                  @endforeach
                              </select>

                              <!-- <div class="text-start mt20">
                                  <button type="button" class="btn btn-primary">Send Test Message</button>
                              </div> -->
                            </div>
                            <div class="col-sm-4">
                              <div class="d_flex">
                                <label class="form-label fs20" for="username">Preview</label>
                                
                              </div>
                              <div class="card_imgbox_wrap">
                                <div class="card mobile_img_bg h-100">
                                  <div class="card-body card_cus_bby">
                                    <h5 class="card-title mb5">loyalty_bonus_festive_v2</h5>
                                    <div class="cus_innr_bdy">
                                      <img class="common_img_wrap img-fluid d-flex mx-auto my-2" src="https://fss.gupshup.io/0/public/0/0/gupshup/917871200411/01841d74-fa3b-4878-a067-48b31b76858c/1757308913255_Bonus%20points.png" alt="Card image cap" />
                                      <p class="card-text">Hi Full Name, 
                                      ✨ Celebrate this festive season with Kirtilals! ✨
                                      We’ve added 2000 points to your account.
                                      Redeem till 31st October on purchases of ₹50,000 & above.
                                      Shop in-store or online 👉 link
                                      T&C Apply*</p>
                                      <a href="javascript:void(0);" class="card-link btns-coomon">Visit Store</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-between mt-4">
                              <button class="btn btn-primary btn-prev">
                                <i class="bx bx-chevron-left me-1"></i> Previous
                              </button>
                              <button class="btn btn-primary btn-next">
                                Next <i class="bx bx-chevron-right ms-1"></i>
                              </button>
                            </div>
                          </div>
                        </div>

                        <!-- Step 3: Social Links -->
                        <div id="social-links" class="content">
                          <div class="content-header mb-4">
                            <h6 class="mb-0">Schedule campaign</h6>
                          </div>
                          <div class="row g-3">
                            <div class="col-sm-7 offset-5">
                              <button class="btn btn-success btn-submit">Save and Send Now</button>
                            </div>
                            
                            <div class="col-12 d-flex justify-content-between mt-4">
                              <button class="btn btn-primary btn-prev">
                                <i class="bx bx-chevron-left me-1"></i> Previous
                              </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                 </div>
                <!-- /Default Wizard -->
              </div>
            </div>
 </div>
  </div>
   @push('scripts')
   <script>
    $(document).ready(function () {
      var stepperElement = $('.bs-stepper')[0];
      var stepper = new window.Stepper(stepperElement);

      // Next buttons
      $('.btn-next').on('click', function () {
        stepper.next();
      });

      // Previous buttons
      $('.btn-prev').on('click', function () {
        stepper.previous();
      });
    });
  </script>
    <script>
    $(document).ready(function() {
      $('.select2drop').select2({
        placeholder: 'Choose Target Audienece',
      });

$('#template_id').on('change',function(id){

    
console.log($(this).val());

   $.ajax({
  url: '/get-template/'+$(this).val(), 
  method: 'GET', 
  dataType: 'json', 
  success: function(response) {
    
    console.log('Success:', response);
   
  },
  error: function(xhr, status, error) {
   
    console.error('Error:', error);
  },
  complete: function() {
 
    console.log('Request complete.');
  }
});
});

    });


  </script>
   @endpush
@endsection
