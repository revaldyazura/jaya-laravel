@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">History</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Order</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
<div class="card-body">
<h3>Sukses Check Out</h3>
<h5>Pesanan anda sudah sukses check-out, untuk pembayaran silakan transfer <br> ke rekening<strong> Bank BSI: 0845646854 atas nama pegasus</strong> sejumlah: <strong>Rp. {{number_format($pesanan->kode+$pesanan->jumlah_harga)}}</strong></h5>
</div>
            </div>
            <div class="card mt-2">
            </div>
            <div class="card-body">
                <h3><i class="fa fa-shopping-cart"></i> Detail Order</h3>
                @if(!empty($pesanan))
                <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($pesanan_details as $pesanan_detail)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                            <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}" width="100" alt="...">
                            </td>
                            <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                            <td>{{ $pesanan_detail->jumlah }} pcs</td>
                            <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                            <td align="right">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                            
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                            
                        </tr>
                        <tr>
                            <td colspan="5" align="right"><strong>Code :</strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>
                            
                        </tr>
                        <tr>
                            <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga+$pesanan->kode) }}</strong></td>
                            
                        </tr>
                    </tbody>
                    
                </table>
                @endif
                <form method="post" action="{{ url('history') }}/{{ $pesanan_detail->pesanan_id }}">
                                        @csrf
                                        
                                        <button type="submit" class="btn btn-primary mt-4" onclick="return confirm('PASTIKAN ANDA SUDAH MENTRANSFER SEJUMLAH UANG YANG DIHARUSKAN SEBELUM KLIK OK');"> <i class="fas fa-money-bill-wave"></i> Sudah Transfer</button>
                                        </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection