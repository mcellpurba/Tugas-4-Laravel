<!-- resources/views/mahasiswa/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="mb-3">Tambah Mahasiswa</h2>

    <form action="{{ url('/mahasiswa') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" name="nim" id="nim" class="form-control" value="{{ old('nim') }}">
            @error('nim') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
            @error('nama') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="prodi" class="form-label">Program Studi</label>
            <input type="text" name="prodi" id="prodi" class="form-control" value="{{ old('prodi') }}">
            @error('prodi') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ url('/mahasiswa') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
