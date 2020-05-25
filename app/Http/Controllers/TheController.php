<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TheController extends Controller
{
    public function index() {
        $total['wajib'] = DB::table('saldo')->where('tipe', 'wajib')->sum('jumlah');
        $total['reguler'] = DB::table('saldo')->where('tipe', 'reguler')->sum('jumlah');
        $total['all'] = $total['wajib'] + $total['reguler'];
        $total['wajib'] = $this->uang($total['wajib']);
        $total['reguler'] = $this->uang($total['reguler']);
        $total['all'] = $this->uang($total['all']);
        
        $reguler = DB::table('saldo')->where('tipe', 'reguler');
        $datas = DB::table('saldo')
            ->where('tipe', 'wajib')
            ->union($reguler)
            ->get();
        foreach($datas as $data) {
            $data->jumlah = $this->uang($data->jumlah);
            if ($data->tipe == 'wajib') {
                $data->nilai = $this->uang($data->nilai);
            }
        }
        return view('home', [
            'total' => $total,
            'datas' => $datas
        ]);
    }

    public function pemasukan() {
        return view('pemasukan');
    }

    public function add_pemasukan(Request $req) {
        $jumlah = $req->jumlah;
        $keterangan = $req->keterangan;
        $wajib = DB::table('saldo')->where('tipe', 'wajib')->sum('nilai');
        $saldos = DB::table('saldo')->get();
        
        # jika include dana wajib
        if ($req->include_wajib) {
            $jumlah -= $wajib;
            if ($jumlah <= 0) {
                return redirect('/pemasukan?kurang=true');
            } else {
                foreach($saldos as $saldo) {
                    $nilaiini = $saldo->nilai;
                    $jumlahini = $saldo->jumlah;
                    DB::table('saldo')
                        ->where('id', $saldo->id)
                        ->where('tipe', 'wajib')
                        ->update([
                            'jumlah' => $jumlahini + $nilaiini
                        ]);
                }
            }
        }

        # bagikan pemasukan ke saldo reguler yang tersedia
        foreach($saldos as $saldo) {
            $nilaiini = $saldo->nilai;
            $jumlahini = $saldo->jumlah;
            DB::table('saldo')
                ->where('id', $saldo->id)
                ->where('tipe', 'reguler')
                ->update([
                    'jumlah' => $jumlahini + ($jumlah * $nilaiini / 100)
                ]);
        }

        # catat log
        $total_jumlah = DB::table('saldo')->sum('jumlah');
        DB::table('log')->insert([
            'nama_saldo' => 'all',
            'jenis' => 'masuk',
            'nilai' => $req->jumlah,
            'keterangan' => $keterangan,
            'sisa_total' => $total_jumlah,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('/');
    }

    public function pengeluaran() {
        $datas = DB::table('saldo')->orderBy('tipe', 'desc')->get();
        return view('pengeluaran', [
            'datas' => $datas
        ]);
    }

    public function add_pengeluaran(Request $req) {
        $saldo = DB::table('saldo')->where('id', $req->id);
        $nama_saldo = $saldo->first()->nama;
        $jumlah_saldo = $saldo->first()->jumlah;
        $jumlah_keluar = $req->jumlah;
        $keterangan = $req->keterangan;
        
        DB::table('saldo')->where('id', $req->id)->update([
            'jumlah' => $jumlah_saldo - $jumlah_keluar
        ]);
            
        $total_jumlah = DB::table('saldo')->sum('jumlah');
        DB::table('log')->insert([
            'nama_saldo' => $nama_saldo,
            'jenis' => 'keluar',
            'nilai' => $jumlah_keluar,
            'keterangan' => $keterangan,
            'sisa_total' => $total_jumlah,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('/mutasi');
    }

    public function pembagian(Request $req) {
        $datas = DB::table('saldo')->get();
        foreach ($datas as $data) {
            if ($data->tipe == 'reguler') {
                $data->nilai = $data->nilai.'%';
            } else {
                $data->nilai = 'Rp '.$this->uang($data->nilai);                
            }
            $data->jumlah = 'Rp '.$this->uang($data->jumlah);
        }
        $total['wajib'] = DB::table('saldo')->where('tipe', 'wajib')->sum('nilai');
        $total['wajib'] = $this->uang($total['wajib']);
        $total['reguler'] = DB::table('saldo')->where('tipe', 'reguler')->sum('nilai');
        return view('pembagian', [
            'sisa' => $req->sisa ? $this->uang($req->sisa) : false,
            'lebih' => $req->lebih ? $this->uang($req->lebih) : false,
            'habis' => $req->habis ?? false,
            'total' => $total,
            'datas' => $datas
        ]);
    }

    public function add_pembagian() {
        return view('add_pembagian');
    }

    public function add_pembagian_act(Request $req) {
        $data = [
            'nama' => $req->nama,
            'tipe' => $req->tipe, 
            'nilai' => $req->nilai,
            'jumlah' => 0,
            'ket' => $req->ket
        ];
        DB::table('saldo')->insert($data);
        return redirect('/pembagian');
    }

    public function edit_pembagian($id) {
        $data = DB::table('saldo')->where('id', $id)->first();
        return view('edit_pembagian', [
            'data' => $data
        ]);
    }

    public function edit_pembagian_act(Request $req) {
        $id = $req->id;
        $data = [
            'nama' => $req->nama,
            'tipe' => $req->tipe, 
            'nilai' => $req->nilai,
            'ket' => $req->ket
        ];
        DB::table('saldo')->where('id', $id)->update($data);
        return redirect('/pembagian');
    }

    public function hapus_pembagian(Request $req) {
        $id = $req->id;
        $mode = $req->mode;
        $jumlah = DB::table('saldo')->where('id', $id)->first()->jumlah;
        $nilai = DB::table('saldo')->where('id', $id)->first()->nilai;
        $jumlah_terbagi = DB::table('saldo')->where('id', '!=', $id)->count();
        $saldos = DB::table('saldo')->get();
        if ($mode == 'mode1') {
            # bagikan ke saldo wajib
            foreach($saldos as $saldo) {
                $saldoini = DB::table('saldo')
                    ->where('id', $saldo->id)
                    ->first();    
                $nilaiini = $saldoini->nilai;
                $jumlahini = $saldoini->jumlah;
                if ($jumlah > $nilaiini) {
                    DB::table('saldo')
                        ->where('id', $saldo->id)
                        ->where('tipe', 'wajib')
                        ->where('id', '!=', $id)
                        ->update([
                            'jumlah' => $jumlahini + $nilaiini
                        ]);
                    $jumlah -= $nilaiini;
                } else {
                    if ($jumlah == 0) {
                        DB::table('saldo')->where('id', $id)->delete();
                        return redirect('/pembagian?habis=true');
                    } else {
                        DB::table('saldo')->where('id', $id)->update([
                            'jumlah' => $jumlah
                        ]);
                        return redirect('/pembagian?sisa='.$jumlah);
                    }
                }
            }
            DB::table('saldo')->where('id', $id)->update([
                'jumlah' => $jumlah
            ]);
            return redirect('/pembagian?lebih='.$jumlah);
        } elseif ($mode == 'mode2') {
            # bagikan ke saldo reguler
            foreach($saldos as $saldo) {
                $saldoini = DB::table('saldo')
                    ->where('id', $saldo->id)
                    ->first();    
                $nilaiini = $saldoini->nilai;
                $jumlahini = $saldoini->jumlah;
                DB::table('saldo')
                    ->where('id', $saldo->id)
                    ->where('tipe', 'reguler')
                    ->where('id', '!=', $id)
                    ->update([
                        'jumlah' => $jumlahini + ($jumlah * ($nilaiini + ($nilai / $jumlah_terbagi)) / 100)
                    ]);
            }
            DB::table('saldo')->where('id', $id)->delete();
            return redirect('/pembagian?habis=true');
        }
    }

    public function mutasi() {
        $datas = DB::table('log')->orderBy('created_at', 'desc')->paginate(100);
        foreach($datas as $data) {
            $data->nilai = $this->uang($data->nilai);
            $data->sisa_total = $this->uang($data->sisa_total);
            $data->created_at = $this->forced_date($data->created_at);
        }
        return view('mutasi', [
            'datas' => $datas
        ]);
    }

    public function uang($int) {
        return number_format($int, 0, ',', '.');
    }

    public function forced_date($timestamp) {
        $timestamp = explode(' ', $timestamp);
        $tanggal = $timestamp[0];
        $jam = $timestamp[1];
        $tanggal = explode('-', $tanggal);
        $output = $tanggal[2].'/'.$tanggal[1].'/'.$tanggal[0].' at '.$jam;
        return $output;
    }
}
