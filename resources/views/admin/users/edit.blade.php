@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Modifier utilisateur</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="container-fluid">

        <div class="row">

            <!-- Column -->
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-horizontal form-material" method="post" action="{{ route('admin.users.update',$user->id) }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Nom et prenom</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="text" name="name" value="{{ $user->name }}" required placeholder="" class="form-control p-0 border-0 @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Email</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="email" name="email" value="{{ $user->email }}" required placeholder="" class="form-control p-0 border-0 @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Mot de passe</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="password" name="password" value="{{ old('password') }}" required placeholder="" class="form-control p-0 border-0 @error('password') is-invalid @enderror">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Confirmez votre Mot de passe</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="password" name="password_confirmation" value="{{ old('password') }}" required placeholder="" class="form-control p-0 border-0 @error('password_confirmation') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Telephone</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="tel" name="telephone" value="{{ $user->telephone }}" required placeholder="" class="form-control p-0 border-0 @error('password') is-invalid @enderror">
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label class="col-sm-12">Selectionnez le rôle</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-control p-0 border-0" name="roles" multiple>
                                        @foreach($roles as $role)
                                            <option>{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="col-md-12 p-0">Selectionnez une photo</label>
                                <div class="col-md-12 border-bottom p-0">
                                    <input type="file" id="property-avatar" name="avatar" accept="image/*" class="form-control p-0 border-0 @error('avatar') is-invalid @enderror">
                                    <img src="{{ asset('uploads/users/'.$user->avatar) }}" id="property-avatar-tag" width="100" height="100">
                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <div class="col-sm-12">
                                    <button class="btn btn-primary">Modifier le profil</button>
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
                    $('#property-avatar-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#property-avatar').change(function () {
            readUrl(this);
        })
    </script>

@endsection
