@extends('admin.app')

@section('admin-content')

    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title text-uppercase font-medium font-14">Dashboard</h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Three charts -->
        <!-- ============================================================== -->
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Visites Planifiées</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash"><canvas width="67" height="30"
                                                            style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ml-auto"><span class="counter text-success">{{ $visitesPlanifiees }}</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Visites terminées</h3>
                    <ul class="list-inline two-part d-flex align-items-center mb-0">
                        <li>
                            <div id="sparklinedash2"><canvas width="67" height="30"
                                                             style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                            </div>
                        </li>
                        <li class="ml-auto"><span class="counter text-purple">{{ $visitesTerminees }}</span></li>
                    </ul>
                </div>
            </div>
{{--            <div class="col-lg-4 col-sm-6 col-xs-12">--}}
{{--                <div class="white-box analytics-info">--}}
{{--                    <h3 class="box-title">Proprietes vendues ou louees</h3>--}}
{{--                    <ul class="list-inline two-part d-flex align-items-center mb-0">--}}
{{--                        <li>--}}
{{--                            <div id="sparklinedash3"><canvas width="67" height="30"--}}
{{--                                                             style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="ml-auto"><span class="counter text-info">0</span>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
        <!-- ============================================================== -->
        <!-- PRODUCTS YEARLY SALES -->
        <!-- ============================================================== -->
{{--        <div class="row">--}}
{{--            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">--}}
{{--                <div class="white-box">--}}
{{--                    <h3 class="box-title">Products Yearly Sales</h3>--}}
{{--                    <div class="d-md-flex">--}}
{{--                        <ul class="list-inline d-flex ml-auto">--}}
{{--                            <li class="pl-3">--}}
{{--                                <h5><i class="fa fa-circle m-r-5 text-info"></i>Mac</h5>--}}
{{--                            </li>--}}
{{--                            <li class="pl-3">--}}
{{--                                <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Windows</h5>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div id="ct-visits" style="height: 405px;">--}}
{{--                        <div class="chartist-tooltip" style="top: -17px; left: -12px;"><span--}}
{{--                                class="chartist-tooltip-value">6</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- ============================================================== -->
        <!-- RECENT SALES -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="white-box">
                    <div class="d-md-flex mb-3">
                        <h3 class="box-title mb-0">Dernieres visites</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table no-wrap">
                            <thead>
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">DATE</th>
                                <th class="border-top-0">NOM DU CLIENT</th>
                                <th class="border-top-0">PROPRIETE</th>
                                <th class="border-top-0">ADDRESSE</th>
                                <th class="border-top-0">DEJA EFFECTUEE ?</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dernieresVisites as $visite)
                                <tr>
                                    <td>{{ $visite->id }}</td>
                                    <td class="txt-oflo">{{ $visite->dateVisite }}</td>
                                    <td>{{ $visite->user->name }}</td>
                                    <td class="txt-oflo">{{ $visite->property->name }}</td>
                                    <td class="txt-oflo">{{ $visite->property->address }}</td>
                                    <td>
                                        @if($visite->isdone == true)
                                            <span class="badge badge-success">OUI</span>
                                        @elseif ($visite->isdone == false)
                                            <span class="badge badge-warning">NON</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Recent Comments -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- .col -->
            <div class="col-md-12 col-lg-8 col-sm-12">
                <div class="white-box">
                    <h3 class="box-title mb-0">Derniers Messages</h3>
                    <div class="comment-center">
                        @foreach($derniersMessages as $message)
                            <div class="comment-body d-flex">
                                <div class="user-img">
                                    @if($message->user->avatar == null)<img src="{{ asset('admin/plugins/images/users/1.jpg') }}" alt="user" class="img-circle">@endif
                                    @if($message->user->avatar != null)<img src="{{ asset('uploads/users/'.$message->user->avatar) }}" alt="user" class="img-circle">@endif
                                </div>
                                <div class="mail-contnet">
                                    <h5>{{ $message->user->name }}</h5><span class="time">{{ $message->created_at }}</span>
                                    <br>
                                    <div class="mb-3 mt-3">
                                            <span class="mail-desc">{{ $message->content }} </span>
                                    </div>
                                    <a href="{{ route('comments.show',$message->id) }}"
                                       class="btn btn btn-rounded btn-default btn-outline mb-2 mb-md-0 m-r-5"><i
                                            class="ti-eye text-success m-r-5"></i>Voir</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-heading">
                        DERNIERS UTILISATEURS
                    </div>
                    <div class="card-body">
                        <ul class="chatonline">
                            @foreach($users as $user)
                                <li>
{{--                                    <div class="call-chat">--}}
{{--                                        <button class="btn btn-success text-white btn-circle btn" type="button">--}}
{{--                                            <i class="fas fa-phone"></i>--}}
{{--                                        </button>--}}
{{--                                        <button class="btn btn-info btn-circle btn" type="button">--}}
{{--                                            <i class="far fa-comments"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                        @if($user->avatar == null)<img src="{{ asset('admin/plugins/images/users/1.jpg') }}" alt="user" class="img-circle">@endif
                                        @if($user->avatar != null)<img src="{{ asset('uploads/users/'.$user->avatar) }}" alt="user" class="img-circle">@endif
                                        <div class="ml-2">
                                                <span class="text-dark text-muted">{{ $user->name }}
                                                    @if(Cache::has('user-is-online-' . $user->id))
                                                        <small class="d-block text-success d-block">online</small>
                                                    @else
                                                        <small class="d-block text-secondary d-block">offline</small>
                                                    @endif
                                                </span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </div>

@endsection
