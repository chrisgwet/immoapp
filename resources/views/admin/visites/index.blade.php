@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white" xmlns:livewire="">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Liste des visites</h4>
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
                        <a class="btn btn-primary" href="{{ route('visites.create') }}"> Planifiez une visite
                            propriete</a>

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
                                <th class="border-top-0">@sortablelink('dateVisite', 'Date')</th>
                                <th class="border-top-0">@sortablelink('user.name', 'Nom du client')</th>
                                <th class="border-top-0">@sortablelink('property.name', 'Propriete')</th>
                                <th class="border-top-0">@sortablelink('property.address', 'Addresse')</th>
                                <th class="border-top-0">@sortablelink('isdone', 'Deja effectuee ?')</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $visite)
                                <tr @if($visite->isread == false)style="color: black;"@endif>
                                    <td>{{ $visite->id }}</td>
                                    <td><strong>{{ $visite->dateVisite }}</strong></td>
                                    <td><strong>{{ $visite->user->name }}</strong></td>
                                    <td><a href="{{ route('proprietes.show',$visite->property->id) }}">{{ $visite->property->name }}</a></td>
                                    <td>{{ $visite->property->address }}</td>
                                    <td>
                                        @if($visite->isdone == true)
                                            <span class="badge badge-success">OUI</span>
                                        @elseif ($visite->isdone == false)
                                            <span class="badge badge-warning">NON</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('visites.edit',$visite->id) }}">Modifier</a>
                                        <form action="{{ route('visites.destroy', $visite->id) }}"
                                              method="delete">
                                            <input type="submit" class="btn btn-danger" value="Supprimer">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $data->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
