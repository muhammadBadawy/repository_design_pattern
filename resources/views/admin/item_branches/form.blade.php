<div class="form-group {{ $errors->has('branch_id') ? 'has-error' : ''}}">
    <label for="branch_id" class="control-label">{{ trans('item_branches.branch_id') }}</label>
    {!! Form::select('branch_id', $branches, (isset($item_branch->branch_id) ? $item_branch->branch_id : NULL), ('required' == 'required') ? ['class' => 'form-control select2-normal', 'required' => 'required'] : ['class' => 'form-control select2-normal']) !!}

    {!! $errors->first('branch_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('item_id') ? 'has-error' : ''}}">
    <label for="item_id" class="control-label">{{ trans('item_branches.item_id') }}</label>
    {!! Form::select('item_id', $items, (isset($item_branch->item_id) ? $item_branch->item_id : NULL), ('required' == 'required') ? ['class' => 'form-control select2-normal', 'required' => 'required'] : ['class' => 'form-control select2-normal']) !!}

    {!! $errors->first('item_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('initial_quantity') ? 'has-error' : ''}}">
    <label for="initial_quantity" class="control-label">{{ trans('item_branches.initial_quantity') }}</label>
    <input class="form-control" name="initial_quantity" type="text" id="initial_quantity" value="{{ isset($item_branch->initial_quantity) ? $item_branch->initial_quantity : ''}}" required>
    {!! $errors->first('initial_quantity', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('current_quantity') ? 'has-error' : ''}}">
    <label for="current_quantity" class="control-label">{{ trans('item_branches.current_quantity') }}</label>
    <input class="form-control" name="current_quantity" type="text" id="current_quantity" value="{{ isset($item_branch->current_quantity) ? $item_branch->current_quantity : ''}}" required>
    {!! $errors->first('current_quantity', '<p class="help-block">:message</p>') !!}
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
