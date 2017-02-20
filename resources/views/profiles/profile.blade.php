@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ $user->name }}'s Profile
                </div>
                <div class="panel-body">
                    <img src="{{ Storage::url($user->avatar) }}" style=" width: 200px;" alt="{{ $user->name }}'s avatar">
                </div>
            </div>
        </div>
    </div>
@stop