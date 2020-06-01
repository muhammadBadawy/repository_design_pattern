@extends('layouts.app')

@section('title', trans('branches.view').' '.trans('branches.model name'))

@section('content')
    <div class="container" style="@if (App::isLocale('ar')) direction: RTL; padding-right: 18%; @endif">
        <div class="row">
            <div class="col-md-9" style="@if (App::isLocale('ar')) float: right !important; @endif">
                <div class="card">
                    <h1><div class="card-header">{{ trans('branches.model name cap') }} {{ $branch->id }}</div></h1>
                    <div class="card-body">

                        <a href="{{ url('/admin/branches') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('branches.back') }}</button></a>
                        <a href="{{ url('/admin/branches/' . $branch->id . '/edit') }}" title="Edit Branch"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('branches.edit') }}</button></a>

                        <form method="POST" action="{{ url('admin/branches' . '/' . $branch->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Branch" onclick="return confirm(&quot;{{ trans('branches.confirm delete') }}&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('branches.delete') }}</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> {{ trans('branches.title') }} </th><td> {!! $branch->title !!} </td></tr><th> {{ trans('branches.address') }} </th><td> {!! $branch->address !!} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
