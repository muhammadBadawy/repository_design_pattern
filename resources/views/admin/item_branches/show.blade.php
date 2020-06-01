@extends('layouts.app')

@section('title', trans('item_branches.view').' '.trans('item_branches.model name'))

@section('content')
    <div class="container" style="@if (App::isLocale('ar')) direction: RTL; padding-right: 18%; @endif">
        <div class="row">
            <div class="col-md-9" style="@if (App::isLocale('ar')) float: right !important; @endif">
                <div class="card">
                    <h1><div class="card-header">{{ trans('item_branches.model name cap') }} {{ $item_branch->id }}</div></h1>
                    <div class="card-body">

                        <a href="{{ url('/admin/item_branches') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('item_branches.back') }}</button></a>
                        <a href="{{ url('/admin/item_branches/' . $item_branch->id . '/edit') }}" title="Edit Item_branch"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('item_branches.edit') }}</button></a>

                        <form method="POST" action="{{ url('admin/item_branches' . '/' . $item_branch->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Item_branch" onclick="return confirm(&quot;{{ trans('item_branches.confirm delete') }}&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('item_branches.delete') }}</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> {{ trans('item_branches.item') }} </th><td> {!! $item_branch->item->name !!} </td></tr>
                                    <tr><th> {{ trans('item_branches.branch') }} </th><td> {!! $item_branch->branch->title !!} </td></tr>
                                    <tr><th> {{ trans('item_branches.initial_quantity') }} </th><td> {!! $item_branch->initial_quantity !!} </td></tr>
                                    <tr><th> {{ trans('item_branches.current_quantity') }} </th><td> {!! $item_branch->current_quantity !!} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
