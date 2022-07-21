@extends('adminlte::page')

@section('title', 'Personal Docente')

@section('content_header')
    <a class="btn btn-danger float-right">Generar PDF</a>
    <h1>Reporte Docentes</h1>
@stop

@section('content')
<div class="card">
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div id="container"></div>
                <div id="container2"></div>
            </div>
        </div>
    </div>
</div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="docente">
                <thead>
                    <tr>
                        <th>nombre materia</th>
                        <th>sigla</th>
                        <th>periodo</th>
                        <th width="10px">accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docentes as $docente)
                        <tr>
                            <td>{{$docente->nombre_materia}}</td>
                            <td>{{$docente->sigla}}</td>
                            <td>{{$docente->periodo}}</td>
                            <td >
                                {{-- <a class="btn btn-warning btn-sm float-right" href="{{route('admin.repoVerDocente', $docente->id)}}"><i class="far fa-edit"></i></a> --}}
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="~select2/dist/css/select2.css"> --}}
@stop

@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>    
    <script>
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Materias Dictadas por el docente'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: <?= $data ?>
        }]
    });
    // Create the chart
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'Materias Dictadas por el Docente'
    },
    subtitle: {
        align: 'left',
        text: 'Haga clic en las columnas para ver las versiones.'
    },
    accessibility: {
        announceNewData: {
            enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Porcentaje total de materias dictadas'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            name: "Browsers",
            colorByPoint: true,
            data: <?= $data ?>
        }
    ],
    
});
    </script>

@stop