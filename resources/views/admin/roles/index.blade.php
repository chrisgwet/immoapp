@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Liste des roles</h4>
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
                        <a class="btn btn-primary" href="{{ route('roles.create') }}"> Creer un nouveau role</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Nom du role</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><strong>{{ $role->name }}</strong></td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Voir</a>
                                        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Modifier</a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="delete">
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
