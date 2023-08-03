@extends('StaffOperator.layouts.master')
@section('title','Akun')
@section('judul','Akun')

@push('style')
<style>
    .profile-page .user-header {
        background-size: cover;
    }

    .profile-page .user-header .info {
        position: absolute;
        bottom: -50px;
        left: 0;
        right: 0;
        text-align: center;
    }

    .profile-page .user-header .info h3 {
        color: #fff;
        10px;
        font-size: 28px;
    }

    .profile-page .user-header .info p {
        color: #fff;
        font-size: 16px;
    }

    .profile-page .user-header .info .btn {
        20px;
        border-radius: 30px;
        padding: 10px 30px;
        font-size: 16px;
    }

    .profile-page .user-header .info .btn i {
        10px;
    }
</style>
@endpush

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Bagian Profil -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                       <div class="text-center">
                           <img class="profile-user-img img-fluid img-circle" src="{{asset('images/account.png')}}" alt="User profile picture">
                       </div>
                       <h3 class="profile-username text-center">{{$user->username ?? ''}}</h3>
                       <p class="text-muted text-center">{{$user->profile->nama ?? ''}}</p>
                       <ul class="list-group list-group-unbordered mb-3">
                           <li class="list-group-item">
                               <b>Alamat</b> <span class="float-right">{{$user->profile->alamat ?? ''}}</span>
                           </li>
                           <li class="list-group-item">
                               <b>Telepon</b> <span class="float-right">{{$user->profile->no_tlp ?? ''}}</span>
                           </li>
                           <li class="list-group-item">
                            <b>Jenis Kelamin</b> <span class="float-right">{{$user->profile->jenis_kelamin ?? ''}}</span>
                            </li>
                       </ul>
                   </div>
               </div>
               <!-- Bagian Informasi Lainnya -->
               <!-- Tambahkan kode informasi profil lainnya sesuai kebutuhan -->
           </div>
           <div class="col-md-9">
               <!-- Bagian Konten Utama Profil -->
               <!-- Tambahkan kode konten utama profil sesuai kebutuhan -->
           </div>
            </div>
        </div>
    </div>
</section>
@endsection
