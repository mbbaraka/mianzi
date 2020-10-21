@extends('layouts.admin')

@section('title')
	Permission
@endsection
@section('breadcrub')
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Mianzi</h1>
          <p> The green store</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Permissions</li>
          <li class="breadcrumb-item active"><a href="#">Create Permission</a></li>
        </ul>
      </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <div class="tile-header">
                <h5 class="tile-title">Permission
                    <a href="{{route('permissions.index')}}" class="btn btn-primary float-right btn-sm">Back</a>
                </h5>
              </div>
              <div class="tile-body">
                <form id="form_validation" method="POST" action="{{ route('permissions.store') }}">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <div class="form-line">
                                <label class="form-label">Permission Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}" required>
                                @error('name')
                                    <label id="name-error" class="error" for="name">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
