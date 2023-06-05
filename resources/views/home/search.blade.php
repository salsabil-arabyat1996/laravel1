@extends('home.index')


@section('section')

<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                @foreach ($farms as $farm)
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{url('home/img/room/room-2.jpg ')}}">
                        <div class="hr-text">
                            <h3>{{$farm->title}}</h3>
                            <h2>{{$farm->price }}<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">Address</td>
                                        <td>{{$farm->address}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>{{$farm->num_guests}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed:</td>
                                        <td>{{$farm->num_beds}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Bed Room:</td>
                                        <td>{{$farm->num_bedrooms}}</td>
                                    </tr>
                                    <tr>
                                        <td class="r-o">Description</td>
                                        <td>{{$farm->description}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection
