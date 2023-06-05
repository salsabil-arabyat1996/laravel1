@extends('Admin.layout.master')

@section('content')
    <div class="container">
        <h1>User Details</h1>

        <div class="card">
            <div class="card-header">
                FeedBack Detailes
            </div>
            <div class="card-body">
                <h5 class="card-title">User Name: {{ $comment->user_id }}</h5>
                <p class="card-title">Farm Name: {{ $comment->farm_id }}</p>

                <p class="card-text">Feedback: {{ $comment->feedback }}</p>

                {{-- <p class="card-text">Role: {{ $user->role->name }}</p> --}}
                <p class="card-text">Profile Picture:
                    {{-- @if ($comment->img)
                        <img src="{{ $user->img }}" alt="Profile Picture" width="50" height="50">
                    @else
                        N/A
                    @endif --}}
            </div>
        </div>

        <a href="{{ route('commentdashboard.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
