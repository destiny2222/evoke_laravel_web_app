@extends('layout.master')
@section('content')
    <div class="container p-t-5">
        <div class="row">
            <!-- first section -->
                                   
            <div class="col-lg-12">
                <form action="{{ route('user-profile-information.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="container-content-edit">
                                <img id="image-preview" src="{{ asset('profile/'.$user->image) }}" alt="">
                                <div class="container-content-edit-input">
                                    <label for="file-input" class="edit-button">Edit</label>
                                    <input type="file" name="image" id="file-input" >
                                </div>
                            </div> 
                        </div>
                        <input type="hidden" name="referrence_id" readonly value="{{ $user->referrence_id  }}">
                        <input type="hidden" name="address" value="{{ $user->address  }}">
                        <div class="col-lg-6 col-12">
                            <input type="text" class="profile-input" readonly  name="name" value="{{ $user->name }}" placeholder="Full Name">
                        </div>
                        <div class="col-lg-6 col-12" >
                            <input type="email" class="profile-input"  readonly name="email" value="{{ $user->email  }}" placeholder="Email Address">
                        </div>
                        <div class="col-lg-6 col-12">
                            <input type="phone" class="profile-input" readonly name="phone" id=""  value="{{ $user->phone }}" placeholder="Enter Phone">
                        </div>
                        <div  class="col-lg-6 col-12">
                            <input type="text" class="profile-input" readonly name="country" value="{{ $user->country }}" placeholder="Enter Country"> 
                        </div>
                        <div class="col-lg-6 col-12">
                            <input type="text" class="profile-input" readonly name="state"  value="{{ $user->state }}" placeholder="Enter State"> 
                        </div>
                        <div class="col-lg-6 col-12">
                            <input type="text" class="profile-input"  readonly name="city" value="{{ $user->city }}" placeholder="Enter City"> 
                        </div>
                        <div class="col-lg-12 col-12 text-center">
                            <button type="submit" class="profile-button">Save</button>
                        </div> 
                    </div>
                </form>      
            </div>
            {{-- <div class="col-lg-12 col-12 text-center" style="margin-top: 20px">
                <a href="/user/kyc" class="proceed_kyc">Proceed with KYC verification</a>
            </div>     --}}
        </div>
    </div>
@endsection    

@push('scripts')
<script>
    var input = document.querySelector("#file-input");
    var imagePreview = document.querySelector("#image-preview");

    input.addEventListener("change", function(event) {
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Additional code for international phone input (if needed)
    var phoneInput = document.querySelector("#phone");
    var iti = window.intlTelInput(phoneInput, {
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    });
</script>
@endpush