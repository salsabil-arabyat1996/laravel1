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
                    <h1>Welcome to your profile    <a href="{{ route('profile.edit') }}" data-toggle="tooltip" data-placement="top"
                        title data-original-title="edit"><i class="fa fa-edit"></i></a></h1>
                    <div>
                        <h2>Name: {{ Auth::user()->fname }} {{ Auth::user()->lname }} </h2>
                        <p>Email: {{ Auth::user()->email }}</p>
                        <p>Phone: 0{{ Auth::user()->phone }}</p>
                        <img src="{{ asset('storage/' . $user->img) }}" alt="" width="200" height="280">
                        {{-- Add more user profile information here --}}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
