@extends('layouts.app')

@section('title', 'Suggested Users')

@section('content')

<div class="row justify-content-center">
    <div class="col-4">

        <form action="{{ route('suggested-users')}}" method="get" class="mb-3" style="width:15rem">
            <input type="text" name="search" value="{{ $search }}" placeholder="search names" class="form-control form-control-sm">
        </form>

        <h3 class="h4 mb-3">Suggested</h3>

        @forelse($suggested_users as $user)
            <div class="row mb-3 align-items-center">
                {{-- icon/avatar --}}
                <div class="col-auto">
                    <a href="{{ route('profile.show', $user->id)}}">
                        @if($user->avatar)
                            <img src="{{ $user->avatar }}" alt="" class="rounded-circle avatar-md">
                        @else 
                            <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                        @endif
                    </a>
                </div>
                {{-- name, email, label --}}
                <div class="col ps-0 text-truncate">
                    <a href="{{ route('profile.show', $user->id)}}" class="text-decoration-none fw-bold text-dark">{{ $user->name }}</a>
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                    {{-- label --}}
                    <span class="text-muted">
                        @if($user->followsYou())
                            Follows you
                        @elseif($user->followers()->count() == 0)
                            No followers yet
                        @elseif($user->followers()->count() == 1)
                            1 follower 
                        @else 
                            {{ $user->followers()->count() }} followers 
                        @endif
                    </span>
                </div>
                {{-- follow button --}}
                <div class="col-auto">
                    <form action="{{ route('follow.store', $user->id)}}" method="post">
                        @csrf 
                        <button type="submit" class="bg-transparent border-0 shadow-none text-primary">Follow</button>
                    </form>
                </div>
            </div>
        @empty 
            <p class="text-center text-muted">No suggested users.</p>
        @endforelse
    </div>
</div>

@endsection