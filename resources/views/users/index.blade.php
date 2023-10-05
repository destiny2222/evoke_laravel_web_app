@extends('layout.master')
@section('content')
<div style="opacity: 1; pointer-events: all">
    <div class="p-b-4">
        <div class="Launchpad_launchpadComponentsContainer__lkCDU">
            <div style="height: auto">
                <div style="transform: none">
                    <h1 class="np-text-title-screen m-b-2">Account Balance</h1>
                </div>
                <div>
                    <div class="Header_container__g7Df9">
                        <h3 class="np-text-title-subsection Header_title__CrJH7">
                            ${{ number_format($balance, 2 ) }}
                        </h3>
                    </div>
                </div>
            </div>
            <div style="overflow: hidden; height: auto">
                <h3 class="np-text-title-subsection m-b-2">
                   Transaction History 
                </h3>
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-nowrap table-hover border table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="row" class="ps-4">
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel1" value="" aria-label="...">
                                            </th>
                                            <th scope="col">Sales Rep</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Mail</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="ps-4">
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel2" value="" aria-label="...">
                                            </th>
                                            <td>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                        <img src="../assets/images/faces/4.jpg" alt="img">
                                                    </span>Mayor Kelly
                                                </div>
                                            </td>
                                            <td>Manufacture</td>
                                            <td>mayorkelly@gmail.com</td>
                                            <td>
                                                <span class="badge bg-info-transparent">Germany</span>
                                            </td>
                                            <td>Sep 15 - Oct 12, 2023</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="ps-4">
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel13" value="" aria-label="..." checked="">
                                            </th>
                                            <td>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                        <img src="../assets/images/faces/15.jpg" alt="img"> </span>Andrew Garfield
                                                </div>
                                            </td>
                                            <td>Development</td>
                                            <td>andrewgarfield@gmail.com</td>
                                            <td>
                                                <span class="badge bg-primary-transparent">Canada</span>
                                            </td>
                                            <td>Apr 10 - Dec 12, 2023</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="ps-4">
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel4" value="" aria-label="...">
                                            </th>
                                            <td>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                        <img src="../assets/images/faces/11.jpg" alt="img"> </span>Simon Cowel
                                                </div>
                                            </td>
                                            <td>Service</td>
                                            <td>simoncowel234@gmail.com</td>
                                            <td>
                                                <span class="badge bg-danger-transparent">Europe</span>
                                            </td>
                                            <td>Sep 15 - Oct 12, 2023</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="ps-4">
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel5" value="" aria-label="..." checked="">
                                            </th>
                                            <td>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                        <img src="../assets/images/faces/8.jpg" alt="img">
                                                    </span>Mirinda Hers
                                                </div>
                                            </td>
                                            <td>Marketing</td>
                                            <td>mirindahers@gmail.com</td>
                                            <td>
                                                <span class="badge bg-warning-transparent">USA</span>
                                            </td>
                                            <td>Apr 14 - Dec 14, 2023</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="ps-4">
                                                <input class="form-check-input" type="checkbox" id="checkboxNoLabel3" value="" aria-label="..." checked="">
                                            </th>
                                            <td>
                                                <div class="d-flex align-items-center fw-semibold">
                                                    <span class="avatar avatar-sm me-2 avatar-rounded">
                                                        <img src="../assets/images/faces/9.jpg" alt="img">
                                                    </span>Jacob Smith
                                                </div>
                                            </td>
                                            <td>Social Plataform</td>
                                            <td>jacobsmith@gmail.com</td>
                                            <td>
                                                <span class="badge bg-success-transparent">Singapore</span>
                                            </td>
                                            <td>Feb 25 - Nov 25, 2023</td>
                                            <td>
                                                <div class="hstack gap-2 fs-15">
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-success-light"><i class="ri-download-2-line"></i></a>
                                                    <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon waves-effect waves-light btn-sm btn-primary-light"><i class="ri-edit-line"></i></a>
                                                </div>
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
    </div>
</div>
@endsection
                            