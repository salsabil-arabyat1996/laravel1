@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-header">User Information</div>
        <div class="card-body">
          <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label for="first_name">First Name:</label>
              <input type="text" name="fname" id="fname" class="form-control" value="{{ $user->fname }}" required>
            </div>

            <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" name="lname" id="lname" class="form-control" value="{{ $user->lname }}" required>
            </div>

            <!-- Add more fields for other user information -->
            <!-- For example, to display the user's email and phone -->

            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
              <label for="phone">Phone:</label>
              <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" required>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-md-6 offset-md-3">
      <h2>Appointments</h2>
      <table class="table">
        <thead>
          <tr>
            <th>check_in</th>
            <th>check_out</th>
            <th>title</th>
          </tr>
        </thead>
        <tbody>
          @foreach($appointments as $appointment)
          <tr>
            <td>{{ \Carbon\Carbon::parse($appointment->check_in)->format('Y-m-d') }}</td>
            <td>{{ \Carbon\Carbon::parse($appointment->check_out)->format('Y-m-d') }}</td>

            <td>{{ $appointment->farm->title }}</td>
        </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>
@endsection
