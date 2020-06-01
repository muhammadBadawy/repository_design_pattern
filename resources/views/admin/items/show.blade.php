@extends('layouts.app')

@section('title', trans('items.view').' '.trans('items.model name'))

@section('content')
    <div class="container" style="@if (App::isLocale('ar')) direction: RTL; padding-right: 18%; @endif">
        <div class="row">
            <div class="col-md-9" style="@if (App::isLocale('ar')) float: right !important; @endif">
                <div class="card">
                    <h1><div class="card-header">{{ trans('items.model name cap') }} {{ $item->id }}</div></h1>
                    <div class="card-body">

                        <a href="{{ url('/admin/items') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('items.back') }}</button></a>
                        <a href="{{ url('/admin/items/' . $item->id . '/edit') }}" title="Edit Item"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('items.edit') }}</button></a>

                        <form method="POST" action="{{ url('admin/items' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Item" onclick="return confirm(&quot;{{ trans('items.confirm delete') }}&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('items.delete') }}</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> {{ trans('items.name') }} </th><td> {!! $item->name !!} </td></tr>
                                    <tr><th> {{ trans('items.price') }} </th><td> {!! $item->price !!} </td></tr>
                                    <tr><th> {{ trans('items.cost') }} </th><td> {!! $item->cost !!} </td></tr>
                                    <tr><th> {{ trans('items.category') }} </th><td> {!! $item->category->body !!} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
