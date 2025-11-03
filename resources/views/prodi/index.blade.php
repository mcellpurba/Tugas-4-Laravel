<!-- resources/views/mahasiswa/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Data Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    

<div class="container mt-4">
    <h2 class="mb-3">Daftar Prodi</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ url('/prodi/create') }}" class="btn btn-primary mb-3">+ Tambah Prodi</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Prodi</th>
                <th>Nama Fakultas</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prodi as $p)
                <tr>
                    <td>{{ $p['no_identitas_prodi'] }}</td>
                    <td>{{ $p['nama_fakultas'] }}</td>
                    <td>{{ $p['prodi'] }}</td>
                    <td>
                        <a href="{{ url('/prodi/'.$p['id'].'/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ url('/prodi/'.$p['id']) }}" method="POST" style="display:inline;">
                             @csrf
                             @method('DELETE')
                             <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data prodi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
