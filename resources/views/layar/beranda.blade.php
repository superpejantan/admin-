@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="wrap">

    
    <div class="blog">
    
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
            <div class="inner">
            <h3>BARANG</h3>
            <p>jumlah = {{$jumlah}}</p>
            </div>
            <div class="icon">
                <i class="ion ion-clipboard"></i>
            </div>
                <a href="{{ url('admin/barang') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
            <div class="inner">
            <h3>{{ count(\DB::table('pesanan_barang')->get()) }}</h3>
            <p>Order Barang</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
                <a href="{{ url('admin/barang') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        
        </div>
       <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
            <div class="inner">
            <h3>{{ count(\DB::table('pesanan')->where('id_status', 3)->get()) }}</h3>
            <p>Pesanan Terferifikasi</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
                <a href="{{ url('admin/barang') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
            <div class="inner">
            <h3>{{ count(\DB::table('pesanan')->where('id_status', 2)->get()) }}</h3>
            <p>Pesanan Terbayar</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
                <a href="{{ url('admin/barang') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        
        </div>

        <div class="blog-kanan">
            <div id="container">

                </div>
        </div>
         <div class="blog-kiri">
         <div class="col-20">
                </div>
         <div class="col-20">
                </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
</script>
@endsection