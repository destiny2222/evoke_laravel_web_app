<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EvokeEdge limited | Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"  />
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        .modals {
            /* display: none; */
            position: fixed;
            z-index: 22;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .search-control{
          width: 100%;
          margin: 10px 0px  16px;
          border: none;
          cursor: pointer;
          background-color: #e5e5e5;
          padding: 20px  14px;
          border-radius: 5px;
          font-weight: 500;
          font-size: 17px;
          
        }
        
        
        
        
        .search-control:focus{
          outline: none !important;
          border:none;
          box-shadow: none;
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 30%;
            box-shadow:  0 1rem 3rem rgba(243, 111, 173, 0.175);
            border-radius: 20px;
        }
        
        input[type=submit]{
            background:#B04939;
            color: #fff;
            border: none;
            width: 100%;
            padding: 20px  0;
            cursor: pointer;
        }
        
        .modal-content .pay_p{
            color: #0E06AA !important;
            font-size: 22px
        }
        .modal-content .visa_span{
            color: #B04939 !important;
        }

        .back_home{
           position: relative;
            z-index: 223;
            text-align: end;
            right: 30px;
            top: 10%;
            
        }

        .back_home a{
            color: #fff;
            text-decoration: none;
        }

        .back_home span{
            color: #B04939 !important;
        }

        @media (max-width:768px){
            .modal-content{
                width: 80%;
            }

            .back_home{
                top: 5%;
            }
        }
        </style>
</head>
<body> 
    <div id="Payment" class="modals" >
        <div class="back_home">
            <a href="{{ route('dashboard-page') }}">
                <span><i class="fa-solid fa-home"></i></span>   Go Back</a>
        </div>       
        <div class="modal-content">
            <div>
                @if($visaApplication)
                    <p class="pay_p" style="display: none">Visa Application ID: <span class="visa_span">{{ $visaApplication->id }}</span></p>
                    <p class="pay_p" style="display: none">Name: <span  class="visa_span">{{ $visaApplication->name }}</span></p>
                    <p class="pay_p">Case Number: <span  class="visa_span">{{ $visaApplication->case_number }}</span></p>
                    <p class="pay_p">Service Fee: <span  class="visa_span">{{ $visaApplication->service_fee }}</span></p>
                    <p class="pay_p">Total Charge: <span  class="visa_span">{{ $visaApplication->total_charge }}</span></p>
            
                    <!-- Display payment options and handle payment processing -->
                    <form method="post" action="{{ route('initiate-page') }}" class="">
                        @csrf
                        <div>
                            <label for="payment_option">Select Payment Option:</label>
                            <select name="payment_option" class="search-control" id="payment_option">
                                <option value="" selected>Choose </option>
                                <option value="balance">Pay with Wallet Balance</option>
                                <option value="payment">Pay with Payment Method</option>
                            </select>
                        </div>
                        <div>
                            <input type="submit"  value="Pay Now">
                        </div>
                    </form>
                @else
                    <p>No visa application found.</p>
                @endif
            </div>
        </div>
    </div>
</body>
    @push('scripts')
        <script>
            // Function to show the modal
            function showModal() {
                $('.modals').css('display', 'block');
            }
        
            // Submit the form and show the modal on success
            $(document).on('submit', '#your-form-id', function (event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function (response) {
                        showModal();
                    },
                    error: function (xhr, status, error) {
                        // Handle errors if needed
                    }
                });
            });
        </script>
    @endpush
</html>