<?php
namespace App\Http\Controllers;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class FakultasController extends Controller
{
    // default data dummy
    private $data = [
        1 => ['id'=>1, 'no_identitas_fakultas'=>'110001', 'nama_fakultas'=>'Ilmu Budaya', 'alamat'=>'Jl. Nias No. 13 Sanglah Denpasar', 'email'=>'fib@unud.ac.id', 'no_telepon'=>'0361224121'],
        2 => ['id'=>2, 'no_identitas_fakultas'=>'110002', 'nama_fakultas'=>'Kedokteran', 'alamat'=>'Jl. PB Sudirman, Kampus Sudirman Denpasar', 'email'=>'infofk@unud.ac.id', 'no_telepon'=>'0361222510']
    ];

    public function index()
    {
        // ambil data dari session kalau ada
        $fakultas = session('fakultas_data', $this->data);
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_identitas_fakultas' => 'required|min:4',
            'nama_fakultas' => 'required',
            'alamat' => 'required',
            'email'=>'required',
            'no_telepon'=>'required'
        ]);

        // ambil data lama
        $data = session('fakultas_data', $this->data);

        // id baru = id terakhir + 1
        $id = count($data) + 1;
        $data[$id] = [
            'id' => $id,
            'no_identitas_fakultas'=> $request->no_identitas_fakultas,
            'nama_fakultas' => $request->nama_fakultas,
            'alamat' => $request->alamat,
            'email'=> $request->email,
            'no_telepon'=> $request->no_telepon
        ];

        // simpan ke session
        session(['fakultas_data' => $data]);

        return redirect('/fakultas')->with('success', 'Fakultas berhasil ditambahkan (session).');
    }

    public function edit($id)
    {
        $data = session('fakultas_data', $this->data);
        $f = $data[$id] ?? null;
        if (!$f) return redirect('/fakultas')->with('error','Fakultas tidak ditemukan');
        return view('fakultas.edit', compact('f'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'no_identitas_fakultas' => 'required|min:4',
            'nama_fakultas' => 'required',
            'alamat' => 'required',
            'email'=>'required',
            'no_telepon'=>'required'
        ]);

        // ambil data dari session
        $data = session('fakultas_data', $this->data);

        if (isset($data[$id])) {
            $data[$id]['no_identitas_fakultas'] = $request->no_identitas_fakultas;
            $data[$id]['nama_fakultas'] = $request->nama_fakultas;
            $data[$id]['alamat'] = $request->alamat;
            $data[$id]['email'] = $request->email;
            $data[$id]['no_telepon'] = $request->no_telepon;

            // simpan lagi ke session
            session(['fakultas_data' => $data]);
        }

        return redirect('/fakultas')->with('success', 'Data fakultas berhasil diperbarui (session).');
    }

    public function destroy($id)
{
    // ambil data mahasiswa dari session
    $data = session('fakultas_data', $this->data);

    // cek apakah id ditemukan
    if (isset($data[$id])) {
        unset($data[$id]); // hapus data berdasarkan id
        session(['fakultas_data' => $data]); // simpan kembali ke session

        return redirect('/fakultas')->with('success', 'Data fakultas berhasil dihapus (session).');
    }

    return redirect('/fakultas')->with('error', 'Data fakultas tidak ditemukan.');
}

}