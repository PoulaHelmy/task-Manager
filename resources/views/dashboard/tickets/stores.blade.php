@extends('layouts.dashboard.app')

@section('content')

 <div class="content-wrapper">

    <section class="content-header">

        <h1>@lang('site.prod_stores')</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="{{ route('dashboard.products.index') }}">@lang('site.products')</a></li>
            <li class="active">@lang('site.prod_stores')</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">

            <div class="col-md-6">

                <div class="box box-primary">

                    <div class="box-header">

                    </div><!-- end of box header -->

                    <div class="box-body">
                     <h3 class="box-title">@lang('site.stores')</h3>
                     
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>

                                <th>@lang('site.add')</th>
                            </tr>

                                @foreach ($all_stores as $store)
                                    <tr>
                                        <td>{{ $store->id }}</td>
                                        <td>{{ $store->name }}</td>

                                        <td>
                                            <button href=""
                                                id="store-{{ $store->id }}"
                                                data-name="{{ $store->name }}"
                                                data-id="{{ $store->id }}"
                                                data-product_id = "{{ $product->id }}"
                                                class="btn {{ in_array($store->id, $product->stores->pluck('id')->toArray()) ? 'btn-default hidden' : 'btn-success add-store-btn' }} btn-sm">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                        </table><!-- end of table -->
                    </div><!-- end of box body -->

                </div><!-- end of box -->

            </div><!-- end of col -->

            <div class="col-md-6">

                <div class="box box-primary">

                    <div class="box-header">

                        <h3 class="box-title">@lang('site.prod_stores')</h3>

                    </div><!-- end of box header -->

                    <div class="box-body">

                        @include('partials._errors')

                        <form action="{{ route('dashboard.product.update_stores', $product->id) }}" method="post">

                            {{ csrf_field() }}
                            {{ method_field('put') }}

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>@lang('site.store')</th>
                                    <th>@lang('site.first_stock')</th>
                                    <th>@lang('site.stock')</th>

                                </tr>
                                </thead>

                                <tbody class="order-list">

                                @foreach ($products as $store)
                                    <tr>
                                        <td>{{ $store->name }}</td>
                                        <td><input type="number" name="stores[{{ $store->id }}][first_stock]" data-first_stock="{{ number_format($store->first_stock, 2) }}" class="form-control input-sm first_stock" min="0" value="{{ $store->pivot->first_stock }}"></td>
                                        <td><input type="number" name="stores[{{ $store->id }}][stock]" data-stock="{{ number_format($store->stock, 2) }}" class="form-control input-sm stock" min="0" value="{{ $store->pivot->stock }}"></td>
                                        <td><input type="number" name="stores[{{ $store->id }}][product_id]" data-stock="{{ number_format($store->product_id, 2) }}" class="form-control input-sm product_id hidden" min="0" value="{{ $store->pivot->product_id }}"></td>
                                        <!-- <td><input type="number" name="stores[{{ $store->id }}][store_id]" data-stock="{{ number_format($store->store_id, 2) }}" class="form-control input-sm store_id hidden" min="0" value="{{ $store->pivot->store_id }}"></td> -->


                                        <td>
                                            <button class="btn btn-danger btn-sm remove-store-btn" data-id="{{ $store->id }}"><span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table><!-- end of table -->

                            <button class="btn btn-primary btn-block" id="form-btn"><i class="fa fa-edit"></i> @lang('site.edit_stock')</button>

                        </form><!-- end of form -->

                    </div><!-- end of box body -->

                </div><!-- end of box -->


            </div><!-- end of col -->

        </div><!-- end of row -->

    </section><!-- end of content -->

</div><!-- end of content wrapper -->

@endsection

