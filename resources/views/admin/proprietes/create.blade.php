@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Nouvelle propriete</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="container-fluid">

        <div class="row">

            @if (count($errors) > 0)
                <div class="alert alert-danger ml-2">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
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
                        <form class="form-horizontal form-material" method="post" action="{{ route('proprietes.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="name">Nom de la propriete</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="" class="form-control p-0 border-0 @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="description">Description</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <textarea name="description" id="description" rows="5" class="form-control p-0 border-0 @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Selectionnez la categorie</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-control p-0 border-0" name="category">
                                        @foreach($categories as $category)
                                            <option>{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="price">Le prix en CFA</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" id="price" name="price" value="{{ old('price') }}" required placeholder="" class="form-control p-0 border-0 @error('price') is-invalid @enderror">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Quelle opération voulez vous effectuez?</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-control p-0 border-0" name="operation">
                                        <option value="A Vendre">A Vendre</option>
                                        <option value="A Louer">A Louer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="prixvisite">Montant de la visite</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" id="prixvisite" name="prixvisite" value="{{ old('prixvisite') }}" required placeholder="" class="form-control p-0 border-0 @error('prixvisite') is-invalid @enderror">
                                    @error('prixvisite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="town">Entrer la ville</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" id="town" name="town" value="{{ old('town') }}" required placeholder="" class="form-control p-0 border-0 @error('town') is-invalid @enderror">
                                    @error('town')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="city">Entrer le quartier</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" id="city" name="city" value="{{ old('city') }}" required placeholder="" class="form-control p-0 border-0 @error('city') is-invalid @enderror">
                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="address">Entrer l'adresse</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" id="address" name="address" value="{{ old('address') }}" required placeholder="" class="form-control p-0 border-0 @error('address') is-invalid @enderror">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="rooms">Nombre de pièces</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" id="rooms" name="rooms" value="{{ old('rooms') }}" required placeholder="" class="form-control p-0 border-0 @error('rooms') is-invalid @enderror">
                                    @error('rooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="bedrooms">Nombre de chambres</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" id="bedrooms" name="bedrooms" value="{{ old('bedrooms') }}" required placeholder="" class="form-control p-0 border-0 @error('bedrooms') is-invalid @enderror">
                                    @error('bedrooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="leavingrooms">Nombre de salons</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" id="leavingrooms" name="leavingrooms" value="{{ old('leavingrooms') }}" required placeholder="" class="form-control p-0 border-0 @error('leavingrooms') is-invalid @enderror">
                                    @error('leavingrooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="bathrooms">Nombre de douches</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}" required placeholder="" class="form-control p-0 border-0 @error('bathrooms') is-invalid @enderror">
                                    @error('bathrooms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="kitchens">Nombre de cuisines</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" id="kitchens" name="kitchens" value="{{ old('kitchens') }}" required placeholder="" class="form-control p-0 border-0 @error('kitchens') is-invalid @enderror">
                                    @error('kitchens')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Photo de la propriete</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="file" id="property-image" name="image" required accept="image/*" class="form-control p-0 border-0 @error('image') is-invalid @enderror">
                                    <img src="#" id="property-img-tag" width="100" height="100">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr/>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Selectionnez les images pour la galerie</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="file" id="file-gallery" required name="files[]" multiple accept="image/*" class="form-control p-0 border-0 @error('files') is-invalid @enderror">
                                    <img src="#" id="property-img-gallery" width="100" height="100">
                                    @error('files')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">Creer la propriete</button>
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

        // function readUrlForImages(input) {
        //     if(input.files && input.files[0]){
        //         var reader = new FileReader();
        //         reader.onload = function (e) {
        //             $('#property-img-gallery').attr('src', e.target.result);
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

        $('#property-image').change(function () {
            readUrl(this);
        })

        // $('#file-gallery').change(function () {
        //     readUrlForImages(this);
        // })
    </script>

@endsection
