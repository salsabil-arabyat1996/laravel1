@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Edit Farm</h1>

    <form method="POST" action="{{ route('farms.update', $farm->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $farm->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $farm->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $farm->address }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ $farm->price }}" required>
        </div>
        <div class="mb-3">
            <label for="num_guests" class="form-label">Number of Guests</label>
            <input type="number" class="form-control" id="num_guests" name="num_guests" value="{{ $farm->num_guests }}" required>
        </div>
        <div class="mb-3">
            <label for="num_bedrooms" class="form-label">Number of Bedrooms</label>
            <input type="number" class="form-control" id="num_bedrooms" name="num_bedrooms" value="{{ $farm->num_bedrooms }}" required>
        </div>
        <div class="mb-3">
            <label for="num_beds" class="form-label">Number of Beds</label>
            <input type="number" class="form-control" id="num_beds" name="num_beds" value="{{ $farm->num_beds }}" required>
        </div>

            <!-- Existing Images -->
        @foreach($farm->images as $image)
        <div class="mb-3">
            <label class="form-label">Existing Image</label>
            <div>
                <img src="{{ asset('storage/'.$image) }}" alt="Existing Image" style="width: 200px;">
                <input type="checkbox" name="delete_images[]" value="{{ $image }}"> Delete
            </div>
        </div>
        @endforeach

        <!-- File Upload -->
        <div class="mb-3">
        <label for="images" class="form-label">New Images</label>
        <input type="file" class="form-control" id="images" name="images[]" multiple>
        </div>



        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('farms.index') }}" class="btn btn-secondary">Back</a>
    </form>


</div>

@endsection
