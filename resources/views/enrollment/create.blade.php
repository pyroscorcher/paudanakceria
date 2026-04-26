<form action="{{ route('enrollment.store') }}" method="POST">
    @csrf <div>
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        @error('nama') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        @error('password') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="" disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih...</option>
            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="nisn">NISN</label>
        <input type="text" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
        @error('nisn') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
        @error('tempat_lahir') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
        @error('tanggal_lahir') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="nama_orangtua">Nama Orang Tua</label>
        <input type="text" id="nama_orangtua" name="nama_orangtua" value="{{ old('nama_orangtua') }}" required>
        @error('nama_orangtua') <span>{{ $message }}</span> @enderror
    </div>

    <button type="submit">Daftar Sekarang</button>
</form>