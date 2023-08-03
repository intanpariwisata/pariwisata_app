@extends('layouts.app')

@push('addon-style')
<style>
    .container{
        align-items: center
    }
</style>
@endpush

@section('content')
<main>
    <div class="container mt-5">
        <div class="row">
        <div class="col-md-6 mx-auto">
        <h2 class="text-center mb-4">Edit Profile</h2>
        <form method="POST" action="{{ route('Pengunjung.profile.update') }}">
        @csrf
        @method('PUT')
        <div class="form-group">
        <label for="nama">Nama:</label>
        <input value="{{$user->profile->nama ?? null}}" type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir:</label>
        <input value="{{$user->profile->tempat_lahir ?? null}}" type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
        </div>
        <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input value="{{$user->profile->tanggal_lahir ?? null}}" type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>
        <div class="form-group">
        <label for="alamat">Alamat:</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat" required>{{$user->profile->alamat ?? null}}</textarea>
        </div>
        <div class="form-group">
        <label for="no_tlp">Nomor Telepon:</label>
        <input value="{{$user->profile->no_tlp ?? null}}" type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukkan Nomor Telepon" required>
        </div>
        <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select value="{{$user->profile->jenis_kelamin ?? null}}" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
        <option value="Laki-Laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
</div>
</main>
@endsection
