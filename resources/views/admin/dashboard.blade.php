@extends('admin.layouts.app')
@section('content')
@if(env('MAIL_USERNAME') == null && env('MAIL_PASSWORD') == null)
    <div class="">
        <div class="alert alert-danger d-flex align-items-center">
            {{translate('Please Configure SMTP Setting to work all email sending functionality')}},
            <a class="alert-link ml-2" href="{{ route('smtp_settings') }}">{{ translate('Configure Now') }}</a>
        </div>
    </div>
@endif

<div class="row gutters-10">
    <div class="col-xl-3 col-md-6">
        <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="opacity-50">
                    <span class="fs-12 d-block">{{ translate('Total') }}</span>
                    {{ translate('Members') }}
                </div>
                <div class="h3 fw-700 mb-3">{{ \App\Models\User::all()->count() }}</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="opacity-50">
                    <span class="fs-12 d-block">{{ translate('Premium') }}</span>
                    {{ translate('Members') }}
                </div>
                <div class="h3 fw-700 mb-3">{{ \App\Models\User::all()->where('membership', 2 )->count() }}</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="opacity-50">
                    <span class="fs-12 d-block">{{ translate('Free') }}</span>
                    {{ translate('Members') }}
                </div>
                <div class="h3 fw-700 mb-3">{{ \App\Models\User::all()->where('membership', 1)->count() }}</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
            </svg>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="bg-grad-4 text-white rounded-lg mb-4 overflow-hidden">
            <div class="px-3 pt-3">
                <div class="opacity-50">
                    <span class="fs-12 d-block">{{ translate('Blocked') }}</span>
                    {{ translate('Members') }}
                </div>
                <div class="h3 fw-700 mb-3">{{ \App\Models\User::all()->where('blocked', 1)->count() }}</div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
            </svg>
        </div>
    </div>
</div>
<div class="row gutters-10">
    <div class="col-xxl-8 col-xl-7">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0 fs-14">{{ translate('This year earnings') }}</h6>
            </div>
            <div class="card-body">
                <canvas id="chart-1" class="w-100" height="300"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-xl-5">
        <div class="h-100 row gutters-10">
            <div class="col-6 mb-3">
                <div class="bg-white h-100 px-3 py-4 rounded shadow-sm d-flex flex-column justify-content-center">
                    <span class="opacity-50 fs-16 mb-2">{{ translate('Total Earnings') }}</span>
                    <div class="h2"></div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="bg-white h-100 px-3 py-4 rounded shadow-sm d-flex flex-column justify-content-center">
                    <span class="opacity-50 fs-16 mb-2">{{ translate('Last Month Earnings') }}</span>
                      
                    <div class="h2"></div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="bg-white h-100 px-3 py-4 rounded shadow-sm d-flex flex-column justify-content-center">
                    <span class="opacity-50 fs-16 mb-2">{{ translate('Last 6 Months Earnings') }}</span>
                     
                    <div class="h2"></div>
                </div>
            </div>
            <div class="col-6 mb-3">
                <div class="bg-white h-100 px-3 py-4 rounded shadow-sm d-flex flex-column justify-content-center">
                    <span class="opacity-50 fs-16 mb-2">{{ translate('Last 12 Months Earnings') }}</span>
                     
                    <div class="h2"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row gutters-10">
    <div class="col-xxl-8 col-xl-7">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0 fs-14">{{ translate('Happy stories') }}</h6>
            </div>
            <div class="card-body">
                <div class="aiz-carousel gutters-10" data-items='4' data-xl-items='3' data-lg-items='4' data-md-items='3' data-sm-items='2' data-xs-items='1'>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-xl-5">
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0 fs-14">{{ translate('Happy stories') }}</h6>
            </div>
            <div class="card-body">
                <canvas id="pie-1" class="w-100" height="275"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    AIZ.plugins.chart('#pie-1',{
        type: 'doughnut',
        data: {
            labels: [
                '{{translate('Total Happy Stories')}}',
                '{{translate('Approved Happy Stories')}}',
                '{{translate('Pending Happy Stories')}}'
            ],
            datasets: [
                {
                    data: [
                       
                    ],
                    backgroundColor: [
                        "#fd3995",
                        "#34bfa3",
                        "#5d78ff"
                    ]
                }
            ]
        },
        options: {
            cutoutPercentage: 70,
            legend: {
                labels: {
                    fontFamily: 'Poppins',
                    boxWidth: 10,
                    usePointStyle: true
                },
                onClick: function () {
                    return '';
                },
                position: 'bottom'
            }
        }
    });

    AIZ.plugins.chart('#chart-1',{
        type: 'line',
        data: {
            labels: [
                '{{ translate('JAN') }}',
                '{{ translate('FEB') }}',
                '{{ translate('MAR') }}',
                '{{ translate('APR') }}',
                '{{ translate('MAY') }}',
                '{{ translate('JUN') }}',
                '{{ translate('JUL') }}',
                '{{ translate('SEP') }}',
                '{{ translate('OCT') }}',
                '{{ translate('NOV') }}',
                '{{ translate('DEC') }}'
            ],
            datasets: [{
                label: '',
                data: [
                        
                    ],
                backgroundColor: 'rgba(55, 125, 255, 0)',
                borderColor: '#377dff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            legend: {
                display: false
            },
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        color: '#e5e6e8',
                    },
                    display: true,
                    ticks: {
                        autoSkip: false,
                        maxTicksLimit: 8,
                        fontSize: 10,
                        maxRotation: 0,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        color: '#e5e6e8',
                    },
                    display: true,
                }]
            },
            elements: {
                point:{
                    radius: 0
                }
            }
        }
    });
</script>
@endsection
