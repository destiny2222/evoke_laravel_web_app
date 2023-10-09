@extends('layout.master')
@section('content')

    <div class="container" style="padding-top: 20px">
        <div class="container-item shadow-lg p-r-3 p-l-3 p-b-3 p-t-3">
            <form action="{{  route('merchandise-payment') }}" method="post">
                @csrf
                <div id='form'>
                    <div class="slide-one">
                        <h2>Application Fee</h2>
                        <span class='msg' style="color: red; font-size: 13px;"></span>
                        <br>
                        <p>Amount: ${{ $merchandise->amount }} </p>
                        <p>Service Charge: {{ $charges->merchant_charge_amount }}%</p>
                        <p>Total amount: <span >${{  $merchandise->total_amount  }}</span></p>
                        <div>
                            <button type="button"  class="submit-form w-100 next">Confirm and Continue</button>
                        </div>
                    </div>
                    <input type="text" name="amount" value="{{ $merchandise->amount }}" hidden style="border: none" id="">
                    <input type="text" name="serviceCharge" value="{{ $charges->tuition_charge_amount }}" hidden style="border:none"  id=""> 
                    <input type="text" name="total" class="total-amount" id="" hidden value="{{  $merchandise->total_amount  }}"  style="border:none">  
                    <div class="slide-two">
                        <span class='msg2' style="color: red; font-size: 13px;"></span><br>
                        <p id='back'><i class="fa fa-arrow-left"></i> <span id='name' style="color: #383838;"></span></p><br>
                        <div class="container">
                            <div class="row m-b-4">
                               <div class="col-lg-12">
                                    <h3>Payment Option</h3>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="card-payment-ul">
                                        <li  class="card-payment m-b-1" style="display: flex;">
                                            <h4>Make payment with Balance: ${{ number_format(auth()->user()->userwallet->amount,2 ) }} </h4>
                                        </li>
                                        <li class="card-payment m-b-1" style="display: flex;">
                                            <img src="{{ asset('assets/img/local.jpg') }}" alt="">   
                                            <h4>Local online <br> banking </h4>
                                        </li>
                                        <li class="card-payment m-b-1" style="display: flex;">
                                            <img width="100" src="{{ asset('visa.png') }}" alt="">  
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="mb-3">Choose payment method</h4>
                                     <select name="paymentMethod" class="form-control" id="">
                                        <option selected>Select</option>
                                        <option value="balance">Balance</option>
                                        <option value="debit">Local online banking</option>
                                        <option value="visa">Visa</option>
                                     </select>
                                </div>
                                <div class="col-lg-12 col-12 text-center">
                                    <input type="submit" value="Proceed to payment" class="submit-form  w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<script>

    var next = document.querySelector('.next');
    var slide_one = document.querySelector('.slide-one');
    var slide_two = document.querySelector('.slide-two');

    var email = document.querySelector('.total-amount')
    // var nameText = document.getElementById('name')
    var back_btn = document.getElementById('back')
    var msg = document.querySelector('.msg')
    var msg2 = document.querySelector('.msg2')

    // var container_item_2 = document.querySelector('.container-item-2')
    
    next.addEventListener('click', function () {
        if (email.value == "") {
            msg.textContent = 'Enter a valid email address, phone number, or Skype name.'
        } else {
            msg.textContent = ""
            // nameText.textContent = email.value
            slide_one.classList.add('slide-one-toggle')
            slide_two.classList.add('slide-two-toggle')
        }
    })
    back_btn.addEventListener('click', function () {
        slide_one.classList.remove('slide-one-toggle')
        slide_two.classList.remove('slide-two-toggle')
    });

    document.addEventListener('DOMContentLoaded', function() {
        var amount = parseFloat(document.querySelector('input[name="amount"]').value);
        var serviceCharge = parseFloat(document.querySelector('input[name="serviceCharge"]').value);
        var total = amount + serviceCharge;
        document.getElementById('total').value = total;
    });


    document.querySelector('form').addEventListener('submit', function(event) {
      var selectedPaymentMethod = document.querySelector('input[name="paymentMethod"]:checked').value;
      document.querySelector('input[name="paymentMethod"]').value = selectedPaymentMethod;
    });
 

   
</script>
@endsection