@extends('Admin.layout.master')

@section('content')
    <div class="container">
        <h1>appointment Details</h1>

        <div class="card">
            <div class="card-header">
                appointment Information
            </div>
            <div class="card-body">
                <h5 class="card-title">First Name: {{$appointment->user_id }}</h5>


            </div>
        </div>

        <a href="{{ route('appointment.index') }}" class="btn btn-primary mt-3">Back to Dashboard</a>
    </div>
@endsection
