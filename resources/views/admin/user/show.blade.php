
@extends('admin.layout.admin')

@section('title', 'Profile')

@section('pageTitle', 'Profile')

@section('content')

<section class="content">
    <div class="row">
        
        <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-xs-10">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset($user->photo->path) }}"
                        alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">{{ $user->isAdmin ? 'Admin' : 'Editor' }}</p>

                </div>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title float-left ">About Me</h3>
                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-warning float-right">Edit</a>
                </div>

                <div class="card-body">
                    <strong><i class="fa fa-at mr-1"></i> Email</strong>

                    <p class="text-muted">
                    {{ $user->email }}
                    </p>

                    <hr>

                    <strong><i class="fa fa-address-card mr-1"></i> Address</strong>

                    <p class="text-muted">{{ $user->address }}</p>

                    <hr>

                    <strong><i class="fa fa-male mr-1"></i> Gender</strong>

                    <p class="text-muted">{{ $user->gender }}</p>

                    <hr>

                    <strong><i class="fa fa-phone mr-1"></i> Phone</strong>

                    <p class="text-muted">{{ $user->phone }}</p>

                    <strong><i class="fa fa-birthday-cake mr-1"></i> Birth Date</strong>

                    <p class="text-muted">{{ $user->birthDate }}</p>
                </div>
            </div>

        </div>
    </div>

</section>

@endsection


