@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>@lang('site.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li><a href="{{ route('tickets.index') }}"> @lang('site.tickets')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div><!-- end of box header -->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}
                        <div class="form-group">
                            <label>@lang('site.categories')</label>
                            <select name="user_id" class="form-control select2 searchable">
                                <option value="">@lang('site.users')</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach (config('translatable.locales') as $locale)
                            <div class="form-group">
                            @if(count(config('translatable.locales'))>1)
                                <label>@lang('site.' . $locale . '.name')</label>
                            @else
                            <label>@lang('site.name')</label>
                            @endif
                                <input type="text" name="{{ $locale }}[name]" class="form-control" value="{{ old($locale . '.name') }}">
                            </div>
                        @endforeach
                        <div class="form-group">
                            <label>@lang('site.deadline')</label>
                            <input type="date" name="deadline" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
