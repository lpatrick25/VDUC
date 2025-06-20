@extends('layouts.master')

@section('APP-NAME', 'My Profile')

@section('APP-CONTENT')
    <div class="row">
        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">My Profile</h4>

                    {{-- <div class="text-center mb-4">
                        <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-user.png') }}"
                            alt="Profile Picture" class="img-thumbnail rounded-circle" style="width: 120px; height: 120px;">
                        <p class="mt-2 font-weight-bold">{{ $user->first_name }} {{ $user->middle_name }}
                            {{ $user->last_name }}</p>
                        <p class="text-muted">{{ $user->email }}</p>
                    </div> --}}

                    <div class="text-center">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">Edit
                            Profile</button>
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#changePasswordModal">Change
                            Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileLabel">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="{{ $user->middle_name }}">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" class="form-control" name="contact" value="{{ $user->contact }}" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>Profile Picture</label>
                            <input type="file" class="form-control-file" name="profile_picture">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Change Password Modal -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('profile.updatePassword') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" class="form-control" name="current_password" required>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" class="form-control" name="new_password_confirmation" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
