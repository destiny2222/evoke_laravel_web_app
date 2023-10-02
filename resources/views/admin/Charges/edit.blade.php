


<div class="modal fade" id="exampleModal{{ $charges->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{  __('Edit')  }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.transaction-charge-update', $charges->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-fullname">{{ __('Tuition Charge Amount') }}</label>
                        <input type="text" name="tuition_charge_amount" value="{{ $charges->tuition_charge_amount }}" class="form-control @error('tuition_charge_amount') is-invalid @enderror" id="basic-default-fullname" placeholder="" />
                        @error('tuition_charge_amount')
                          <span class="invalid-feedback" role="alert">
                             {{ $message }}
                          </span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-company">{{  __('Visa Charge Amount') }}</label>
                        <input type="text"   name="visa_charge_amount" value="{{ $charges->visa_charge_amount }}" class="form-control  @error('visa_charge_amount') is-invalid @enderror" id="basic-default-company" placeholder="" />
                        @error('visa_charge_amount')
                        <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-company">{{  __('Corporate Charge Amount') }}</label>
                        <input type="text"   name="corporate_charge_amount" value="{{ $charges->corporate_charge_amount }}" class="form-control  @error('corporate_charge_amount') is-invalid @enderror" id="basic-default-company" placeholder="" />
                        @error('corporate_charge_amount')
                        <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-company">{{  __('Merchant Charge Amount') }}</label>
                        <input type="text"   name="merchant_charge_amount" value="{{ $charges->merchant_charge_amount }}" class="form-control  @error('merchant_charge_amount') is-invalid @enderror" id="basic-default-company" placeholder="" />
                        @error('merchant_charge_amount')
                        <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="basic-default-company">{{  __('Flights Charge Amount') }}</label>
                        <input type="text"   name="flights_charge_amount" value="{{ $charges->flights_charge_amount }}" class="form-control  @error('flights_charge_amount') is-invalid @enderror" id="basic-default-company" placeholder="" />
                        @error('flights_charge_amount')
                        <span class="invalid-feedback" role="alert">{{  $message  }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0 text-center">
                        <input type="submit" class="btn btn-primary btn-lg" value="Save Change">
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div> 
{{-- @include('layouts.script') --}}