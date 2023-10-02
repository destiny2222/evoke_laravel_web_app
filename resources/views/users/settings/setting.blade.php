@extends('layout.master')
@section('content')
    <div class="container p-t-5">
        {{-- <h1 class="m-b-2 payschool-h1">Settings</h1> --}}
        <div class="account_setting">
            <div class="setting_sidebar">
                <ul class="setting_ul">
                    <li class="setting_li setting_li_active">
                        <a href="#" class="setting_li_a">
                            <span class="setting_icon">
                                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                                </svg>                                                                                             
                            </span>
                            <span>Password</span>
                        </a>
                    </li>
                    <li class="setting_li">
                        <a href="#" class="setting_li_a">
                            <span class="setting_icon">
                                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>                                                            
                            </span>
                            <span> Notifications settings </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="setting_content">
                <div class="password s_content setting_li_active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="account-setting-h1">Password Settings</h2>
                            </div>
                            {{-- @if (session('status') == "password-updated")
                                <span class="alert-u alert-updated-success" role="alert">
                                    Password Updated Successfully
                                </span>
                            @endif --}}
                        </div>
                        <form action="{{ route('user-password.update') }}" method="post" style="margin-top:30px;">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="current_password">Old Password</label>
                                    <div class="login-password">
                                        <div class="form-group">
                                            <input type="password" id="current_password" name="current_password" class="applicant-input @error('current_password', 'updatePassword') is-invalid  @enderror" required>
                                            @error('current_password', 'updatePassword')
                                              <span style="color:#f59198;font-weight:600;" class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="password_input"> New Password</label>
                                    <div class="login-password">
                                        <div class="form-group">
                                            <input type="password" name="password" id="password_input" class="applicant-input" placeholder="">
                                            @error('password', 'updatePassword')
                                              <span style="color:#f59198;font-weight:600;" class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <label for="Confirm_password"> Confirm Password</label>
                                    <div class="login-password">
                                        <div class="form-group">
                                            <input type="password" id="Confirm_password" name="password_confirmation"  class="applicant-input" placeholder="">
                                            @error('password_confirmation', 'updatePassword')
                                              <span style="color:#f59198;font-weight:600;" class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="notification s_content">
                    <div class="container">
                        <div class="row" style="padding-bottom: 30px;">
                            <div class="col-lg-12">
                                <h2  class="account-setting-h1">Manage your notification settings</h2>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Email</th>
                                        <th>Sms</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Platform Update</td>
                                        <td>
                                            <input type="checkbox" name="" id="myCheckbox ">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="" id="myCheckbox ">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>News Announcements</td>
                                        <td>
                                            <input type="checkbox" name="" id="">
                                        </td>
                                        <td>
                                            <input type="checkbox" name="" id="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection        

@push('script')
    <script>
       let tabPanes = document.getElementsByClassName("setting_ul")[0].getElementsByClassName("setting_li");

            for (let i = 0; i < tabPanes.length; i++) {
            tabPanes[i].addEventListener("click", function() {
                // Remove active class from current active tab
                document.getElementsByClassName("setting_ul")[0].getElementsByClassName("setting_li_active")[0].classList.remove("setting_li_active");
                // Add active class to clicked tab
                tabPanes[i].classList.add("setting_li_active");

                // Remove active class from current active content section
                document.getElementsByClassName("setting_content")[0].getElementsByClassName("setting_li_active")[0].classList.remove("setting_li_active");
                // Add active class to corresponding content section
                document.getElementsByClassName("setting_content")[0].getElementsByClassName("s_content")[i].classList.add("setting_li_active");
            });
        }
    </script>


@endpush