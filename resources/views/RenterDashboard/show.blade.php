@extends('Admin.layout.master')

@section('content')
    <div class="container">
        <h1>User Details</h1>

        <div class="card">
            <div class="card-header">
                User Information
            </div>
            <div class="card-body">
                <h5 class="card-title">First Name: {{ $user->fname }}</h5>
                <p class="card-title">Last Name: {{ $user->lname }}</p>

                <p class="card-text">Email: {{ $user->email }}</p>
                <p class="card-text">phone: {{ $user->phone }}</p>
                <p class="card-text">Password: {{ $user->password }}</p>
                {{-- <p class="card-text">Role: {{ $user->role->name }}</p> --}}
                <p class="card-text">Profile Picture:
                    @if ($user->img)
                        <img src="{{ $user->img }}" alt="Profile Picture" width="50" height="50">
                    @else
                        N/A
                    @endif
            </div>
        </div>

        <a href="{{ route('userdashboard.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
