<!-- resources/views/mahasiswa/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Fakultas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h2 class="mb-3">Edit Fakultas</h2>

    <form action="{{ url('/fakultas/'.$f['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="no_identitas_fakultas" class="form-label">ID Fakultas</label>
            <input type="text" name="no_identitas_fakultas" id="no_identitas_fakultas" class="form-control" value="{{ old('no_identitas_fakultas', $f['no_identitas_fakultas']) }}">
            @error('no_identitas_fakultas') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
            <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control" value="{{ old('nama_fakultas', $f['nama_fakultas']) }}">
            @error('nama_fakultas') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $f['alamat']) }}">
            @error('alamat') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $f['email']) }}">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ old('no_telepon', $f['no_telepon']) }}">
            @error('no_telepon') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-warning">Perbarui</button>
        <a href="{{ url('/fakultas') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
