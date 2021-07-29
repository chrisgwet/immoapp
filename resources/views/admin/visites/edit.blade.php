@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Modifier la visite</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="container-fluid">

        <div class="row">

            @if (count($errors) > 0)
                <div class="alert alert-danger ml-2">
                    <strong>Whoops!</strong> Une erreur est survenue.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif

        <!-- Column -->
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="post" action="{{ route('admin.visites.update',$visite->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Date de la visite</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="datetime-local" name="datevisite" value="{{ $visite->dateVisite }}" required class="form-control p-0 border-0 @error('datevisite') is-invalid @enderror">
                                    @error('datevisite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Selectionnez la propriete</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-control p-0 border-0" name="property" required>
                                        @foreach($properties as $property)
                                            <option value={{ $property->id }}>{{$property->id}} - {{$property->name}} - {{$property->address}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Selectionnez le client</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-control p-0 border-0" name="user" required>
                                        @foreach($clients as $client)
                                            <option value={{ $client->id }}>{{$client->id}} - {{$client->name}} - {{$client->telephone}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Visite deja effectuee ou pas?(Cochez si visite deja effectuee)</label>
                                <div class="col-sm-2">
                                    <input type="checkbox" name="isdone" />
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">Modifier la visite</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>

@endsection

@section('myScripts')

    <script>
        function readUrl(input) {
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#property-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#property-image').change(function () {
            readUrl(this);
        })
    </script>

@endsection

