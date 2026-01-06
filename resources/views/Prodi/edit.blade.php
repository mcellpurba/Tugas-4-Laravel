<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Prodi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('prodi.update', $prodi->id_prodi) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama_prodi" class="block text-sm font-medium text-gray-700">Nama Prodi</label>
                            <input type="text" name="nama_prodi" id="nama_prodi"
                                value="{{ old('nama_prodi', $prodi->nama_prodi) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nama_prodi') border-red-500 @enderror"
                                required>
                            @error('nama_prodi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nama_fakultas" class="block text-sm font-medium text-gray-700">Fakultas</label>
                            <select name="nama_fakultas" id="nama_fakultas"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('nama_fakultas') border-red-500 @enderror"
                                required>
                                <option value="">Pilih Fakultas</option>
                                @foreach($fakultas as $fak)
                                    <option value="{{ $fak->id_fakultas }}" {{ old('nama_fakultas', $prodi->nama_fakultas) == $fak->id_fakultas ? 'selected' : '' }}>
                                        {{ $fak->nama_fakultas }}
                                    </option>
                                @endforeach
                            </select>
                            @error('nama_fakultas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('deskripsi') border-red-500 @enderror"
                                required>{{ old('deskripsi', $prodi->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('prodi.index') }}"
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>