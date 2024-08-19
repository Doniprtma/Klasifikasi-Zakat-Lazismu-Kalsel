<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jurnal;
use App\Models\KategoriDana;
use App\Models\DanaZakat;
use App\Models\Cabang;
use App\Models\PengaturanDana;
use DB;
use Auth;
use Carbon\Carbon;

class JurnalController extends Controller
{
    //

    public function index(Request $request)
    {
        $query = Jurnal::query();
    
        if ($request->has('cabang') && $request->cabang != '') {
            $query->where('cabang_id', $request->cabang);
        }
    
        $datas = $query->get();
        $cabangs = Cabang::all(); 
    
        return view('jurnal.index', compact(['datas', 'cabangs']));
    }

    public function create()
    {

        $kategorisZakat = KategoriDana::where('jenis_dana', '!=', 'Pengeluaran')->get();
        //$kategorisPengeluaran = KategoriDana::where('jenis_dana', '=', 'Pengeluaran')->get();
        $cabangs = Cabang::get();
        return view('jurnal.create', compact('cabangs', 'kategorisZakat'));
    }
    public function store(Request $request)
    {
        $pengaturandana = PengaturanDana::first();
        if (!$pengaturandana) {
            return redirect()->route('jurnal.index')->with(['message' => 'Pengaturan Dana belum ada!']);
        }


        $data_jurnal = Jurnal::create([
            'kategoridana_id' => $request->kategoridana_id,
            'jenis' => $request->jenis,
            'tgl_transaksi' => $request->tgl_transaksi,
            'no_ref' => $request->no_ref,
            'nomor_akun' => $request->nomor_akun,
            'nama_akun' => $request->nama_akun,
            'keterangan' => $request->keterangan,
            'anggaran' => $request->anggaran,
            'bank' => $request->bank,
            'cabang_id' => $request->cabang_id,
            'program' => $request->program
        ]);
        if ($request->jenis == 'Kredit') {
            $jumlah = str_replace(".", "", $request->anggaran);
            $id = $data_jurnal->id;
            $ket_dana = null;

            $kategoridana = KategoriDana::where('id', $request->kategoridana_id)->first();

            if (($kategoridana->jenis_dana != 'Bagi Dana Zakat Otomatis') && ($kategoridana->jenis_dana != 'Pengeluaran')) {
                $jenis_dana = $kategoridana->jenis_dana;

                $dana = DanaZakat::where('jenis_dana', $jenis_dana)->where('jurnal_id', $id)->first();
                if (!$dana) {
                    DanaZakat::create(['jurnal_id' => $id, 'jenis_dana' => $jenis_dana, 'jumlah_dana' => $jumlah, 'jumlah_dana_awal' => $jumlah]);
                }

                $ket_dana = "<ul>
                <li>Dana " . $request->anggaran . " (100%) dialokasikan ke dana : " . $jenis_dana . ".</li>
            </ul>";

                Jurnal::where('id', $id)->update(['ket_dana' => $ket_dana]);
            } else {
                $fakir = $pengaturandana->fakir;
                $miskin = $pengaturandana->miskin;
                $amil = $pengaturandana->amil;
                $mualaf = $pengaturandana->mualaf;
                $riqab = $pengaturandana->riqab;
                $gharim = $pengaturandana->gharim;
                $fisabillah = $pengaturandana->fisabillah;
                $ibnu_sabil = $pengaturandana->ibnu_sabil;

                $nilai_fakir = (($fakir / 100) * $jumlah);
                $nilai_miskin = (($miskin / 100) * $jumlah);
                $nilai_amil = (($amil / 100) * $jumlah);
                $nilai_mualaf = (($mualaf / 100) * $jumlah);
                $nilai_riqab = (($riqab / 100) * $jumlah);
                $nilai_gharim = (($gharim / 100) * $jumlah);
                $nilai_fisabillah = (($fisabillah / 100) * $jumlah);
                $nilai_ibnu_sabil = (($ibnu_sabil / 100) * $jumlah);

                $ket_dana = "<ul><li>Dana " . format_rupiah($nilai_fakir) . " (" . $fakir . "%) dialokasikan ke Dana Fakir</li>
                <li>Dana " . format_rupiah($nilai_miskin) . " (" . $miskin . "%) dialokasikan ke Dana Miskin</li>
                <li>Dana " . format_rupiah($nilai_amil) . " (" . $amil . "%) dialokasikan ke Dana Amil</li>
                <li>Dana " . format_rupiah($nilai_mualaf) . " (" . $mualaf . "%) dialokasikan ke Dana Mualaf</li>
                <li>Dana " . format_rupiah($nilai_riqab) . " (" . $riqab . "%) dialokasikan ke Dana Riqab</li>
                <li>Dana " . format_rupiah($nilai_gharim) . " (" . $gharim . "%) dialokasikan ke Dana Gharim</li>
                <li>Dana " . format_rupiah($nilai_fisabillah) . " (" . $fisabillah . "%) dialokasikan ke Dana Fisabillah</li>
                <li>Dana " . format_rupiah($nilai_ibnu_sabil) . " (" . $ibnu_sabil . "%) dialokasikan ke Dana Ibnu Sabil</li></ul>";

                Jurnal::where('id', $id)->update(['ket_dana' => $ket_dana]);

                $danafakir = DanaZakat::where('jenis_dana', 'Fakir')->where('jurnal_id', $id)->first();
                if (!$danafakir) {
                    DanaZakat::create(['jurnal_id' => $id, 'jenis_dana' => 'Fakir', 'jumlah_dana' => $nilai_fakir,  'jumlah_dana_awal' => $nilai_fakir]);
                }

                $danamiskin = DanaZakat::where('jenis_dana', 'Miskin')->where('jurnal_id', $id)->first();
                if (!$danamiskin) {
                    DanaZakat::create(['jurnal_id' => $id, 'jenis_dana' => 'Miskin', 'jumlah_dana' => $nilai_miskin,   'jumlah_dana_awal' => $nilai_miskin]);
                }

                $danaamil = DanaZakat::where('jenis_dana', 'Amil')->where('jurnal_id', $id)->first();
                if (!$danaamil) {
                    DanaZakat::create(['jurnal_id' => $id, 'jenis_dana' => 'Amil', 'jumlah_dana' => $nilai_amil,   'jumlah_dana_awal' => $nilai_amil]);
                }

                $danamualaf = DanaZakat::where('jenis_dana', 'Mualaf')->where('jurnal_id', $id)->first();
                if (!$danamualaf) {
                    DanaZakat::create(['jurnal_id' => $id, 'jenis_dana' => 'Mualaf', 'jumlah_dana' => $nilai_mualaf,   'jumlah_dana_awal' => $nilai_mualaf]);
                }

                $danariqab = DanaZakat::where('jenis_dana', 'Riqab')->where('jurnal_id', $id)->first();
                if (!$danariqab) {
                    DanaZakat::create(['jurnal_id' => $id, 'jenis_dana' => 'Riqab', 'jumlah_dana' => $nilai_riqab,   'jumlah_dana_awal' => $nilai_riqab]);
                }

                $danagharim = DanaZakat::where('jenis_dana', 'Gharim')->where('jurnal_id', $id)->first();
                if (!$danagharim) {
                    DanaZakat::create(['jurnal_id' => $id, 'jenis_dana' => 'Gharim', 'jumlah_dana' => $nilai_gharim,   'jumlah_dana_awal' => $nilai_gharim]);
                }

                $danafisabillah = DanaZakat::where('jenis_dana', 'Fisabillah')->where('jurnal_id', $id)->first();
                if (!$danafisabillah) {
                    DanaZakat::create(['jurnal_id' => $id, 'jenis_dana' => 'Fisabillah', 'jumlah_dana' => $nilai_fisabillah,   'jumlah_dana_awal' => $nilai_fisabillah]);
                }

                $danaibnu_sabil = DanaZakat::where('jenis_dana', 'Ibnu Sabil')->where('jurnal_id', $id)->first();
                if (!$danaibnu_sabil) {
                    DanaZakat::create(['jurnal_id' => $id, 'jenis_dana' => 'Ibnu Sabil', 'jumlah_dana' => $nilai_ibnu_sabil,   'jumlah_dana_awal' => $nilai_ibnu_sabil]);
                }
            }
        }






        return redirect()->route('jurnal.index')->with(['message' => 'Data Berhasil disimpan']);
    }
    public function edit($id)
    {

        $data = Jurnal::where('id', $id)->first();
        $kategorisZakat = KategoriDana::where('jenis_dana', '!=', 'Pengeluaran')->get();
        $cabangs = Cabang::get();

        return view('jurnal.edit', compact(['data', 'kategorisZakat', 'cabangs']));
    }
    public function update(Request $request, $id)
    {
        $dana = Jurnal::where('id', $id)->first();

        Jurnal::where('id', $id)->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'no_ref' => $request->no_ref,
            'nomor_akun' => $request->nomor_akun,
            'nama_akun' => $request->nama_akun,
            'keterangan' => $request->keterangan,
            'bank' => $request->bank,
            'cabang_id' => $request->cabang_id,
            'program' => $request->program
        ]);



        return redirect()->route('jurnal.index')->with(['message' => 'Data Berhasil diubah']);
    }
    public function destroy($id)
    {


        $dana = DanaZakat::where('jurnal_id', $id)->first();
        if ($dana) {
            $dana->delete();
        }
        Jurnal::where('id', $id)->delete();

        return redirect()->route('jurnal.index')->with(['message' => 'Data Berhasil dihapus']);
    }
}
