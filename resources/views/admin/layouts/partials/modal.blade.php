<div class="ui modal">
  <div class="header">{{$header}}</div>
  <div class="content">
    <p>
      {{$message}}
    </p>
  </div>
  <div class="actions">
    @if (!isset($approve))
      <div class="ui approve button">
        Ok
      </div>
    @elseif (isset($delete) && $delete === true)
      <button type="button" class="ui approve negative button" onclick="document.getElementById('deleteForm').submit();">
       {{$approve}}
      </button>
    @else
      <div class="ui approve button">
        {{$approve}}
      </div>
    @endif
    @if (!isset($cancel))
      <div class="ui cancel button">
        Cancel
      </div>
    @else
      <div class="ui cancel button">
        {{$cancel}}
      </div>
    @endif
  </div>
  @if (isset($delete) && $delete === true)
    {{ Form::open(['method' => 'DELETE', 'action' => [$action, $id], 'id' => 'deleteForm']) }}
    {{ Form::close() }}
  @endif
</div>
