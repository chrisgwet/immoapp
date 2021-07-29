@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Propriete #{{ $property->id }}</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 style="color: #0e2259;">{{ $property->name }}</h2>
                            <h4><strong>Description:</strong> {{ $property->description }}</h4>
                            <h4><strong>Addresse:</strong> {{ $property->address }}</h4>
                            <h4><strong>Nombres de pieces: <span>{{ $property->rooms }}</span></strong></h4>
                            <h4><strong>Salons: <span>{{ $property->leavingrooms }}</span></strong></h4>
                            <h4><strong>Douches: <span>{{ $property->bathrooms }}</span></strong></h4>
                            <h4><strong>Cuisines: <span>{{ $property->kitchens }}</span></strong></h4>
                            <h4><strong>Chambres: <span>{{ $property->bedrooms }}</span></strong></h4>
                            <h4><strong>Prix: <span>{{ $property->price }} FCFA</span></strong></h4>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <a><img class="img-details" src="{{ asset('uploads/properties/'.$property->image) }}" height="100" width="100"></a>
                                    @foreach($property->images as $image)
                                        <a><img class="img-details" src="{{ asset('uploads/properties/'.$image->path) }}" height="100" width="100"></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('uploads/properties/'.$property->image) }}" alt="" height="400" width="500"  class="img-responsive img-main">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('myScripts')

    <script>
        $('.img-details').click(function (e) {
            $('.img-main').attr('src', e.target.src);
            console.log(e.target.src);
        })
    </script>

@endsection
