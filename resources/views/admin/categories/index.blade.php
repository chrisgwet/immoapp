@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Liste des categories</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="container-fluid">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">

            <div class="col-sm-12">
                <div class="white-box">

                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('categories.create') }}"> Creer une nouvelle categorie</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Image</th>
                                <th class="border-top-0">Nom</th>
                                <th class="border-top-0">Slug</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $categorie)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="{{ asset('uploads/categories/'.$categorie->image) }}" height="75" width="75"></td>
                                    <td>{{ $categorie->name }}</td>
                                    <td>{{ $categorie->slug }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('categories.edit',$categorie->id) }}">Modifier</a>
                                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="delete">
                                            <input type="submit" class="btn btn-danger" value="Supprimer">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
