@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Nouveau role</h4>
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
                        <form class="form-horizontal form-material" method="post" action="{{ route('roles.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Nom du role</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="name" value="{{ old('name') }}" required placeholder="" class="form-control p-0 border-0 @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <fieldset>
                                    <label>Choisissez les permissions</label>
                                    <div class="col-md-12 border-bottom p-0">
                                        @foreach($permission as $value)
                                            <input type="checkbox" name="permission[]" value={{ $value->name }}>{{ $value->name }}<br>
                                        @endforeach()
                                        <br>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">Creer le role</button>
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
