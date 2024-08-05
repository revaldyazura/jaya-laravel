<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Barang;
use App\User;
use App\Faktur;
use Auth;
use App\Pesanan;
use App\PesananDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();

        return view('history.index', compact('pesanans'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('history.detail', compact('pesanan', 'pesanan_details'));
    }
    
    public function faktur( Request $request, $id)
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('id', $id)->where('status', 1)->first();
        $pesanan_details = [];
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->first();
        $tanggal = Carbon::now();
        //simpan faktur
        $faktur = new Faktur;
        $faktur->userr_id = Auth::user()->id;
        $faktur->pesenan_id = $pesanan_details->id;
        $faktur->tanggal = $tanggal;
        $faktur->save();
        $pesanan->delete();

        return view('history.faktur', compact('faktur'));
    }
}
