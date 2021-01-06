@extends('admin.layout')

@section('title', 'Admin Configuration')
@section('panel')
    <h3>Admin Configuration</h3>
    <hr>
    @include('partials.errors')
    @include('partials.session')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label class="col-md-4 control-label">Name</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">E-Mail Address</label>
            <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ $user->email }}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-6">
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Update Admin Settings
                </button>
            </div>
        </div>
    </form>
@endsection
