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
            {{-- <div style="overflow: hidden; height: auto">
                <h3 class="np-text-title-subsection m-b-2">
                    Exchange rate
                </h3>
                <div class="Component_chartWrapper__Oj_Ug">
                    <div class="RechartsChart_rateChartComponent__d3wVd">
                        <div class="RechartsChart_rateChartComponentInfo__Zmcjb">
                            <div class="RechartsChart_rateChartComponentTitle__9Aify">
                                <h4 class="np-text-title-body">
                                    1,000 NGN = 1.52152 USD
                                </h4>
                                <div class="np-text-body-default">Today</div>
                            </div>
                            <button type="button"
                                class="np-action-btn np-text-body-default-bold btn-priority-1">
                                Edit
                            </button>
                        </div>
                        <div class="recharts-responsive-container"
                            style="width: 100%; height: 155px; min-width: 0"
                            width="448" height="155">
                            <div class="recharts-wrapper" role="region"
                                style="position: relative;cursor: default;width: 448px;height: 155px;">
                                <svg class="recharts-surface" width="448"
                                    height="155" viewBox="0 0 448 155">
                                    <title></title>
                                    <desc></desc>
                                    <defs>
                                        <clippath id="recharts1-clip">
                                            <rect x="24" y="24"
                                                height="107" width="332"></rect>
                                        </clippath>
                                    </defs>
                                    <g
                                        class="recharts-layer recharts-cartesian-axis recharts-yAxis yAxis">
                                        <g class="recharts-cartesian-axis-ticks">
                                            <g
                                                class="recharts-layer recharts-cartesian-axis-tick">
                                                <text orientation="right"
                                                    width="60" height="107"
                                                    x="422" y="131"
                                                    stroke="none"
                                                    fill="var(--color-content-tertiary)"
                                                    font-size="12"
                                                    class="recharts-text recharts-cartesian-axis-tick-value"
                                                    text-anchor="end">
                                                    <tspan x="422"
                                                        dy="0.355em">
                                                        1.522
                                                    </tspan>
                                                </text>
                                            </g>
                                            <g
                                                class="recharts-layer recharts-cartesian-axis-tick">
                                                <text orientation="right"
                                                    width="60" height="107"
                                                    x="422"
                                                    y="77.50000000000003"
                                                    stroke="none"
                                                    fill="var(--color-content-tertiary)"
                                                    font-size="12"
                                                    class="recharts-text recharts-cartesian-axis-tick-value"
                                                    text-anchor="end">
                                                    <tspan x="422"
                                                        dy="0.355em">
                                                        1.846
                                                    </tspan>
                                                </text>
                                            </g>
                                            <g
                                                class="recharts-layer recharts-cartesian-axis-tick">
                                                <text orientation="right"
                                                    width="60" height="107"
                                                    x="422" y="24"
                                                    stroke="none"
                                                    fill="var(--color-content-tertiary)"
                                                    font-size="12"
                                                    class="recharts-text recharts-cartesian-axis-tick-value"
                                                    text-anchor="end">
                                                    <tspan x="422"
                                                        dy="0.355em">
                                                        2.17
                                                    </tspan>
                                                </text>
                                            </g>
                                        </g>
                                    </g>
                                    <defs>
                                        <lineargradient
                                            id="colorGradient-Q0hBUlQ6OjQwNTkyNTk2OjpSQVRF"
                                            x1="0%" y1="0"
                                            x2="100%" y2="0">
                                            <stop offset="0%"
                                                stop-color="var(--color-interactive-primary)">
                                            </stop>
                                            <stop offset="100%"
                                                stop-color="var(--color-interactive-primary)">
                                            </stop>
                                            <stop offset="100%"
                                                stop-color="var(--color-border-neutral)">
                                            </stop>
                                            <stop offset="100%"
                                                stop-color="var(--color-border-neutral)">
                                            </stop>
                                        </lineargradient>
                                    </defs>
                                    <g class="recharts-layer recharts-line">
                                        <path
                                            stroke="url(#colorGradient-Q0hBUlQ6OjQwNTkyNTk2OjpSQVRF)"
                                            stroke-width="4" fill="none"
                                            width="332" height="107"
                                            class="recharts-curve recharts-line-curve"
                                            d="M24,24.567C27.689,24.557,31.378,24.546,35.067,24.533C38.756,24.52,42.444,24.505,46.133,24.571C49.822,24.637,53.511,24.784,57.2,24.915C60.889,25.047,64.578,25.162,68.267,24.915C71.956,24.668,75.644,24.059,79.333,24.068C83.022,24.076,86.711,24.702,90.4,24.549C94.089,24.396,97.778,23.464,101.467,24.167C105.156,24.869,108.844,27.207,112.533,27.325C116.222,27.443,119.911,25.342,123.6,24.566C127.289,23.789,130.978,24.336,134.667,24.571C138.356,24.805,142.044,24.727,145.733,24.571C149.422,24.414,153.111,24.178,156.8,24C160.489,23.822,164.178,23.701,167.867,24.01C171.556,24.319,175.244,25.057,178.933,24.953C182.622,24.85,186.311,23.904,190,24.559C193.689,25.214,197.378,27.47,201.067,27.572C204.756,27.675,208.444,25.624,212.133,24.937C215.822,24.25,219.511,24.927,223.2,24.937C226.889,24.946,230.578,24.288,234.267,24.48C237.956,24.672,241.644,25.715,245.333,26.075C249.022,26.434,252.711,26.11,256.4,27.35C260.089,28.59,263.778,31.394,267.467,31.567C271.156,31.74,274.844,29.282,278.533,28.039C282.222,26.796,285.911,26.768,289.6,26.86C293.289,26.951,296.978,27.163,300.667,26.86C304.356,26.557,308.044,25.74,311.733,25.3C315.422,24.859,319.111,24.794,322.8,26.108C326.489,27.422,330.178,30.115,333.867,26.075C337.556,22.035,341.244,11.261,344.933,27.627C348.622,43.992,352.311,87.496,356,131">
                                        </path>
                                        <g class="recharts-layer"></g>
                                        <g class="recharts-layer recharts-line-dots"
                                            role="img">
                                            <circle cx="356" r="4"
                                                cy="131"
                                                fill="var(--color-interactive-primary)"
                                                stroke="var(--color-interactive-primary)"
                                                stroke-width="12"
                                                stroke-opacity="0.1">
                                                <animate attributeName="stroke-width"
                                                    values="12; 24; 24; 12; 12"
                                                    dur="3s"
                                                    keyTimes="0; 0.25; 0.5; 0.75; 1"
                                                    repeatCount="indefinite"></animate>
                                            </circle>
                                            <circle cx="356" r="4"
                                                cy="131" fill="transparent"
                                                stroke="#fff" stroke-width="2"
                                                stroke-opacity="1">
                                            </circle>
                                        </g>
                                    </g>
                                </svg>
                                <div tabindex="-1" role="dialog" class="recharts-tooltip-wrapper" style="pointer-events: none;visibility: hidden;position: absolute;top: 0px;left: 0px;">
                                </div>
                            </div>
                        </div>
                        <div class="RechartsChart_rateChartComponentXLabel__i9_w7">
                            <div class="np-text-body-default">
                                A month ago
                            </div>
                            <div class="np-text-body-default">Today</div>
                        </div>
                    </div>
                    <div class="sr-only">
                        <table>
                            <caption>
                                Table
                                outlining
                                the exchange
                                rate between
                                currencies
                                over time
                            </caption>
                            <thead>
                                <tr>
                                    <th>Date
                                        and
                                        time</th>
                                    <th>Exchange
                                        rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>17
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16686
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>18
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16707
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>19
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16684
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>20
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16475
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>21
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16475
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>22
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16989
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>23
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16697
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>24
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16929
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>25
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.15014
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>26
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16687
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>27
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16684
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>28
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16684
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>29
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.17030
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>30
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.17024
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>31
                                        May</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16452
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>1
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16691
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>2
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.14864
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>3
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16462
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>4
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16462
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>5
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16739
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>6
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.15772
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>7
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.14999
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>Thu
                                        8
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.12442
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>Fri
                                        9
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.14581
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>Sat
                                        10
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.15296
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>Sun
                                        11
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.15296
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>Mon
                                        12
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.16242
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>Tue
                                        13
                                        Jun</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.15752
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>Wednesday</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.15772
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>Yesterday</td>
                                    <td>1,000
                                        NGN
                                        :
                                        2.14831
                                        USD</td>
                                </tr>
                                <tr>
                                    <td>Today</td>
                                    <td>1,000
                                        NGN
                                        :
                                        1.52152
                                        USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
                            