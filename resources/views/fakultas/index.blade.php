<!-- resources/views/mahasiswa/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Data Fakultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    

<div class="container mt-4">
    <h2 class="mb-3">Daftar Fakultas</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ url('/fakultas/create') }}" class="btn btn-primary mb-3">+ Tambah Fakultas</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID Fakultas</th>
                <th>Nama Fakultas</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($fakultas as $f)
                <tr>
                    <td>{{ $f['no_identitas_fakultas'] }}</td>
                    <td>{{ $f['nama_fakultas'] }}</td>
                    <td>{{ $f['alamat'] }}</td>
                    <td>{{ $f['email'] }}</td>
                    <td>{{ $f['no_telepon'] }}</td>
                    <td>
                        <a href="{{ url('/fakultas/'.$f['id'].'/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ url('/fakultas/'.$f['id']) }}" method="POST" style="display:inline;">
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
                    <td colspan="5" class="text-center">Tidak ada data fakultas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
