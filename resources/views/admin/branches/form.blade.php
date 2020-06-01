<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ trans('branches.title') }}</label>
    <input class="form-control" name="title" type="title" id="title" value="{{ isset($branch->title) ? $branch->title : ''}}" required>
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ trans('branches.address') }}</label>
    <textarea class="form-control" name="address" type="address" id="address" required>
      {{ isset($branch->address) ? $branch->address : ''}}
    </textarea>
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
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
