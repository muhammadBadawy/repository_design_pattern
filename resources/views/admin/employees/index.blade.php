@extends('layouts.app')

@section('title', trans('employees.index').' '.trans('employees.model name') )

@section('content')
    <div class="container" style="@if (App::isLocale('ar')) direction: RTL; padding-right: 18%; @endif">
        <div class="row">
            <div class="col-md-9" style="@if (App::isLocale('ar')) float: right !important; @endif">
                <div class="card">
                    <h1><div class="card-header"> {{ trans('employees.model name cap') }}</div></h1>
                    <div class="card-body">
                        <a href="{{ url('/admin/employees/create') }}" class="btn btn-success btn-sm" title="Add New Employee">
                            <i class="fa fa-plus" aria-hidden="true"></i>{{ trans('employees.add new') }}
                        </a>


                        <form method="GET" action="{{ url('/admin/employees') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="{{ trans('employees.search') }}" value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                          <table class="table datatable-normal">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>{{ trans('employees.name') }}</th>
                                      <th>{{ trans('employees.email') }}</th>
                                      <th>{{ trans('employees.address') }}</th>
                                      <th>{{ trans('employees.phone') }}</th>
                                      <th>{{ trans('employees.branch') }}</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($employees as $employee)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{!! $employee->name !!}</td>
                                      <td>{!! $employee->email !!}</td>
                                      <td>{!! $employee->address !!}</td>
                                      <td>{!! $employee->phone !!}</td>
                                      <td>{!! $employee->branch->title !!}</td>
                                      <td>
                                        <a href="{{ url('/admin/employees/' . $employee->id) }}" title="View Employee"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> {{ trans('employees.view') }}</button></a>
                                          <a href="{{ url('/admin/employees/' . $employee->id . '/edit') }}" title="Edit Employee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('employees.edit') }}</button></a>
                                          <form method="POST" action="{{ url('/admin/employees' . '/' . $employee->id) }}" accept-charset="UTF-8" style="display:inline">
                                              {{ method_field('DELETE') }}
                                              {{ csrf_field() }}
                                              <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm(&quot;{{ trans('employees.confirm delete') }}&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('employees.delete') }}</button>
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@if (App::isLocale('ar'))
  @section('css')
    <style media="screen">
      tr > th {
        text-align: right;
      }
    </style>
  @stop
@endif
@section('js')
  <script>
    $(document).ready( function () {
      $('.datatable-normal').DataTable( {
        paging: false
        @if (App::isLocale('ar'))
        ,language: {
            "sEmptyTable":     "ليست هناك بيانات متاحة في الجدول",
            "sLoadingRecords": "جارٍ التحميل...",
            "sProcessing":   "جارٍ التحميل...",
            "sLengthMenu":   "أظهر _MENU_ مدخلات",
            "sZeroRecords":  "لم يعثر على أية سجلات",
            "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
            "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجل",
            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
            "sInfoPostFix":  "",
            "sSearch":       "بحث في الصفحة الحالية :",
            "sUrl":          "",
            "oPaginate": {
                "sFirst":    "الأول",
                "sPrevious": "السابق",
                "sNext":     "التالي",
                "sLast":     "الأخير"
            },
            "oAria": {
                "sSortAscending":  ": تفعيل لترتيب العمود تصاعدياً",
                "sSortDescending": ": تفعيل لترتيب العمود تنازلياً"
            }
        }
        @endif
      });
    });
  </script>
@stop
