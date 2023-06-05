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
                            <li><a href="{{ route('profile.index') }}"><span class="fa fa-user"></span> Profile</a></li>
                            {{-- <li><a href="#"><span class="fa fa-cog"></span> Settings</a></li> --}}
                            <li class="active"><a href="#"><span class="fa fa-th"></span> Farms</a></li>
                            {{-- <li><a href="#"><span class="fa fa-envelope"></span> Messages</a></li> --}}
                            {{-- <li><a href="user-drive.html"><span class="fa fa-th"></span> Drive</a></li> --}}
                            <li><a href="#"><span class="fa fa-clock-o"></span> Calendar</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="content-panel">
                        <div class="actions">
                            <a href="{{ route('farms.create') }}" class="btn btn-success btn-lg mb-1"><i class="fa fa-plus"></i> Upload New Farm</a>
                        </div>
                        <div class="container">
                            <div class="row">
                                @foreach ($farms as $farm)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <!-- Card Content -->
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('farms.show', $farm) }}">{{ $farm->title }}</a>
                                            </h5>
                                            <div class="card-img-top">
                                                <div style="max-height: 150px; overflow: hidden;">
                                                    @if ($farm->images->count() > 0)
                                                        <img src="{{ asset('images/' . $farm->images->first()->image) }}" alt="Farm Image" class="img-fluid" style="width: 100%; height: 150px; object-fit: cover;">
                                                    @else
                                                        <span>No image available</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Card Footer -->
                                        <div class="card-footer">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('farms.edit', $farm) }}" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="{{ route('farms.show', $farm) }}" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="View">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <form action="{{ route('farms.destroy', $farm) }}" method="POST" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </section>
    </div>
@endsection
