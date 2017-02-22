@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Your Profile</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('profile.update', ['slug' => $profile->user->slug]) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="avatar">Profile Image</label>
                            <input type="file" name="avatar" accept="image/*" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="location" class="control-label">Location</label>
                            <input type="text" id="location" name="location" value="{{ $profile->location }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="about" class="control-label">About</label>
                            <textarea id="about" name="about" class="form-control" required>{{ $profile->about }}</textarea>
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary col-lg-12">SUBMIT</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@stop