@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white" xmlns:livewire="">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Liste des proprietes</h4>
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
                        <a class="btn btn-primary" href="{{ route('proprietes.create') }}"> Creer une nouvelle
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
                                <th class="border-top-0">Image</th>
                                <th class="border-top-0">Nom</th>
                                <th class="border-top-0">@sortablelink('price', 'Prix')</th>
                                <th class="border-top-0">@sortablelink('category.name', 'Categorie')</th>
                                <th class="border-top-0">@sortablelink('address', 'Addresse')</th>
                                <th class="border-top-0">@sortablelink('operation', 'Operation')</th>
                                <th class="border-top-0">Mis en avant</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $propriete)
                                <tr>
                                    <td>{{ $propriete->id }}</td>
                                    <td><img src="{{ asset('uploads/properties') }}/{{ $propriete->image }}"
                                             alt="{{ $propriete->name }}" height="75" width="75"></td>
                                    <td><strong>{{ $propriete->name }}</strong></td>
                                    <td>{{ $propriete->price }} FCFA</td>
                                    <td><strong>{{ $propriete->category->name }}</strong></td>
                                    <td>{{ $propriete->address }}</td>
                                    <td>
                                        @if($propriete->operation == 'A Vendre')
                                            <span class="badge badge-success">A Vendre</span>
                                        @elseif ($propriete->operation == 'A Louer')
                                            <span class="badge badge-warning">A Louer</span>
                                        @endif
                                    </td>
                                    <td>
                                        <livewire:featured-tags :propriete="$propriete"/>
                                    </td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('proprietes.show',$propriete->id) }}">Voir</a>
                                        <a class="btn btn-primary" href="{{ route('proprietes.edit',$propriete->id) }}">Modifier</a>
                                        <form action="{{ route('proprietes.destroy', $propriete->id) }}"
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
