<!-- resources/views/mahasiswa/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    

<div class="container mt-4">
    <h2 class="mb-3">Daftar Mahasiswa</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ url('/mahasiswa/create') }}" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswa as $m)
                <tr>
                    <td>{{ $m['id'] }}</td>
                    <td>{{ $m['nim'] }}</td>
                    <td>{{ $m['nama'] }}</td>
                    <td>{{ $m['prodi'] }}</td>
                    <td>
                        <a href="{{ url('/mahasiswa/'.$m['id'].'/edit') }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ url('/mahasiswa/'.$m['id']) }}" method="POST" style="display:inline;">
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
                    <td colspan="5" class="text-center">Tidak ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
