@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-6 col-lg-offset-3">

            <div class="panel panel-default">

                <div class="panel-heading">
                    {{ $user->name }}'s Profile
                </div>

                <div class="panel-body text-center">
                    <img class="profile-image" src="{{ Storage::url($user->avatar) }}" alt="{{ $user->name }}'s avatar">

                    <p class="text-center">{{ $user->profile->location }}</p>

                    <a href="{{ route('profile.edit', ['slug' => $user->slug]) }}" class="btn btn-default">Edit Your Profile</a>
                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">About {{ $user->name }}</div>
                <div class="panel-body text-center">{{ $user->profile->about }}</div>
            </div>
        </div>
    </div>
@stop