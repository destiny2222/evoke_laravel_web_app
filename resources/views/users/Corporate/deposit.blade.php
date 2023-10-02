@extends('layout.master')
@section('content')
    <div class="">
        <h1 class="np-text-title-screen m-b-2" style="color:blue">DEPOSIT FUNDS</h1>    
    </div>   
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
   <div class="tab-content">
        <div class="deposit-detail content">
            <h4>Enter details:</h4>
            <form action="{{ route('deposit.payment') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                <div class="" style="margin-bottom: 1rem;position:relative;">
                    <label for="amount" style="padding-top: 20px;">Amount:</label>
                    <input type="number" name="amount" id="amount" class="applicant-input">
                    <div class="amount-usd">
                        <p>USD</p>
                    </div>
                </div>
                <div class="" style="margin-bottom: 1rem;">
                    <label for="holder_name" style="padding-top: 20px;">Account Holder Name:</label>
                    <input type="text" name="name" id="holder_name" class="applicant-input">
                </div>
                <span>Enter your name as it appears in your Payment Account</span>
                <p>You cannot make a deposit using 3rd party. The name on your EvokeEdge Limited Account must match the same account used to make payment.</p>
                
                <div style="text-align:center;margin-top:50px">
                    <input type="submit" value="Proceed">
                </div>
            </form>     
        </div> 
    </div>
      
@endsection
