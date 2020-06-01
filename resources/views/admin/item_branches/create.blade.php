@extends('layouts.app')

@section('title', trans('item_branches.create').' '.trans('item_branches.model name'))

@section('content')
    <div class="container" style="@if (App::isLocale('ar')) direction: RTL; padding-right: 18%; @endif">
        <div class="row">
            <div class="col-md-9" style="@if (App::isLocale('ar')) float: right !important; @endif">
                <div class="card">
                    <h1><div class="card-header">Item_branch</div></h1>
                    <div class="card-body">
                        <a href="{{ url('/admin/item_branches') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('item_branches.back') }}</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/item_branches') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.item_branches.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
