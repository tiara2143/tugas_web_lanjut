
<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // Fungsi untuk menampilkan semua data pegawai
    public function index()
    {
        // Mengambil semua data dari model PegawaiModel
        $data = PegawaiModel::all();
        // Mengirimkan data ke view 'Pegawai.Index' dengan variabel 'data'
        return view('Pegawai.Index')->with('data', $data);
    }








    // Fungsi untuk membuat atau menyimpan data pegawai baru
    public function createData(Request $request)
    {
        // Membuat instance baru dari model PegawaiModel
        $data = new PegawaiModel();
        // Mengambil nilai dari input form dan mengisi kolom pada model
        $data->nama = $request->input('nama');
        $data->nip = $request->input('nip');
        $data->alamat = $request->input('alamat');
        // Menyimpan data ke dalam database
        $data->save();
        // Setelah menyimpan, redirect ke route yang menampilkan semua data pegawai
        return redirect()->route('getalldataPegawai');
    }

    // Fungsi untuk mendapatkan data pegawai berdasarkan ID untuk keperluan edit
    public function getDataById($id)
    {
        // Mengambil satu data pegawai berdasarkan ID
        $data = PegawaiModel::where('id', $id)->first();
        // Mengirimkan data ke view 'Pegawai.edit' untuk ditampilkan di form edit
        return view('Pegawai.edit')->with('data', $data);
    }

    // Fungsi untuk mengupdate data pegawai berdasarkan ID
    public function updateData(Request $request, $id)
    {
        // Mengambil data pegawai berdasarkan ID
        $data = PegawaiModel::where('id', $id)->first();
        // Mengambil inputan baru dari form dan mengupdate data pada model
        $data->nama = $request->input('nama');
        $data->nip = $request->input('nip');
        $data->alamat = $request->input('alamat');
        // Menyimpan perubahan data ke dalam database
        $data->save();
        // Setelah data berhasil diupdate, redirect ke halaman yang menampilkan semua data pegawai
        return redirect()->route('getalldataPegawai');
    }

    // Fungsi untuk menghapus data pegawai berdasarkan ID
    public function deleteData($id)
    {
        // Mengambil data pegawai berdasarkan ID
        $data = PegawaiModel::where('id', $id)->first();
        // Menghapus data pegawai dari database
        $data->delete();
        // Setelah penghapusan, redirect ke halaman yang menampilkan semua data pegawai
        return redirect()->route('getalldataPegawai');
    }
}
