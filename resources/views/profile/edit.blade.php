@extends('layouts.app')

@section('content')
    <div class="view-account">
        <section class="module">
            <div class="module-inner">
                <div class="side-bar">
                    <div class="user-info">
                        @auth
                        <img class="img-profile img-circle img-responsive center-block" src="{{ asset('storage/' . $user->img) }}" alt="">
                            <ul class="meta list list-unstyled">
                                <li class="name">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</li>
                                <li class="email"><a href="{{ Auth::user()->email }}">{{ Auth::user()->email }}</a></li>
                            </ul>
                        @endauth
                    </div>
                    <nav class="side-menu">
                        <ul class="nav">
                            <li class="active"><a href="{{ route('profile.index') }}"><span class="fa fa-user"></span> Profile</a></li>
                            {{-- <li><a href="#"><span class="fa fa-cog"></span> Settings</a></li> --}}
                            <li><a href="{{ route('farms.index') }}"><span class="fa fa-th"></span> Farms</a></li>
                            {{-- <li><a href="#"><span class="fa fa-envelope"></span> Messages</a></li> --}}
                            {{-- <li><a href="user-drive.html"><span class="fa fa-th"></span> Drive</a></li> --}}
                            <li><a href="#"><span class="fa fa-clock-o"></span> Calendar</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="content-panel">
                    <h1>Edit Profile</h1>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="fname" class="form-control" value="{{ $user->fname }}" required>
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lname" class="form-control" value="{{ $user->lname }}" required>
                        </div>

                        <div class="form-group">
                            <label for="img">Profile Image</label>
                            <input type="file" id="img" name="img" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </section>
    </div>


@endsection
