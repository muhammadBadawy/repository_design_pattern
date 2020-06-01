@extends('layouts.app')

@section('title', trans('branches.index').' '.trans('branches.model name') )

@section('content')
    <div class="container" style="@if (App::isLocale('ar')) direction: RTL; padding-right: 18%; @endif">
        <div class="row">
            <div class="col-md-9" style="@if (App::isLocale('ar')) float: right !important; @endif">
                <div class="card">
                    <h1><div class="card-header"> {{ trans('branches.model name cap') }}</div></h1>
                    <div class="card-body">
                        <a href="{{ url('/admin/branches/create') }}" class="btn btn-success btn-sm" title="Add New Branch">
                            <i class="fa fa-plus" aria-hidden="true"></i>{{ trans('branches.add new') }}
                        </a>


                        <form method="GET" action="{{ url('/admin/branches') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="{{ trans('branches.search') }}" value="{{ request('search') }}">
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
                                      <th>#</th><th>{{ trans('branches.title') }}</th><th>{{ trans('branches.address') }}</th><th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($branches as $item)
                                  <tr>
                                      <td>{{ $loop->iteration }}</td>
                                      <td>{!! $item->title !!}</td>
                                      <td>{!! $item->address !!}</td>
                                      <td>
                                        <a href="{{ url('/admin/branches/' . $item->id) }}" title="View Branch"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> {{ trans('branches.view') }}</button></a>
                                          <a href="{{ url('/admin/branches/' . $item->id . '/edit') }}" title="Edit Branch"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ trans('branches.edit') }}</button></a>
                                          <form method="POST" action="{{ url('/admin/branches' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                              {{ method_field('DELETE') }}
                                              {{ csrf_field() }}
                                              <button type="submit" class="btn btn-danger btn-sm" title="Delete Branch" onclick="return confirm(&quot;{{ trans('branches.confirm delete') }}&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> {{ trans('branches.delete') }}</button>
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
