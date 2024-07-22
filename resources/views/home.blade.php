@extends('layouts.main')

@section('m1','Dashboard')
@section('m2','Dashboard')
@section('title',$title)
@section('content')
<style type="text/css">
    .float{
        position:fixed;
        width:60px;
        height:60px;
        bottom:40px;
        right:40px;
/*        background-color:#25d366;*/
/*        color:#FFF;*/
        border-radius:50px;
        text-align:center;
        font-size:30px;
        box-shadow: 2px 2px 3px #999;
        z-index:100;
    }

    .my-float{
        margin-top:16px;
    }
</style>
<div class="row">
    
    @role('SuperAdmin')
    
    @endrole
    <div class="d-sm-flex flex-wrap">
        <!-- <h4 class="card-title mb-4">Email Sent</h4> -->
        <div class="ms-auto">
            <a href="{{ route('suggestion.index') }}" class="btn btn-primary waves-effect waves-light">Total Data:&nbsp;&nbsp;<span id="total_data"></span> <i class="mdi mdi-arrow-right ms-1"></i></a>
            <br>
        </div>

    </div>

    <div class="my-float float">
        <!-- <div class="flex-shrink-0 align-self-center">
            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                <span class="avatar-title">
                    
                </span>
            </div>
        </div>
        <span class="avatar-title">
            <i class="bx bx-copy-alt font-size-24"></i>
        </span> -->
        <a class="float btn btn-primary" href="{{ route('suggestion.create') }}">
            <i class="bx bx-plus-medical font-size-24"></i>
        </a>
    </div>
    <div class="row" style="margin-top:10px;">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Type Wise</h4>
                    <div id="pie-chart" data-colors='["--bs-primary","--bs-warning", "--bs-danger","--bs-info", "--bs-success"]' class="e-charts"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Plant Wise</h4>
                    <div id="locationChart" data-colors='["--bs-primary","--bs-warning", "--bs-danger","--bs-info", "--bs-success"]' class="e-charts"></div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div id="departmentChart" data-colors='["--bs-primary","--bs-warning", "--bs-danger","--bs-info", "--bs-success"]' class="e-charts"></div>
                </div>
            </div>
        </div> -->
        <!-- <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div id="priorityChart" data-colors='["--bs-primary","--bs-warning", "--bs-danger","--bs-info", "--bs-success"]' class="e-charts"></div>
                </div>
            </div>
        </div> -->
        
        <!-- <div class="col-md-4">
            <div class="card-body">
                <canvas id="typeChart" class="e-charts"></canvas>
            </div>
        </div> -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Type Wise Count</h4>
                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap ">
                            <tbody class="type_wise">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Status Wise</h4>
                    <div id="statusChart" data-colors='["--bs-primary","--bs-warning", "--bs-danger","--bs-info", "--bs-success"]' class="e-charts"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Score Wise Count</h4>
                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap ">
                            <tbody class="score_wise">
                                
                            </tbody>
                        </table>
                        <div class="text-center mt-4 view_more" style="display:none;"><a href="{{url('top-score')}}" class="btn btn-primary waves-effect waves-light btn-sm">View More <i class="mdi mdi-arrow-right ms-1"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<!-- DataTables -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  -->
@endsection
@section('js')
<!-- echarts js -->
<script src="{{ asset('assets/libs/echarts/echarts.min.js') }}"></script>
<!-- Chart JS -->
<script src="{{ asset('assets/libs/chart.js/chart.umd.js') }}"></script>

 <script>
    window.onload = function() {
        fetch('{{ url("/dashboard-data") }}')
            .then(response => response.json())
            .then(data => {
               
                function initPieChart(domId, chartTitle, chartData) {
                    let dom = document.getElementById(domId);
                    let myChart = echarts.init(dom);
                    let pieChartColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'];
                    let option = {
                        tooltip: {
                            trigger: "item",
                            formatter: "{a} <br/>{b} : {c} ({d}%)"
                        },
                        legend: {
                            orient: "vertical",
                            left: "left",
                            data: Object.keys(chartData),
                            textStyle: {
                                color: "#8791af"
                            }
                        },
                        color: pieChartColors,
                        series: [{
                            name: chartTitle,
                            type: 'pie',
                            selectedMode: 'single',
                            radius: "60%",
                            center: ["50%", "60%"],
                            label: {
                                position: 'inner',
                                fontSize: 14,
                                formatter: '{c}' // Only display the value
                            },
                            labelLine: {
                                show: false
                            },
                            data: Object.entries(chartData).map(([name, value]) => ({ value, name })),
                            itemStyle: {
                                emphasis: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowColor: "rgba(0, 0, 0, 0.5)"
                                }
                            }
                        }]
                    };
                    myChart.setOption(option, true);
                }
                function initBarChart(domId, chartTitle, chartData) {
                    let dom = document.getElementById(domId);
                    let myChart = echarts.init(dom);
                    let barChartColors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'];
                    let option = {
                        tooltip: {
                            trigger: "axis",
                            axisPointer: {
                                type: 'shadow'
                            }
                        },
                        // legend: {
                        //     data: [chartTitle],
                        //     textStyle: {
                        //         color: "#8791af"
                        //     }
                        // },
                        color: barChartColors,
                        xAxis: {
                            type: 'category',
                            data: Object.keys(chartData),
                            // axisLine: {
                            //     lineStyle: {
                            //         color: '#8791af'
                            //     }
                            // },
                            // axisLabel: {
                            //     color: '#8791af'
                            // }
                        },
                        yAxis: {
                            type: 'value',
                            axisLine: {
                                lineStyle: {
                                    color: '#8791af'
                                }
                            },
                            axisLabel: {
                                color: '#8791af'
                            }
                        },
                        series: [{
                            name: chartTitle,
                            type: 'bar',
                            data: Object.entries(chartData).map(([name, value]) => value),
                            label: {
                                show: true,
                                position: 'inside',
                                formatter: '{c}', // Only display the value
                                color: '#fff'
                            },
                            itemStyle: {
                                emphasis: {
                                    shadowBlur: 10,
                                    shadowOffsetX: 0,
                                    shadowColor: "rgba(0, 0, 0, 0.5)"
                                }
                            }
                        }]
                    };
                    myChart.setOption(option, true);
                }
                initPieChart('pie-chart', 'Type wise', data.type_wise);
                var type_wise = ``;
                var total_data = 0;
                $.each(data.type_wise, function(name, value) {
                    total_data += value;
                    type_wise += `
                        <tr>
                            <td style="width: 30%">
                                <p class="mb-0">${name}</p>
                            </td>
                            <td style="width: 25%">
                                <h5 class="mb-0">${value}</h5></td>
                        </tr>
                    `;
                });
                var score_wise = ``;
                
                $.each(data.score_wise, function(name, value) {

                    if (name > 4) {
                        $('.view_more').show();
                        return false;
                    }else{
                        score_wise += `
                            <tr>
                                <td style="width: 30%">
                                    <p class="mb-0">${value.get_created_by.name}</p>
                                </td>
                                <td style="width: 25%">
                                    <h5 class="mb-0">${value.feedback_score}</h5></td>
                            </tr>
                        `;
                    }
                });
                $('.type_wise').html(type_wise);
                $('.score_wise').html(score_wise);
                $('#total_data').html(total_data);
                initPieChart('locationChart', 'Plant wise', data.location_wise);
                // initPieChart('departmentChart', 'Department wise', data.department_wise);
                // initPieChart('priorityChart', 'Priority wise', data.priority_wise);
                initBarChart('statusChart', 'Status wise', data.status_wise);
                
            });
    };
    function getChartColorsArray(t) {
    if (null !== document.getElementById(t)) {
        var e = document.getElementById(t).getAttribute("data-colors");
        if (e) return (e = JSON.parse(e)).map(function(t) {
            var e = t.replace(" ", "");
            if (-1 === e.indexOf(",")) {
                var o = getComputedStyle(document.documentElement).getPropertyValue(e);
                return o || e
            }
            var a = t.split(",");
            return 2 != a.length ? e : "rgba(" + getComputedStyle(document.documentElement).getPropertyValue(a[0]) + "," + a[1] + ")"
        });
        console.warn("data-colors Attribute not found on:", t)
    }
}



</script>  
@endsection
