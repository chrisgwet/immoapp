@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Modifier categorie</h4>
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
                        <form class="form-horizontal form-material" method="post" action="{{ route('admin.categories.update',$category->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">nom de la categorie</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="name" value="{{ $category->name }}" required placeholder="" class="form-control p-0 border-0 @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Slug</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="slug" value="{{ $category->slug }}" required placeholder="" class="form-control p-0 border-0 @error('slug') is-invalid @enderror">
                                    @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Image</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="file" id="property-image" name="image" accept="image/*" class="form-control p-0 border-0 @error('image') is-invalid @enderror">
                                    <img src="{{ asset('uploads/categories/'.$category->image) }}" id="property-img-tag" width="100" height="100">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">Modifier la categorie</button>
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

