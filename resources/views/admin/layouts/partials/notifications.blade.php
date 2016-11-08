<div class="container-fluid">

  <div id="popup">
    @if (session()->has('alert'))
      {!!getAlertType()!!}
    @endif
    @if (count($errors) > 0)
      <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="header">
          <h4>{{trans('admin/forms.errors.message')}}</h4>
        </div>
        <ul class="list">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
  </div>

</div>
