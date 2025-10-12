<?php
namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class MahasiswaController extends Controller
{
    // default data dummy
    private $data = [
        1 => ['id'=>1, 'nim'=>'2305505001', 'nama'=>'Putu Agus', 'prodi'=>'Teknologi Informasi'],
        2 => ['id'=>2, 'nim'=>'2305405001', 'nama'=>'Made Cenik', 'prodi'=>'Teknik Elektro']
    ];

    public function index()
    {
        // ambil data dari session kalau ada
        $mahasiswa = session('mahasiswa_data', $this->data);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        // ambil data lama
        $data = session('mahasiswa_data', $this->data);

        // id baru = id terakhir + 1
        $id = count($data) + 1;
        $data[$id] = [
            'id' => $id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi
        ];

        // simpan ke session
        session(['mahasiswa_data' => $data]);

        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil ditambahkan (session).');
    }

    public function edit($id)
    {
        $data = session('mahasiswa_data', $this->data);
        $m = $data[$id] ?? null;
        if (!$m) return redirect('/mahasiswa')->with('error','Mahasiswa tidak ditemukan');
        return view('mahasiswa.edit', compact('m'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        // ambil data dari session
        $data = session('mahasiswa_data', $this->data);

        if (isset($data[$id])) {
            $data[$id]['nim'] = $request->nim;
            $data[$id]['nama'] = $request->nama;
            $data[$id]['prodi'] = $request->prodi;

            // simpan lagi ke session
            session(['mahasiswa_data' => $data]);
        }

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui (session).');
    }

    public function destroy($id)
{
    // ambil data mahasiswa dari session
    $data = session('mahasiswa_data', $this->data);

    // cek apakah id ditemukan
    if (isset($data[$id])) {
        unset($data[$id]); // hapus data berdasarkan id
        session(['mahasiswa_data' => $data]); // simpan kembali ke session

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus (session).');
    }

    return redirect('/mahasiswa')->with('error', 'Data mahasiswa tidak ditemukan.');
}

}