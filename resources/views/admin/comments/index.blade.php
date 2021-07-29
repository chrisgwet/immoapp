@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Liste des commentaires</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-12">
                <div class="white-box">

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="border-top-0">@sortablelink('id', '#')</th>
                                <th class="border-top-0">Client</th>
                                <th class="border-top-0">Statut</th>
                                <th class="border-top-0">#Propriete</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Telephone</th>
                                <th class="border-top-0">@sortablelink('created_at', 'Date')</th>
                                <th class="border-top-0">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($comments as $comment)
                                <tr @if($comment->isread == false)style="color: black;"@endif>
                                    <td>{{ $comment->id }}</td>
                                    <td><strong>{{ $comment->user->name }}</strong></td>
                                    <td>
                                        @if(Cache::has('user-is-online-' . $comment->user->id))
                                            <small class="d-block text-success d-block">online</small>
                                        @else
                                            <small class="d-block text-secondary d-block">offline</small>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('proprietes.show',$comment->property->id)}}">{{ $comment->property->name }}</a></td>
                                    <td><strong>{{ $comment->user->email }}</strong></td>
                                    <td><strong>{{ $comment->user->telephone }}</strong></td>
                                    <td><strong>{{ $comment->created_at }}</strong></td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('comments.show',$comment->id) }}">Voir</a>
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
