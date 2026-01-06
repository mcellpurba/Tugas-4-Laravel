<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('mahasiswa.update', $mahasiswa->id_mahasiswa) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nim" class="block text-sm font-medium text-gray-700">NIM</label>
                            <input type="text" name="nim" id="nim" value="{{ old('nim', $mahasiswa->nim) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nim') border-red-500 @enderror"
                                required>
                            @error('nim')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nama_mahasiswa" class="block text-sm font-medium text-gray-700">Nama
                                Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa"
                                value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nama_mahasiswa') border-red-500 @enderror"
                                required>
                            @error('nama_mahasiswa')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="prodi" class="block text-sm font-medium text-gray-700">Prodi</label>
                            <select name="prodi" id="prodi"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('prodi') border-red-500 @enderror"
                                required>
                                <option value="">Pilih Prodi</option>
                                @foreach($prodi as $p)
                                    <option value="{{ $p->id_prodi }}" data-fakultas="{{ $p->nama_fakultas }}" {{ old('prodi', $mahasiswa->prodi) == $p->id_prodi ? 'selected' : '' }}>
                                        {{ $p->nama_prodi }} - {{ $p->Fakultas->nama_fakultas ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                            @error('prodi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="fakultas" class="block text-sm font-medium text-gray-700">Fakultas</label>
                            <input type="text" id="fakultas_display" value=""
                                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm sm:text-sm"
                                readonly>
                            <input type="hidden" name="fakultas" id="fakultas"
                                value="{{ old('fakultas', $mahasiswa->fakultas) }}">
                            @error('fakultas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $mahasiswa->email) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                                required>
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                            <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $mahasiswa->no_hp) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('no_hp') border-red-500 @enderror"
                                required>
                            @error('no_hp')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('mahasiswa.index') }}"
                                style="background-color: #6B7280; color: white; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; text-decoration: none; display: inline-block; margin-right: 0.5rem;"
                                onmouseover="this.style.backgroundColor='#4B5563'"
                                onmouseout="this.style.backgroundColor='#6B7280'">
                                Batal
                            </a>
                            <button type="submit"
                                style="background-color: #3B82F6; color: white; font-weight: bold; padding: 0.5rem 1rem; border-radius: 0.25rem; border: none; cursor: pointer;"
                                onmouseover="this.style.backgroundColor='#2563EB'"
                                onmouseout="this.style.backgroundColor='#3B82F6'">
                                Update
                            </button>
                        </div>
                    </form>

                    <script>
                        document.getElementById('prodi').addEventListener('change', function () {
                            const selectedOption = this.options[this.selectedIndex];
                            const fakultasId = selectedOption.getAttribute('data-fakultas');
                            const fakultasName = selectedOption.text.split(' - ')[1] || '';

                            document.getElementById('fakultas').value = fakultasId || '';
                            document.getElementById('fakultas_display').value = fakultasName;
                        });

                        // Trigger on page load to set initial values
                        document.addEventListener('DOMContentLoaded', function () {
                            document.getElementById('prodi').dispatchEvent(new Event('change'));
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>