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
        <div class="col-lg-12">
            <div id="chart"></div>
        </div>
    </div>
</div>
@push('charts')
  @php
      $currentMonth = now()->format('m');
  @endphp
<script>
  
   var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    var options = {
      series: [
                {
                  type: 'bar',
                  name: 'Tuition',
              
                  data: [
                    {
                      x: monthNames[{{ $currentMonth }} - 1],
                      y:[  {{ $counttuition  }}]
                    },
                  ]
                },
              
                {
                  type: 'bar',
                  name: 'Corporate Service',
                  data: [
                    {
                      x: monthNames[{{ $currentMonth }} - 1],
                      y: [ {{ $countcorporate }}]
                    },
                    
                  ]
                },
              
                {
                  type: 'bar',
                  name: 'OtherService',
                  data: [
                    {
                      x: monthNames[{{ $currentMonth }} - 1],
                      y: [  {{ $countOtherservice }} ]
                    },
                    
                  ]
                },
                {
                  type: 'bar',
                  name: 'Merchandise ',
                  data: [
                    {
                      x: monthNames[{{ $currentMonth }} - 1],
                      y: {{  $countmerchandise }}
                    },
                  
                  ]
                },
                {
                  type: 'bar',
                  name: 'Visa ',
                  data: [
                    {
                      x: monthNames[{{ $currentMonth }} - 1],
                      y: [{{  $countvisa }}]
                    },
                  
                  ]
                },
                {
                  type: 'bar',
                  name: 'Local Fight ',
                  data: [
                    {
                      x: monthNames[{{ $currentMonth }} - 1],
                      y: [{{  $countfightlocal }}]
                    },
                  
                  ]
                },
                {
                  type: 'bar',
                  name: 'International Flights ',
                  data: [
                    {
                      x:  monthNames[{{ $currentMonth }} - 1],
                      y:[{{  $countfight }}]
                    },
                  
                  ]
                }
          ],
          // xaxis: {
          //   categories: [ monthNames[{{ $currentMonth }} - 1], monthNames[{{ $currentMonth }} - 1], monthNames[{{ $currentMonth }} - 1], monthNames[{{ $currentMonth }} - 1]]
          // },
          
          chart: {
            height: 350,
            type: 'bar',
            animations: {
              speed: 900
            }
          },
          colors: ['#d4526e', '#33b2df', '#d4526e', '#33b2df'],
          dataLabels: {
            enabled: false
          },
          fill: {
            opacity: [0.24, 0.24, 1, 1]
          },
          forecastDataPoints: {
            count: 2
          },
          stroke: {
            curve: 'straight',
            width: [0, 0, 2, 2]
          },
          legend: {
            show: true,
          //   customLegendItems: ['Team B', 'Team A'],
            inverseOrder: true
          },
          markers: {
            hover: {
              sizeOffset: 5
            },
            
          }

          
        };

        
        var chart = new ApexCharts(document.querySelector("#chartbar"), options);
        chart.render();
</script>




@endpush
@endsection
                   