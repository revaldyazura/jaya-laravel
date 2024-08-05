@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
<div class="card-body">
<h3>Sukses Bayar</h3>
<h5>Terimakasih karena telah membeli di toko kami</h5>
</div>
            </div>
            <div class="card mt-2">
            </div>
            <div class="card-body">
                <h3><i class="fas fa-receipt"></i> Pembayaran</h3>
                @if(!empty($faktur))
                <p align="right">Tanggal Bayar : {{ $faktur->tanggal }}</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $faktur->pesanan->barang->nama_barang }}</td>
                            <td>{{ $faktur->pesanan->jumlah }} pcs</td>
                            <td>Rp. {{ number_format($faktur->pesanan->barang->harga) }}</td>
                            <td>Rp. {{ number_format($faktur->pesanan->jumlah_harga) }}</td>
                     
                        </tr>
                    </tbody>
                    
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
@endsection