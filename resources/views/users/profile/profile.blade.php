@extends('layouts.admin')

@section('title')
   User Profile
@endsection

@section('breadcrub')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p> The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Profile</li>
          <li class="breadcrumb-item active"><a href="#">Account Details</a></li>
        </ul>
      </div>
@endsection

@section('content')
<div class="row">
<div class="col-md-4">
            <div class="tile card-user">
              <div class="image">
                <!-- <img src="../assets/img/damir-bosnjak.jpg" alt="..."> -->
              </div>
              <div class="tile-body">
                <div class="text-center">
                  <a href="#">
                  <img src="{{asset('storage/profile-pic')}}/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" class="avatar border-gray"/>
                    <!-- <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="..."> -->
                    <h5 class="title">{{ Auth::user()->name }}</h5>
                  </a>
                  <p class="description">
                    <!-- {{ Auth::user()->name }} -->
                  </p>
                </div>
                <p class="description text-center">
                {{ Auth::user()->name }}<br>{{ Auth::user()->email }}<br>{{ Auth::user()->mobile }}
                </p>
              </div>

            </div>
          </div>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="tile">
            <div class="">
                <h3>
                    User Profile
                </h3>
            </div>
            <div class="tile-body">
                <form id="form_validation" method="POST" action="{{ route('profile.update',$user->id) }}" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PUT">
                    <div class="form-group ">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" placeholder="Username" required autofocus>
                        @error('name')
                            <label id="name-error" class="error" for="name">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Mobile</label>
                        <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$user->mobile?$user->mobile:old('mobile')}}" placeholder="10 digit Mobile number" minlength=10 maxlength=10 pattern="\d*" title="10 digit Mobile number" required>
                        @error('mobile')
                            <label id="mobile-error" class="error" for="mobile">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="Email Id" required autofocus>
                        @error('email')
                            <label id="email-error" class="error" for="email">{{ $message }}</label>
                        @enderror
                    </div>

                    <div class="form-group ">
                        <label class="form-label">Profile Pic</label>
                        <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" required>
                        @error('avatar')
                            <label id="avatar-error" class="error" for="avatar">{{ $message }}</label>
                        @enderror
                    </div>
                    <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
