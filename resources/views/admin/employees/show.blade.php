@extends('layouts.app')

@section('title', trans('employees.view').' '.trans('employees.model name'))

@section('content')
    <div class="container" style="@if (App::isLocale('ar')) direction: RTL; padding-right: 18%; @endif">
        <div class="row">
            <div class="col-md-9" style="@if (App::isLocale('ar')) float: right !important; @endif">
                <div class="card">
                    <h1><div class="card-header">{{ trans('employees.model name cap') }} {{ $employee->id }}</div></h1>
                    <div class="card-body">

                        <a href="{{ url('/admin/employees') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{ trans('employees.back') }}</button></a>
                        <a href="{{ url('/admin/employees/' . $employee->id . '/edit') }}" title="Edit Employee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('employees.edit') }}</button></a>

                        <form method="POST" action="{{ url('admin/employees' . '/' . $employee->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm(&quot;{{ trans('employees.confirm delete') }}&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('employees.delete') }}</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> {{ trans('employees.name') }} </th><td> {!! $employee->name !!} </td></tr>
                                    <tr><th> {{ trans('employees.email') }} </th><td> {!! $employee->email !!} </td></tr>
                                    <tr><th> {{ trans('employees.address') }} </th><td> {!! $employee->address !!} </td></tr>
                                    <tr><th> {{ trans('employees.phone') }} </th><td> {!! $employee->phone !!} </td></tr>
                                    <tr><th> {{ trans('employees.branch') }} </th><td> {!! $employee->branch->title !!} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
