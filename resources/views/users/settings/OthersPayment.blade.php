@extends('layout.master')
@section('content')
    <div class="continer">
       <div class="row p-b-5">
           <div class="col-lg-12 col-12">
                <div class="others_serice_payment_title">
                    <h2 class="">Other Services Payments</h2>
                    <h5>Provide your payment instruments.</h5>
                </div>
           </div>
       </div>
       <div class="row">
            <div class="col-lg-12 col-12">
                <div class="bdc_body shadow-lg p-l-3 p-r-3 p-t-3 p-b-4">
                    <div class="bdc_content">
                            <form action="" method="POST">
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Reasons for sending funds?</label>
                                        <input type="text" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Beneficiary Name*</label>
                                        <input type="text" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Full Name of account holder*</label>
                                        <input type="text" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>IBAN/Account number*</label>
                                        <input type="number" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>SWIFT/BIC code*</label>
                                        <input type="text" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Routine Number (US & CAD only)*</label>
                                        <input type="number" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label> Amount*</label>
                                        <input type="number" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Service Charge*</label>
                                        <input type="number" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Total Amount*</label>
                                        <input type="number" class="applicant-input">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12 ">
                                    <div class="form-group">
                                        <label>Reference*</label>
                                        <input type="text" class="applicant-input">  
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 ">
                                    <div class="form-body-checkbox">
                                    <input id="confirmPayment" type="checkbox">
                                    <label for="confirmPayment"> Click on the box to confirm your payment details </label> 
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 ">
                                    <input type="submit" class="submit-form" value="PROCEED WITH PAYMENT">
                                </div>
                            </form>
                    </div>
                    <div class="make_payment_balance ">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-12 p-y-4">
                                    <div class="others_serice_payment_title">
                                        <h4>Make payment with balance </h4>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 ">
                                  <div class="form-group">
                                      <label>Amount to be deducted from balance*</label>
                                      <input type="number" class="applicant-input">  
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-12 p-t-3">
                                    <div class="others_serice_payment_title">
                                        <h3>Deposite Funds</h3>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="select_payment_method tabs">
                                        <div class="local_banking tab">
                                            <div class="imgae_payment">
                                                <img src="{{ asset('assets/img/local.jpg') }}" alt="">
                                            </div>
                                            <span>Local online  bank</span>
                                        </div>
                                        <div class="visa tab">
                                            <div class="imgae_payment">
                                                <img src="{{  asset('assets/img/transfer.jpg') }}" width="70" alt="">
                                            </div>
                                            <span>Bank wire</span>
                                        </div>
                                       
                                   </div>
                                </div>
                            </div>
                        </form>
                   </div>
                </div>
            </div>
      </div>
    </div>
@endsection       