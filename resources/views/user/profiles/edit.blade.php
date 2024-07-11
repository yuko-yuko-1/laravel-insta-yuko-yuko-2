@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <form action="{{ route('profile.update')}}" method="post" enctype="multipart/form-data" class="rounded-3 bg-white shadow mb-5 p-5">
            @csrf 
            @method('PATCH')

            <h2 class="h4 text-secondary">Update Profile</h2>

            <div class="row mb-3">
                <div class="col-4">
                    @if(Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-circle image-lg d-block mx-auto">
                    @else
                    <i class="fa-solid fa-circle-user text-secondary icon-lg d-block text-center"></i>
                    @endif
                </div>
                <div class="col-auto align-self-end">
                    <input type="file" name="avatar" class="form-control form-control-sm" aria-describedby="avatar-info">
                    <p class="form-text mb-0" id="avatar-info">
                        Acceptable formats: jpeg, jpg, png, gif only <br>
                        Max file size is 1048 KB
                    </p>
                    @error('avatar')
                        <p class="mb-0 text-danger small">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <label for="name" class="form-label fw-bold">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" class="form-control">
            @error('name')
                <p class="mb-0 text-danger small">{{ $message }}</p>
            @enderror

            <label for="email" class="form-label fw-bold mt-2">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email',Auth::user()->email) }}" class="form-control">
            @error('email')
             <p class="mb-0 text-danger small">{{ $message }}</p>
            @enderror

            <label for="introduction" class="form-label fw-bold mt-2">Introduction</label>
            <textarea name="introduction" id="introduction" rows="3" class="form-control">{{ old('introduction',Auth::user()->introduction) }}</textarea>
            @error('introduction')
             <p class="mb-0 text-danger small">{{ $message }}</p>
            @enderror

            <button type="submit" class="btn btn-warning mt-3 px-5">Save</button>
        </form>

        <form action="{{ route('profile.update-password')}}" method="post" class="bg-white rounded-3 shadow p-5">
            @csrf 
            @method('PATCH')

            @if(session('success_message'))
                <span class="text-success fw-bold d-block mb-3">{{ session('success_message') }}</span>
            @endif

            <h2 class="h4 text-secondary">Update Password</h2>

            <label for="old-password" class="form-label fw-bold">Old Password</label>
            <input type="password" name="old_password" id="old-password" class="form-control">
            @if(session('incorrect_password_error'))
               <span class="text-danger small d-block">{{ session('incorrect_password_error') }}</span>
            @endif

            <label for="new-password" class="form-label fw-bold mt-3">New Password</label>
            <input type="password" name="new_password" id="new-password" class="form-control">
            @if(session('same_password_error'))
                <span class="text-danger small d-block">{{ session('same_password_error') }}</span>
            @endif
            @error('new_password')
                <span class="text-danger small d-block">{{ $message }}</span>
            @enderror

            <label for="new-password-confirmation" class="form-label mt-3">Confirm New Password</label>
            <input type="password" name="new_password_confirmation" id="new-password-confirmation" class="form-control">

            <button type="submit" class="btn btn-warning mt-4 px-5">Update Password</button>
        </form>
    </div>
</div>


@endsection