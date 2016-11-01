<div class="ui container">

  <div class="notifications" id="popup">
    @if (session()->has('alert'))
      {!!getAlertType()!!}
    @endif
    @if (count($errors) > 0)
      <div class="ui error message">
        <i class="close icon"></i>
        <div class="header">
          {{trans('admin/forms.errors.message')}}
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
