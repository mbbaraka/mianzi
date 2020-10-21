@extends('layouts.admin')

@section('title')
    Edit Permission
@endsection

@section('breadcrub')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active"><a href="#">Edit User</a></li>
        </ul>
      </div>
@endsection

@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="">
                            <h3>
                                Edit User Details
                                <a href="{{route('users.index')}}" class="btn btn-primary float-right btn-sm">Back</a>
                            </h3>
                        </div>
                        <div class="tile-body">
                           <form id="form_validation" method="POST" action="{{ route('users.update',$user->id) }}">
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
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="Email Id" required autofocus>
                                    @error('email')
                                        <label id="email-error" class="error" for="email">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">Mobile</label>
                                    <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{$user->mobile}}" placeholder="10 digit Mobile number" minlength=10 maxlength=10 pattern="\d*" title="10 digit Mobile number" required>
                                    @error('mobile')
                                        <label id="mobile-error" class="error" for="mobile">{{ $message }}</label>
                                    @enderror
                                </div>
                               
                                <div class="form-group ">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                    @error('password')
                                        <label id="password-error" class="error" for="password">{{ $message }}</label>
                                    @enderror
                                </div>

                                <div class="form-group ">
                                    <label class="form-label">Roles</label>
                                    <select id="select2" class="form-control @error('roles') is-invalid @enderror" name="roles[]" multiple required>
                                            @foreach($roles as $role)
                                                <option>{{ $role }}</option>
                                            @endforeach
                                    </select>
                                     @error('roles')
                                        <label id="roles-error" class="error" for="roles">{{ $message }}</label>
                                    @enderror
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@section('extra-script')
<script type="text/javascript">
    var test = "{{$selectedRoles}}";
    if (test != '') {
        document.getElementById('select2').value = test;
    }
</script>

@endsection
