@extends('layout.master')
@section('content')
<div style="opacity: 1; pointer-events: all">
    <div class="p-b-4">
        <div class="">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="np-text-title-screen m-b-2">Account Balance</h1>
                        <div class="Header_container__g7Df9">
                            <h3 class="np-text-title-subsection Header_title__CrJH7">
                                ${{ number_format($balance, 2 ) }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="chartjs">
                <div id="chartbar"></div>
            </div>
        </div>
    </div>
</div>
@endsection
                            