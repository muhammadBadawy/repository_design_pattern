<div class="form-group {{ $errors->has('branch_id') ? 'has-error' : ''}}">
    <label for="branch_id" class="control-label">{{ trans('item_transactions.branch_id') }}</label>
    {!! Form::select('branch_id', $branches, (isset($item_transaction->branch_id) ? $item_transaction->branch_id : NULL), ('required' == 'required') ? ['class' => 'form-control select2-normal', 'required' => 'required'] : ['class' => 'form-control select2-normal']) !!}

    {!! $errors->first('branch_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
    <label for="item_id" class="control-label">{{ trans('item_transactions.item_id') }}</label>
    {!! Form::select('item_id', $items, (isset($item_transaction->item_id) ? $item_transaction->item_id : NULL), ('required' == 'required') ? ['class' => 'form-control select2-normal', 'required' => 'required'] : ['class' => 'form-control select2-normal']) !!}

    {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('employee_id') ? 'has-error' : ''}}">
    <label for="employee_id" class="control-label">{{ trans('item_transactions.employee_id') }}</label>
    {!! Form::select('employee_id', $employees, (isset($item_transaction->employee_id) ? $item_transaction->employee_id : NULL), ('required' == 'required') ? ['class' => 'form-control select2-normal', 'required' => 'required'] : ['class' => 'form-control select2-normal']) !!}

    {!! $errors->first('employee_id', '<p class="help-block">:message</p>') !!}
</div>

@if($formMode === 'create')
  <div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
      <label for="quantity" class="control-label">{{ trans('item_transactions.quantity') }}</label>
      <input class="form-control" name="quantity" type="text" id="quantity" value="{{ isset($item_transaction->quantity) ? $item_transaction->quantity : ''}}" required>
      {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
  </div>
@else
  <input class="form-control" name="quantity" type="hidden" id="quantity" value="{{ isset($item_transaction->quantity) ? $item_transaction->quantity : ''}}" required>
@endif

<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ trans('item_transactions.type') }}</label>
    <select class="form-control" name="type" id="type" required>
      <option {{ isset($item_transaction) && $item_transaction->type == 0 ? 'selected' : ''}} value="0">Incoming</option>
      <option {{ isset($item_transaction) && $item_transaction->type == 1 ? 'selected' : ''}} value="1">Outgoing</option>
    </select>
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
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
