@extends('layouts.admin')

@section('title')
	Permission
@endsection
@section('breadcrub')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i>Mianzi</h1>
          <p>The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">User</li>
          <li class="breadcrumb-item active"><a href="#">Permmissions</a></li>
        </ul>
      </div>
@endsection
@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="">
                            <h3>
                                Add New Role
                            <a href="{{ route('roles.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
                            </h3>
                        </div>
                        <div class="tile-body">
                           <form id="form_validation" method="POST" action="{{ route('roles.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                    @error('name')
                                        <label id="name-error" class="error" for="email">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Permissions (Multiple Selection)</label>
                                    <select class="form-control @error('permission') is-invalid @enderror" name="permission[]" id="select2" multiple required>
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission }}">{{ $permission }}</option>
                                        @endforeach
                                    </select>
                                     @error('permission')
                                        <label id="name-error" class="error" for="email">{{ $message }}</label>
                                     @enderror
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
