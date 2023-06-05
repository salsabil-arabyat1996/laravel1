@extends('Admin.layout.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
             Reversation
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>User Id</th>
                        <th>Farm Name</th>



                        {{-- <th>Password</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->check_in }}</td>
                            <td>{{ $appointment->check_out }}</td>

                            <td>{{ $appointment->user_id }}</td>
                            <td>{{ $appointment->farm_id }}</td>





                            <td>
                                <a href="{{ route('appointment.show', $appointment->id) }}" class="btn btn-primary">View</a>
                                {{-- <a href="{{ route('userdashboard.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('reversationdashboard.destroy', $comment->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
