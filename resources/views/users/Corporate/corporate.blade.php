@extends('layout.master')
@section('content')
    <div class="continer">
        <div class="row">
            <div class="col-lg-12 m-b-2">
                <a href="{{ route('initiator-page') }}" style="text-decoration:none;">
                    <i class="bi bi-arrow-left"></i>                         
                    Go Back  
                </a>
            </div>
        </div>
        <div class="bdc_container ">
            <div class="bdc_title tab-link active">Corporate Service</div>
        </div>
       <div class="row">
        <div class="col-lg-12 col-12">
          <div class="bdc_body">
               <div class="bdc_content tab-item active">
                    <form action="" method="POST">
                        <div class="col-lg-6 col-12 p-t-2 ">
                            <label for="exampleInputName" class="form-label">Name</label>
                            <input type="text" class="applicant-input" id="exampleInputName" placeholder="Enter your name">
                        </div>
            
                        <div class="col-lg-6 col-12 p-t-2">
                            <label for="exampleInputBankName" class="form-label">Bank Name</label>
                            <input type="text" class="applicant-input" id="exampleInputBankName" placeholder="Enter Bank Name">
                        </div>
            
                        <div class="col-lg-6 col-12 p-t-2">
                            <label class="form-label" for="exampleInputAccount">Account Number</label>
                            <input type="number" class="applicant-input" id="exampleInputAccount" placeholder="Account Number">
                        </div>
            
                        <div class="col-lg-6 col-12 p-t-2">
                            <label for="exampleInputAddress" class="form-label">Bank Address</label>
                            <input type="text" class="applicant-input" id="exampleInputAddress"  placeholder="Address">
                        </div>
            
                        <div class="col-lg-6 col-12 p-t-2">
                            <label class="form-label" for="exampleInputSwift">Swift Code</label>
                            <input type="number" class="applicant-input" id="exampleInputSwift" placeholder="code">
                        </div>
            
                        <div class="col-lg-6 col-12 p-t-2">
                            <label class="form-label" id="exampleInputamount">Amount</label>
                            <input type="number" class="applicant-input" id="exampleInputamount" placeholder="Amount">
                        </div>
                        <div class="col-lg-12  col-12">
                            <div class="text-center">
                                <input type="submit"  class="submit-form " style="width:50%;" value="Submit">
                            </div>
                        </div>
                    </form>
               </div>
          </div>
        </div>
      </div>
    </div>
@endsection       
@push('script')
<script>
    // Get the tab elements
         const tabs = document.querySelectorAll('.tab-link');
         const tabContents = document.querySelectorAll('.tab-item');

         // Add click event listeners to tabs
         tabs.forEach((tab, index) => {
         tab.addEventListener('click', () => {
             // Remove 'active' class from all tabs and contents
             tabs.forEach(tab => tab.classList.remove('active'));
             tabContents.forEach(content => content.classList.remove('active'));

             // Add 'active' class to the clicked tab and corresponding content
             tab.classList.add('active');
             tabContents[index].classList.add('active');
         });
     });
</script>
@endpush