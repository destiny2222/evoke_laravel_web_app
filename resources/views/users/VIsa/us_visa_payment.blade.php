

@extends('layout.master')
@section('content')
    <div class="continer p-t-5">
         <div class="row">
              <div class="col-lg-10 col-12">
                <div class="card shadow-lg p-l-4 p-t-4 p-r-4 p-b-4">
                    <div class="card-body">
                        @if ($visaApplication)
                        <p class="pay_p">Service Fee: <span  class="visa_span">{{ $charge->sum('visa_charge_amount') }}%</span></p>
                        <p class="pay_p">Total Charge: <span  class="visa_span">$ {{ $visaApplication->total_charge }}</span></p>
                        @endif
                        <form action="{{  route('initiate-page') }}" method="post" class="visa_form">
                            @csrf
                            <input type="text" hidden name="total" value="{{ $visaApplication->total_charge }}" id="">
                            <div>
                                <label for="payment_option">Select Payment Option:</label>
                                <select name="payment_option" class="search-control" id="payment_option">
                                    <option value="" selected>Choose </option>
                                    <option value="balance">Pay with Wallet Balance</option>
                                    <option value="payment">Pay with local online bank </option>
                                </select>
                            </div>
                            <div>
                                <input type="submit"  value="Pay Now" class="submit-form  w-100">
                            </div>
                        </form>
                    </div>
               </div>
              </div>
         </div>
    </div>
@endsection            