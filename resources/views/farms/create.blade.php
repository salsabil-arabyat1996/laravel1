<!-- farms/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="mb-4">Create Farm</h1>

    <form method="POST" action="{{ route('farms.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="num_guests" class="form-label">Number of Guests</label>
            <input type="number" class="form-control" id="num_guests" name="num_guests" required>
        </div>
        <div class="mb-3">
            <label for="num_bedrooms" class="form-label">Number of Bedrooms</label>
            <input type="number" class="form-control" id="num_bedrooms" name="num_bedrooms" required>
        </div>
        <div class="mb-3">
            <label for="num_beds" class="form-label">Number of Beds</label>
            <input type="number" class="form-control" id="num_beds" name="num_beds" required>
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Images</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple required>
        </div>


        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('farms.index') }}" class="btn btn-secondary">Back</a>
    </form>

</div>

@endsection
