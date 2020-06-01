<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ trans('employees.name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($employee->name) ? $employee->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ trans('employees.email') }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($employee->email) ? $employee->email : ''}}" required>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ trans('employees.address') }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($employee->address) ? $employee->address : ''}}" required>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ trans('employees.phone') }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($employee->phone) ? $employee->phone : ''}}" required>
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('branch_id') ? 'has-error' : ''}}">
    <label for="branch_id" class="control-label">{{ trans('employees.branch_id') }}</label>
    {!! Form::select('branch_id', $branches, (isset($employee->branch_id) ? $employee->branch_id : NULL), ('required' == 'required') ? ['class' => 'form-control select2-normal', 'required' => 'required'] : ['class' => 'form-control select2-normal']) !!}

    {!! $errors->first('branch_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="@if (App::isLocale('ar')) {{ $formMode === 'Edit' ? 'تعديل' : 'انشاء' }} @else {{ $formMode === 'Edit' ? 'Edit' : 'Create' }} @endif">
</div>

@section('js')

//Select2
<script>
  $(document).ready(function() {
      $('.select2-normal').select2(
      @if (App::isLocale('ar')) {dir: "rtl"} @endif
      );
  });
</script>

//Ckeditor
<script>
  @if (App::isLocale('ar')) CKEDITOR.config.contentsLangDirection = 'rtl'; @endif

  var ckeditorIds = $('.ckeditor-norml').map(function(){
    return $(this).attr('id');
  }).get();
  $(document).ready(function() {
    for (var i = 0; i < ckeditorIds.length; i++) {
      CKEDITOR.replace( ckeditorIds[i] );
    }
  });
</script>

<script>
  $(document).ready( function () {
    $('.datatable-normal').DataTable( {
      paging: false
    });
  });
</script>

@stop
