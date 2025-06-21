@extends('layouts.master')

@section('APP-NAME', 'My Profile')

@section('APP-CONTENT')
    <div class="card">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0 text-white">My Profile</h4>
        </div>
        <div class="card-body text-center">
            <!-- Profile Picture -->
            <!-- Profile Picture -->
            @php
                $profilePicture = auth()->user()->profile_picture
                    ? asset('storage/' . auth()->user()->profile_picture)
                    : asset('images/user/1.jpg');
            @endphp

            <img src="{{ $profilePicture }}" alt="Profile Picture" class="rounded-circle mb-4"
                style="width: 120px; height: 120px; object-fit: cover;">


            <div class="row text-left">
                <!-- First Name -->
                <div class="col-md-6 mb-3">
                    <strong>First Name:</strong>
                    <div>{{ auth()->user()->first_name }}</div>
                </div>
                <!-- Middle Name -->
                <div class="col-md-6 mb-3">
                    <strong>Middle Name:</strong>
                    <div>{{ auth()->user()->middle_name ?? '-' }}</div>
                </div>
                <!-- Last Name -->
                <div class="col-md-6 mb-3">
                    <strong>Last Name:</strong>
                    <div>{{ auth()->user()->last_name }}</div>
                </div>
                <!-- Extension Name -->
                <div class="col-md-6 mb-3">
                    <strong>Extension Name:</strong>
                    <div>{{ auth()->user()->extension_name ?? '-' }}</div>
                </div>
                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <strong>Email:</strong>
                    <div>{{ auth()->user()->email }}</div>
                </div>
                <!-- Phone Number -->
                <div class="col-md-6 mb-3">
                    <strong>Contact Number:</strong>
                    <div>{{ auth()->user()->contact ?? '-' }}</div>
                </div>
                <!-- Role -->
                <div class="col-md-6 mb-3">
                    <strong>Role:</strong>
                    <div>{{ auth()->user()->role }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
