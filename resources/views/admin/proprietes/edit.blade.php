@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Modifier propriete</h4>
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
                        <form class="form-horizontal form-material" method="post" action="{{ route('admin.properties.update',$propriete->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="name">Nom de la propriete</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" id="name" name="name" value="{{ $propriete->name }}" required placeholder="" class="form-control p-0 border-0 @error('name') is-invalid @enderror">
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
                                    <textarea name="description" id="description" rows="5" class="form-control p-0 border-0 @error('description') is-invalid @enderror">{{ $propriete->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-md-12 p-0">Selectionnez la categorie</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-control p-0 border-0" name="category">
                                        <option selected></option>
                                        @foreach($categories as $category)
                                            <option @if($category === $propriete->category->name) selected @endif>{{ $category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0" for="price">Le prix en CFA</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="number" id="price" name="price" value="{{ $propriete->price }}" required placeholder="" class="form-control p-0 border-0 @error('price') is-invalid @enderror">
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
                                    <input type="number" id="prixvisite" name="prixvisite" value="{{ $propriete->prixvisite }}" required placeholder="" class="form-control p-0 border-0 @error('prixvisite') is-invalid @enderror">
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
                                    <input type="text" id="town" name="town" value="{{ $propriete->town }}" required placeholder="" class="form-control p-0 border-0 @error('town') is-invalid @enderror">
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
                                    <input type="text" id="city" name="city" value="{{ $propriete->city }}" required placeholder="" class="form-control p-0 border-0 @error('city') is-invalid @enderror">
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
                                    <input type="text" id="address" name="address" value="{{ $propriete->address }}" required placeholder="" class="form-control p-0 border-0 @error('address') is-invalid @enderror">
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
                                    <input type="number" id="rooms" name="rooms" value="{{ $propriete->rooms }}" required placeholder="" class="form-control p-0 border-0 @error('rooms') is-invalid @enderror">
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
                                    <input type="number" id="bedrooms" name="bedrooms" value="{{ $propriete->bedrooms }}" required placeholder="" class="form-control p-0 border-0 @error('bedrooms') is-invalid @enderror">
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
                                    <input type="number" id="leavingrooms" name="leavingrooms" value="{{ $propriete->leavingrooms }}" required placeholder="" class="form-control p-0 border-0 @error('leavingrooms') is-invalid @enderror">
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
                                    <input type="number" id="bathrooms" name="bathrooms" value="{{ $propriete->bathrooms }}" required placeholder="" class="form-control p-0 border-0 @error('bathrooms') is-invalid @enderror">
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
                                    <input type="number" id="kitchens" name="kitchens" value="{{ $propriete->kitchens }}" required placeholder="" class="form-control p-0 border-0 @error('kitchens') is-invalid @enderror">
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
                                    <input type="file" id="property-image" name="image" required accept="image/*" value="{{ $propriete->image }}" class="form-control p-0 border-0 @error('image') is-invalid @enderror">
                                    <img src="{{ asset('uploads/properties/'.$propriete->image) }}" id="property-img-tag" width="100" height="100">
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
                                    <input type="file" id="file-gallery" name="files[]" multiple accept="image/*" class="form-control p-0 border-0 @error('files') is-invalid @enderror">

                                    @foreach($propriete->images as $image)

                                        <img src="{{ asset('uploads/properties/'.$image->path) }}" id="property-img-gallery" width="100" height="100">

                                    @endforeach

                                    @error('files')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">Modifier la propriete</button>
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
