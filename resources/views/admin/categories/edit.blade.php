@extends('layouts.app')

@section('title', trans('categories.edit').' '.trans('categories.model name'))

@section('content')
    <div class="container" style="@if (App::isLocale('ar')) direction: RTL; padding-right: 18%; @endif">
        <div class="row">
            <div class="col-md-9" style="@if (App::isLocale('ar')) float: right !important; @endif">
                <div class="card">
                    <h1><div class="card-header">Category</div></h1>
                    <div class="card-body">
                        <a href="{{ url('/admin/categories') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('categories.back') }}</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/categories/' . $category->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.categories.form', ['formMode' => 'Edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
