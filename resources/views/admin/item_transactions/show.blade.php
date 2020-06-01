@extends('layouts.app')

@section('title', trans('item_transactions.view').' '.trans('item_transactions.model name'))

@section('content')
    <div class="container" style="@if (App::isLocale('ar')) direction: RTL; padding-right: 18%; @endif">
        <div class="row">
            <div class="col-md-9" style="@if (App::isLocale('ar')) float: right !important; @endif">
                <div class="card">
                    <h1><div class="card-header">{{ trans('item_transactions.model name cap') }} {{ $item_transaction->id }}</div></h1>
                    <div class="card-body">

                        <a href="{{ url('/admin/item_transactions') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('item_transactions.back') }}</button></a>
                        <a href="{{ url('/admin/item_transactions/' . $item_transaction->id . '/edit') }}" title="Edit Item_transaction"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('item_transactions.edit') }}</button></a>

                        <form method="POST" action="{{ url('admin/item_transactions' . '/' . $item_transaction->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Item_transaction" onclick="return confirm(&quot;{{ trans('item_transactions.confirm delete') }}&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('item_transactions.delete') }}</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> {{ trans('item_transactions.item') }} </th><td> {!! $item_transaction->item->name !!} </td></tr>
                                    <tr><th> {{ trans('item_transactions.branch') }} </th><td> {!! $item_transaction->branch->title !!} </td></tr>
                                    <tr><th> {{ trans('item_transactions.employee') }} </th><td> {!! $item_transaction->employee->name or "non" !!} </td></tr>
                                    <tr><th> {{ trans('item_transactions.quantity') }} </th><td> {!! $item_transaction->quantity !!} </td></tr>
                                    <tr><th> {{ trans('item_transactions.type') }} </th><td> {{ $item_transaction->type == 1 ? 'Outgoing':'Incoming' }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
