@extends('Admin.layout.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
             Feedbaks
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Farm Name</th>
                        <th>Feadback</th>


                        {{-- <th>Password</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $comment)
                        <tr>
                            <td>{{ $comment->user_id }}</td>
                            <td>{{ $comment->farm_id }}</td>
                            <td>{{ $comment->feedback }}</td>

                            {{-- <td>{{ $user->password }}</td> --}}
                            <td>
                                <a href="{{ route('commentdashboard.show', $user->id) }}" class="btn btn-primary">View</a>
                                {{-- <a href="{{ route('userdashboard.edit', $user->id) }}" class="btn btn-success">Edit</a> --}}
                                <form action="{{ route('commentdashboard.destroy', $user->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
