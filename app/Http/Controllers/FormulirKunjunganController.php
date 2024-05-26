<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulirKunjungan;
use App\Models\User;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


use Illuminate\Support\Facades\Auth;


class FormulirKunjunganController extends Controller
{
    

    public function index(Request $request)
{
    // ID pengguna yang sedang login
    $userId = Auth::id();

    if (!$userId) {
        return abort(401); 
    }

    // Ambil data tabungan berdasarkan ID pengguna yang sedang login
    $kunjungan = FormulirKunjungan::where('id_user', $userId)
        ->orderBy('created_at', 'asc') 
        ->simplePaginate(5); 

    
    return view('login.formulirkunjungan', compact('kunjungan'));
}

    
public function create()
{
    // Mendapatkan data tanggal yang sudah dibooking
    $bookedDates = FormulirKunjungan::getBookedDates();
    return view('login.formulirkunjungan', ['bookedDates' => $bookedDates]);
}

    

    public function store(Request $request)
    {
       
            $request->validate([
                'nama' => 'required|max:50|regex:/^[a-zA-Z\s\'\-]+$/',
                'asal' => 'required|max:20|regex:/^[a-zA-Z\s]+$/',
                'nama_instansi' => 'required|max:50|regex:/^[a-zA-Z\s]+$/',
                'nomor_telepon' => 'required|numeric',
                // 'tanggal' => 'required|date',
                'tanggal' => [
                    'required',
                    'date',
                    // Validasi untuk memastikan tanggal yang dipilih tidak memiliki status "diterima" oleh pengguna lain
                    function ($attribute, $value, $fail) {
                        $exists = FormulirKunjungan::where('tgl_kunjungan', $value)
                                                    ->where('status_kunjungan', 'diterima')
                                                    // ->where('id_user', '!=', auth()->id())
                                                    ->exists();
                        if ($exists) {
                            $fail('Tanggal kunjungan yang dipilih sudah memiliki status "diterima".');
                        }
                    },
                ],
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

    return redirect()->route('detailpengajuan')->with('success', 'Data Berhasil Diedit');
}

public function alasan($id){
        $kunjungan = FormulirKunjungan::findOrFail($id);
        return view('login.alasanformulir', compact('kunjungan'));
}

    public function destroy(int $id)
    {
        $kunjungan = FormulirKunjungan::findOrFail($id);
        $kunjungan->delete();

        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
    
}