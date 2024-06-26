@extends('frontend.layouts.index')

@section('title',empty(language('frontend.dashboard.title')) ? language('frontend.dashboard.name') : language('frontend.dashboard.title'))
@section('keywords', language('frontend.dashboard.keywords') )
@section('description',language('frontend.dashboard.description') )


@section('content')
    <div class="bread-crumb-bar">

    </div>

    <!-- Page Content -->
    <div class="content content-page">
        <div class="container-fluid">
            <div class="row">

                <!-- sidebar -->
                <div class="col-xl-3 col-md-4 theiaStickySidebar">
                    @include('frontend.dashboard.employer._sidebar', ['user' => $user])
                </div>
                <!-- /sidebar -->

                <div class="col-xl-9 col-md-8">
                    <div class="dashboard-sec">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="dash-widget">
                                    <div class="dash-info">
                                        <div class="dash-widget-info">{{ language('Pending Services') }}</div>
                                        <div class="dash-widget-count">{{ $projects_count['pendingProjects'] }}</div>
                                    </div>
                                    <div class="dash-widget-more">
                                        <a href="{{ route('frontend.dashboard.employer.projects-pending') }}"
                                           class="d-flex">{{ language('View Details') }} <i
                                                class="fas fa-arrow-right ms-auto"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="dash-widget">
                                    <div class="dash-info">
                                        <div class="dash-widget-info">{{ language('Ongoing Services') }}</div>
                                        <div class="dash-widget-count">{{ $projects_count['ongoingProjects'] }}</div>
                                    </div>
                                    <div class="dash-widget-more">
                                        <a href="{{ route('frontend.dashboard.employer.projects-ongoing') }}"
                                           class="d-flex">{{ language('View Details') }} <i
                                                class="fas fa-arrow-right ms-auto"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="dash-widget">
                                    <div class="dash-info">
                                        <div class="dash-widget-info">{{ language('Completed Services') }}</div>
                                        <div class="dash-widget-count">{{ $projects_count['completedProjects'] }}</div>
                                    </div>
                                    <div class="dash-widget-more">
                                        <a href="{{ route('frontend.dashboard.employer.projects-completed') }}"
                                           class="d-flex">{{ language('View Details') }} <i
                                                class="fas fa-arrow-right ms-auto"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Content -->
                        <div class="row">
                            <div class="col-xl-8 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">{{ language('Your Activity') }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartProjects"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">{{ language('Static Analytics') }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartAnalytics"></div>
                                        <ul class="static-list">
                                            <li><span><i class="fas fa-circle text-warning me-1"></i> {{ language('Pending Services') }}</span>
                                                <span class="sta-count">{{ $projects_count['pendingProjects'] }}</span></li>
                                            <li><span><i
                                                        class="fas fa-circle text-primary me-1" style="color: #0dcaf0 !important;"></i> {{ language('Ongoing Services') }}</span>
                                                <span class="sta-count">{{ $projects_count['ongoingProjects'] }}</span></li>
                                            <li><span><i
                                                        class="fas fa-circle text-success me-1"></i> {{ language('Completed Services') }}</span>
                                                <span class="sta-count">{{ $projects_count['completedProjects'] }}</span></li>
                                            <li><span><i
                                                        class="fas fa-circle text-danger me-1"></i> {{ language('Cancelled Services') }}</span>
                                                <span class="sta-count">{{ $projects_count['cancelledProjects'] }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Chart Content -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

@endsection


@section('CSS')
@endsection

@section('JS')
    <script>
        var optionsAnalytics = {
            series: [
                {{ $projects_percent['pendingProjects'] }},
                {{ $projects_percent['ongoingProjects'] }},
                {{ $projects_percent['completedProjects'] }},
                {{ $projects_percent['cancelledProjects'] }},
            ],
            chart: {
                toolbar: {
                    show: false
                },
                height: 250,
                type: 'radialBar',
            },
            plotOptions: {
                radialBar: {
                    offsetY: 0,
                    startAngle: 0,
                    endAngle: 270,
                    hollow: {
                        margin: 5,
                        size: '50%',
                        background: 'transparent',
                        image: undefined,
                    },
                    dataLabels: {
                        name: {
                            show: false,
                        },
                        value: {
                            show: false,
                        }
                    }
                }
            },
            colors: ['#ffc107', '#0dcaf0', '#198754', '#dc3545'],
            labels: ['Pending Services', 'Ongoing Services', 'Completed Services', 'Cancelled Services'],
            legend: {
                show: false,
                floating: true,
                fontSize: '16px',
                position: 'bottom',
                offsetX: 160,
                offsetY: 15,
                labels: {
                    useSeriesColors: true,
                },
                markers: {
                    size: 0
                },
                formatter: function(seriesName, opts) {
                    return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
                },
                itemMargin: {
                    vertical: 3
                }
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    legend: {
                        show: false
                    }
                }
            }]
        };

        var chartAnalytics = new ApexCharts(document.querySelector("#chartAnalytics"), optionsAnalytics);
        chartAnalytics.render();

        var optionsProjects = {
            series: [{
                name: "Projects",
                data: [
                    @foreach($mountly_counts as $mountly_count)
                    {{ $mountly_count }},
                    @endforeach
                ]
            }],
            chart: {
                height: 360,
                type: 'line',
                toolbar: {
                    show: false
                },
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false
            },
            colors: ["#FF5B37"],
            stroke: {
                curve: 'straight',
                width: [1]
            },
            markers: {
                size: 4,
                colors: ["#FF5B37"],
                strokeColors: "#FF5B37",
                strokeWidth: 1,
                hover: {
                    size: 7,
                }
            },
            grid: {
                position: 'front',
                borderColor: '#ddd',
                strokeDashArray: 7,
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            xaxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                lines: {
                    show: false,
                }
            },
            yaxis: {
                lines: {
                    show: true,
                }
            }
        };

        var chartProjects = new ApexCharts(document.querySelector("#chartProjects"), optionsProjects);
        chartProjects.render();
    </script>
@endsection

