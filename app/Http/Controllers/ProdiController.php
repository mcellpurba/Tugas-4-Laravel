<?php
namespace App\Http\Controllers;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class ProdiController extends Controller
{
    // default data dummy
    private $data = [
        1 => ['id'=>1, 'no_identitas_prodi'=>'110001', 'nama_fakultas'=>'Ilmu Budaya', 'prodi'=>'Antropologi Budaya'],
        2 => ['id'=>2, 'no_identitas_prodi'=>'110002', 'nama_fakultas'=>'Kedokteran', 'prodi'=>'Fisioterapi']
    ];

    public function index()
    {
        // ambil data dari session kalau ada
        $prodi = session('prodi_data', $this->data);
        return view('prodi.index', compact('prodi'));
    }

    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_identitas_prodi' => 'required|min:4',
            'nama_fakultas' => 'required',
            'prodi' => 'required'
        ]);

        // ambil data lama
        $data = session('prodi_data', $this->data);

        // id baru = id terakhir + 1
        $id = count($data) + 1;
        $data[$id] = [
            'id' => $id,
            'no_identitas_prodi'=> $request->no_identitas_prodi,
            'nama_fakultas' => $request->nama_fakultas,
            'prodi' => $request->prodi
        ];

        // simpan ke session
        session(['prodi_data' => $data]);

        return redirect('/prodi')->with('success', 'Program Studi berhasil ditambahkan (session).');
    }

    public function edit($id)
    {
        $data = session('prodi_data', $this->data);
        $p = $data[$id] ?? null;
        if (!$p) return redirect('/prodi')->with('error','Program Studi tidak ditemukan');
        return view('prodi.edit', compact('p'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_identitas_prodi' => 'required|min:4',
            'nama_fakultas' => 'required',
            'prodi' => 'required'
        ]);

        // ambil data dari session
        $data = session('prodi_data', $this->data);

        if (isset($data[$id])) {
            $data[$id]['no_identitas_prodi'] = $request->no_identitas_prodi;
            $data[$id]['nama_fakultas'] = $request->nama_fakultas;
            $data[$id]['prodi'] = $request->prodi;
        
            // simpan lagi ke session
            session(['prodi_data' => $data]);
        }

        return redirect('/prodi')->with('success', 'Data program studi berhasil diperbarui (session).');
    }

    public function destroy($id)
{
    // ambil data mahasiswa dari session
    $data = session('prodi_data', $this->data);

    // cek apakah id ditemukan
    if (isset($data[$id])) {
        unset($data[$id]); // hapus data berdasarkan id
        session(['prodi_data' => $data]); // simpan kembali ke session

        return redirect('/prodi')->with('success', 'Data program studi berhasil dihapus (session).');
    }

    return redirect('/prodi')->with('error', 'Data program studi tidak ditemukan.');
}

}