@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Liste des utilisateurs</h4>
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
                        <a class="btn btn-primary" href="{{ route('users.create') }}"> Ajouter un utilisateur</a>
                        <form class="form-inline float-right" method="GET">
                            <div class="form-group mb-2">
                                <label for="filter" class="col-sm-2 col-form-label">Filtrer</label>
                                <input type="text" class="form-control" id="filter" name="filter" placeholder="Nom..." value="{{ $filter }}">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Filtrer</button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Image</th>
                                <th class="border-top-0">@sortablelink('name', 'Nom et prenom')</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">@sortablelink('telephone', 'Telephone')</th>
                                <th class="border-top-0">@sortablelink('roles', 'Roles')</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td><img src="{{ asset('uploads/users/'.$user->avatar) }}" height="75" width="75"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->telephone }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                @if($v == 'agent')<label class="badge badge-success">{{ $v }}</label>@endif
                                                @if($v == 'customer')<label class="badge badge-primary">{{ $v }}</label>@endif
                                                @if($v == 'administrator')<label class="badge badge-info">{{ $v }}</label>@endif
                                                @if($v == 'super-administrator')<label class="badge badge-orange">{{ $v }}</label>@endif
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Voir</a>
                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Modifier</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="delete">
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
