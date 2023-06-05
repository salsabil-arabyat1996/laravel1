@extends('home.layouts.app')

@section('section')
    <!-- Page Preloder -->




    <section class="hero-section ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h1>Sona Farms - Book Your Farm Stay Experience </h1>
                        <p>Here are the best Farms booking site, including recommendations for international
                            travel and for finding low-priced Farms.</p>
                        <a href="#" class="primary-btn">Discover Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="{{ url('home/img/hero/hero-1.jpg ') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ url('home/img/hero/hero-2.jpg ') }}"></div>
            <div class="hs-item set-bg" data-setbg="{{ url('home/img/hero/hero-3.jpg ') }}"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <br><br>
    <!-- Home Room Section Begin -->
      <!-- filter Section Begin -->
      <div class="col-md-12">
        <form action="{{ url('home.index') }}" method="GET">
            <div class="card">
                <div class="card-header">
                    <h4>Farms
                        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                    </h4>
                </div>
                <div class="card-body">
                    @foreach ($farms as $farm)
                        @php
                            $checked = [];
                            if (isset($_GET['filterbrand'])) {
                                $checked = $_GET['filterbrand'];
                            }
                        @endphp
                        <div class="mb-1">
                            <input type="checkbox" name="filterbrand[]" value="{{ $farm->id }}"
                                @if (in_array($farm->id, $checked)) checked @endif />
                            {{ $farm->price }}
                        </div>
                    @endforeach

                </div>
            </div>
        </form>
    </div>
    <br>
    <!-- filter Section End -->

    <section class="hp-room-section">
        <div class="container-fluid">
            <div class="hp-room-items">
                <div class="row">
                    @foreach ($farms as $farm)
                        <div class="col-lg-3 col-md-6">
                            <div class="hp-room-item"
                                style="background-image: url('{{ asset('images/' . $farm->images->first()->image) }}')">
                                <div class="hr-text">
                                    <h3>{{ $farm->title }}</h3>
                                    <h2>{{ $farm->price }}<span>/Pernight</span></h2>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="r-o">Address</td>
                                                <td>{{ $farm->address }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Capacity:</td>
                                                <td>{{ $farm->num_guests }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Bed:</td>
                                                <td>{{ $farm->num_beds }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Bed Room:</td>
                                                <td>{{ $farm->num_bedrooms }}</td>
                                            </tr>
                                            <tr>
                                                <td class="r-o">Description</td>
                                                <td>{{ $farm->description }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a href="{{ route('post.view', ['id' => $farm->id]) }}" class="primary-btn">More
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <!-- Home Room Section End -->
@endsection

@section('script')
    <!-- Js Plugins -->
    <script src="{{ url('home/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('home/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('home/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('home/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ url('home/js/jquery-ui.min.js') }}"></script>
    <script src="{{ url('home/js/jquery.slicknav.js') }}"></script>
    <script src="{{ url('home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('home/js/main.js') }}"></script>
@endsection
