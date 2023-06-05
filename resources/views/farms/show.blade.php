@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <!-- Owl Carousel -->
        <div class="owl-carousel owl-theme">
            @foreach ($farm->images as $image)
            <div class="item">
                <img src="{{ asset('images/'.$image->image) }}" alt="Farm Image" class="img-fluid rounded" style="height: 400px; object-fit: cover;">
            </div>
            @endforeach
        </div>

        <div class="card-body">
            <div class="card-header">
                <h1 class="card-title" style="font-size: 24px;">{{ $farm->title }}</h1>
            </div>
            <p class="card-text" style="font-size: 18px;">Description: {{ $farm->description }}</p>
            <p class="card-text" style="font-size: 18px;">Address: {{ $farm->address }}</p>
            <p class="card-text" style="font-size: 18px;">Price: {{ $farm->price }}</p>
            <p class="card-text" style="font-size: 18px;">Number of Guests: {{ $farm->num_guests }}</p>
            <p class="card-text" style="font-size: 18px;">Number of Bedrooms: {{ $farm->num_bedrooms }}</p>
            <p class="card-text" style="font-size: 18px;">Number of Beds: {{ $farm->num_beds }}</p>
            <p class="card-text" style="font-size: 18px;">Created At: {{ $farm->created_at }}</p>
            <!-- Add more details about the farm -->
        </div>
    </div>
    <a href="{{ route('farms.index') }}" class="btn btn-secondary mt-4">Back</a>
</div>
@endsection
