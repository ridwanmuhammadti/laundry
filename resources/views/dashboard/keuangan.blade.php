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

@endsection