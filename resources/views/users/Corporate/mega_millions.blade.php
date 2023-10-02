@extends('layout.master')
@section('content')
    <div class="container" style="padding-top: 50px;">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="play_win">Play for $3</h2>
            </div>
        
            <div class="mega_m">
                <form action="" method="post">
                    <label for="digit">Provide your lucky six numbers: For the Mega Millions, the First Five Balls should be 1 – 70, while the last one Must be 1-24</label>
                    <div id="otp" class="d-flex align-items-center justify-content-center mt-2">
                        <input type="number" name="otp" class=" mx-2" id="one" maxlength="2">
                        <input type="number" name="otp" class=" mx-2" id="two" maxlength="2">
                        <input type="number" name="otp" class=" mx-2" id="three" maxlength="2">
                        <input type="number" name="otp" class=" mx-2" id="four" maxlength="2">
                        <input type="number" name="otp" class=" mx-2" id="five" maxlength="2">
                        <input type="number" name="otp" class=" mx-2" id="six" maxlength="2">
                    </div>
                    <div  class="terms_condition">
                        <input type="checkbox" name="" id="agree">
                        <label for="agree">agree to terms and conditions </label>
                    </div>
                    <div>
                        <input type="submit" value="Proceed" class="mega_submit">
                    </div>
                </form>
            </div>
        </div>    
    </div>
@endsection
