@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.dashboard')</h1>

            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</li>
            </ol>
        </section>

        <section class="content">

            <div class="row">

{{--                --}}{{-- categories--}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-aqua">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{ $categories_count ?? '' }}</h3>--}}

{{--                            <p>@lang('site.categories')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-bag"></i>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('dashboard.categories.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                --}}{{--products--}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-blue">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{ $products_count }}</h3>--}}

{{--                            <p>@lang('site.products')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-stats-bars"></i>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('dashboard.products.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                --}}{{--clients--}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-red">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{ $clients_count }}</h3>--}}

{{--                            <p>@lang('site.clients')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="fa fa-user"></i>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('dashboard.clients.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                --}}{{--orders--}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-green">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{ $orders_count }}</h3>--}}

{{--                            <p>@lang('site.orders')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="fa fa-users"></i>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('dashboard.orders.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}{{--suppliers--}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-yellow">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{ $suppliers_count }}</h3>--}}

{{--                            <p>@lang('site.suppliers')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="fa fa-users"></i>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('dashboard.suppliers.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}{{--orders_suppliers--}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-red">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{ $orders_suppliers_count }}</h3>--}}

{{--                            <p>@lang('site.orders_suppliers')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="fa fa-users"></i>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('dashboard.orders_suppliers.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}{{--users--}}
{{--                <div class="col-lg-3 col-xs-6">--}}
{{--                    <div class="small-box bg-blue">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>{{ $users_count }}</h3>--}}

{{--                            <p>@lang('site.users')</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="fa fa-users"></i>--}}
{{--                        </div>--}}
{{--                        <a href="{{ route('dashboard.users.index') }}" class="small-box-footer">@lang('site.read') <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}


            </div><!-- end of row -->


        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection

