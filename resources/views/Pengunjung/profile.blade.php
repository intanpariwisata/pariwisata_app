@extends('layouts.app')

@section('content')
<main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="profile-card p-4">
                    <img src="{{ asset('images/account.png') }}" alt="Profil Picture" class="profile-picture">
                    <h2 class="profile-name text-center">{{ $user->username }}</h2>
                    <p class="profile-email text-center">{{ $user->email }}</p>
                    <div class="profile-info">
                        <p><strong>Alamat:</strong> {{ $user->profile->alamat ?? '' }}</p>
                        <p><strong>Tempat Lahir:</strong> {{ $user->profile->tempat_lahir ?? ''}}</p>
                        <p><strong>Tanggal Lahir:</strong> {{ $user->profile->tanggal_lahir ?? ''}}</p>
                        <p><strong>No Telp:</strong> {{ $user->profile->no_tlp ?? ''}}</p>
                        <p><strong>Jenis Kelamin:</strong> {{ $user->profile->jenis_kelamin ?? ''}}</p>
                    </div>
                    <div class="text-center">
                        <a href='{{route('Pengunjung.profile.edit')}}' class="btn btn-primary">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('addon-style')
<style>
    body {
        background-color: #f8f9fa;
    }

    .profile-card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .profile-picture {
        margin-left: auto;
        margin-right: auto;
        width: 50%;
        max-width: 200px;
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        0 auto;
        display: block;
        -70px;
    }

    .profile-name {
        font-size: 28px;
        font-weight: bold;
        20px;
    }

    .profile-email {
        color: #666;
        20px;
    }

    .profile-info {
        padding: 20px;
    }

    .profile-info p {
        10px;
    }
</style>
@endpush
