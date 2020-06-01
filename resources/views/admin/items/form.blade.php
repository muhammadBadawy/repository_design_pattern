<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ trans('items.name') }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($item->name) ? $item->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ trans('items.price') }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($item->price) ? $item->price : ''}}" required>
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('cost') ? 'has-error' : ''}}">
    <label for="cost" class="control-label">{{ trans('items.cost') }}</label>
    <input class="form-control" name="cost" type="number" id="cost" value="{{ isset($item->cost) ? $item->cost : ''}}" required>
    {!! $errors->first('cost', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ trans('items.category_id') }}</label>
    {!! Form::select('category_id', $categories, (isset($item->category_id) ? $item->category_id : NULL), ('required' == 'required') ? ['class' => 'form-control select2-normal', 'required' => 'required'] : ['class' => 'form-control select2-normal']) !!}

    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
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
