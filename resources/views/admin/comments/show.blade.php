@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Commentaire #{{ $comment->id }}</h4>
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
                            <h2>Commentaire #{{ $comment->id }} du {{ $comment->created_at }}</h2>
                            <h3>Fait par: {{ $comment->user->name }}</h3>
                            <h4>Email: {{ $comment->user->email }}</h4>
                            <h4>Telephone: {{ $comment->user->telephone }}</h4>
                            <fieldset>
                                Message: <p>{{ $comment->content }}</p>
                            </fieldset>

                            <div class="row" style="margin-top: 70px;">
                                <div class="col-md-12">
                                    <a href="#"><img class="img-details" src="{{ asset('uploads/properties/'.$comment->property->image) }}" height="100" width="100"></a>
                                    @foreach($comment->property->images as $image)
                                        <a href="#"><img class="img-details" src="{{ asset('uploads/properties/'.$image->path) }}" height="100" width="100"></a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('proprietes.show',$comment->property->id) }}"><img src="{{ asset('uploads/properties/'.$comment->property->image) }}" alt="" height="400" width="500" class="img-responsive img-main"></a>
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
