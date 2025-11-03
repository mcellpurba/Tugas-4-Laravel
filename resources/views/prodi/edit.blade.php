<!-- resources/views/mahasiswa/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="mb-3">Edit Prodi</h2>

    <form action="{{ url('/prodi/'.$p['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="no_identitas_prodi" class="form-label">ID Prodi</label>
            <input type="text" name="no_identitas_prodi" id="no_identitas_prodi" class="form-control" value="{{ old('no_identitas_prodi', $p['no_identitas_prodi']) }}">
            @error('no_identitas_prodi') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
            <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" value="{{ old('nama_fakultas', $p['nama_fakultas']) }}">
            @error('nama_fakultas') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Program Studi</label>
            <input type="text" name="prodi" id="prodi" class="form-control" value="{{ old('prodi', $p['prodi']) }}">
            @error('prodi') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-warning">Perbarui</button>
        <a href="{{ url('/prodi') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
