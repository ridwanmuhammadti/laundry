@extends('backend.master')
@section('judul')
   Dashboard
@endsection

@section('content')
<div class="row">
  <div class="col-12 col-md-4 col-lg-4">
    <div class="pricing pricing-highlight">
      <div class="pricing-title">
        Total Pemasukan Laundry Hari ini
      </div>
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>{{ Rupiah($day) }}</div>
          <div></div>
        </div>
        <div class="pricing-details">
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $days->isoFormat('dddd') }}</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $pemasukanhari->count() }} Transaksi</div>
          </div>
      
        </div>
      </div>
      <div class="pricing-cta">
        <a href="/dashboard/keuangan/hari">View All <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 col-lg-4">
    <div class="pricing pricing-highlight">
      <div class="pricing-title">
        Total Pemasukan Laundry Bulan ini
      </div>
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>{{ Rupiah($bulan) }}</div>
          <div></div>
        </div>
        <div class="pricing-details">
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $days->isoFormat('MMMM') }}</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $pemasukanbulan->count() }} Transaksi</div>
          </div>
      
        </div>
      </div>
      <div class="pricing-cta">
        <a href="/dashboard/keuangan/bulan">View All <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
  <div class="col-12 col-md-4 col-lg-4">
    <div class="pricing pricing-highlight">
      <div class="pricing-title">
        Total Pemasukan Laundry Tahun ini
      </div>
      <div class="pricing-padding">
        <div class="pricing-price">
          <div>{{ Rupiah($tahun) }}</div>
          <div></div>
        </div>
        <div class="pricing-details">
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $days->isoFormat('YYYY') }}</div>
          </div>
          <div class="pricing-item">
            <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
            <div class="pricing-item-label">{{ $pemasukantahun->count() }} Transaksi</div>
          </div>
        
        </div>
      </div>
      <div class="pricing-cta">
        <a href="/dashboard/keuangan/tahun">View All <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
  <div class="" id="chartPemasukan"></div>
  </div>
</div>

@endsection

@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
  Highcharts.chart('chartPemasukan', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Pemasukan Bulanan'
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
            text: 'Jumlah'
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

    }]
});
</script>
@endsection