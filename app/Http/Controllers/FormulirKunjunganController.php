<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulirKunjungan;
use App\Models\User;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
// use App\Http\Controllers\FormulirKunjungan;


use Illuminate\Support\Facades\Auth;


class FormulirKunjunganController extends Controller
{
    

    public function index(Request $request)
{
    // Dapatkan ID pengguna yang sedang login
    $userId = Auth::id();

    // Pastikan ID pengguna yang login ada
    if (!$userId) {
        return abort(401); // Unauthorized jika pengguna tidak ada
    }

    // Ambil data tabungan berdasarkan ID pengguna yang sedang login
    $kunjungan = FormulirKunjungan::where('id_user', $userId)
        ->orderBy('created_at', 'asc') // Misalnya diurutkan berdasarkan tanggal pembuatan terbaru
        ->simplePaginate(5); // Paginasi data

    // Tampilkan data tabungan ke view
    return view('login.formulirkunjungan', compact('kunjungan'));
}

    

    public function create()
    {
        return view('login.formulirkunjungan');
    }

    public function store(Request $request)
    {
       
            $request->validate([
                'nama' => 'required|max:50|regex:/^[a-zA-Z\s\'\-]+$/',
                'asal' => 'required|max:20|regex:/^[a-zA-Z\s]+$/',
                'nama_instansi' => 'required|max:50|regex:/^[a-zA-Z\s]+$/',
                'nomor_telepon' => 'required|numeric',
                'tanggal' => 'required|date',
                'tujuan_kunjungan' => 'required|max:50|regex:/^[a-zA-Z\s\'\-]+$/',
                'jumlah_orang' => 'required|integer',

        ]);
        $user = auth()->user()->id_user;
        $kunjungan = new FormulirKunjungan();
        $kunjungan->nama_kunjungan = $request->input('nama');
        $kunjungan->alamat_kunjungan = $request->input('asal');
        $kunjungan->namainstansi_kunjungan = $request->input('nama_instansi');
        $kunjungan->nohp_kunjungan = $request->input('nomor_telepon');
        $kunjungan->tgl_kunjungan = $request->input('tanggal');
        $kunjungan->tujuan_kunjungan = $request->input('tujuan_kunjungan');
        $kunjungan->jumlah_kunjungan = $request->input('jumlah_orang');
        $kunjungan->id_user = auth()->user()->id_user;
        $kunjungan->save();
        // Redirect pengguna setelah pengguna berhasil ditambahkan
        return redirect()->route('detailpengajuan')->with('success', 'Pengajuan Berhasil Dilakukan');
        }
        public function edit($id)
{
    $kunjungan = FormulirKunjungan::findOrFail($id);
    return view('login.editformulir', compact('kunjungan'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'asal' => 'required',
        'nama_instansi' => 'required',
        'nomor_telepon' => 'required',
        'tanggal' => 'required',
        'tujuan_kunjungan' => 'required',
        'jumlah_orang' => 'required',
    ]);

    $kunjungan = FormulirKunjungan::findOrFail($id);
    $kunjungan->nama_kunjungan = $request->nama;
    $kunjungan->alamat_kunjungan = $request->asal;
    $kunjungan->namainstansi_kunjungan = $request->nama_instansi;
    $kunjungan->nohp_kunjungan = $request->nomor_telepon;
    $kunjungan->tgl_kunjungan = $request->tanggal;
    $kunjungan->tujuan_kunjungan = $request->tujuan_kunjungan;
    $kunjungan->jumlah_kunjungan = $request->jumlah_orang;
    $kunjungan->save();

    // Redirect pengguna setelah formulir kunjungan berhasil diperbarui
    return redirect()->route('detailpengajuan')->with('success', 'Data Berhasil Diedit');
}



    public function destroy(int $id)
    {
        $kunjungan = FormulirKunjungan::findOrFail($id);
        $kunjungan->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}