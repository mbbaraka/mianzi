@extends('layouts.admin')

@section('title')
    Edit Permission
@endsection

@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="">
                            <h3>
                                Edit Role
                                
                            <a href="{{ route('roles.index') }}" class="float-right btn btn-sm btn-primary">Back</a>
                            </h3>
                        </div>
                        <div class="tile-body">
                           <form id="form_validation" method="POST" action="{{ route('roles.update',$role->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input name="_method" type="hidden" value="PUT">
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" required>
                                    @error('name')
                                        <label id="name-error" class="error" for="email">{{ $message }}</label>
                                     @enderror
                                </div>
                                 <div class="form-group">
                                    <label class="form-label">Permissions (Multiple Selection)</label>
                                    <select class="form-control  @error('permission') is-invalid @enderror" id="select2" multiple>
                                        @foreach($permissions as $permission)
                                            <option value="{{ $permission }}">{{ $permission }}</option>
                                        @endforeach
                                    </select>

                                    @error('permission')
                                        <label id="name-error" class="error" for="email">{{ $message }}</label>
                                     @enderror
                                </div>
                                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection


