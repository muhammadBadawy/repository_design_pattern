<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
    <label for="body" class="control-label">{{ trans('categories.body') }}</label>
    <input class="form-control" name="body" type="body" id="body" value="{{ isset($category->body) ? $category->body : ''}}" required>
    {!! $errors->first('body', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('available') ? 'has-error' : ''}}">
    <label for="available" class="control-label">{{ trans('categories.available') }}</label>
    <select class="form-control" name="available" id="available" required>
      <option {{ $category->available == 0 ? 'selected' : ''}} value="0">No</option>
      <option {{ $category->available == 1 ? 'selected' : ''}} value="1">Yes</option>
    </select>
    {!! $errors->first('available', '<p class="help-block">:message</p>') !!}
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
