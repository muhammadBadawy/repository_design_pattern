@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{ url('/admin/branches') }}" class="btn btn-success btn-bg" title="Branches">
                        <i class="fa fa-plus" aria-hidden="true"></i>{{ trans('branches.model name cap') }}
                    </a>
                    <br>
                    <br>
                    <a href="{{ url('/admin/categories') }}" class="btn btn-primary btn-bg" title="Categories">
                        <i class="fa fa-plus" aria-hidden="true"></i>{{ trans('categories.model name cap') }}
                    </a>
                    <br>
                    <br>
                    <a href="{{ url('/admin/items') }}" class="btn btn-danger btn-bg" title="Items">
                        <i class="fa fa-plus" aria-hidden="true"></i>{{ trans('items.model name cap') }}
                    </a>
                    <br>
                    <br>
                    <a href="{{ url('/admin/employees') }}" class="btn btn-info btn-bg" title="Employees">
                        <i class="fa fa-plus" aria-hidden="true"></i>{{ trans('employees.model name cap') }}
                    </a>
                    <br>
                    <br>
                    <a href="{{ url('/admin/item_transactions') }}" class="btn btn-warning btn-bg" title="Item_transactions">
                        <i class="fa fa-plus" aria-hidden="true"></i>{{ trans('item_transactions.model name cap') }}
                    </a>
                    <br>
                    <br>
                    <a href="{{ url('/admin/item_branches') }}" class="btn btn-primary btn-bg" title="Item_branches">
                        <i class="fa fa-plus" aria-hidden="true"></i>{{ trans('item_branches.model name cap') }}
                    </a>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
