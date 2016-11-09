<div class="modal fade" tabindex="-1" role="dialog" id="modal-main">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">{{$header}}</h5>
      </div>
      <div class="modal-body">
        <p>
          {{$message}}
        </p>
      </div>
      <div class="modal-footer">
        <div class="actions">
          @if (!isset($approve))
            <div class="ui approve button">
              Ok
            </div>
          @elseif (isset($delete) && $delete === true)
            <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteForm').submit();">
             {{$approve}}
            </button>
          @else
            <button type="button" class="btn btn-success dismiss-modal">
              {{$approve}}
            </button>
          @endif
          @if (!isset($cancel))
            <button type="button" class="btn btn-default dismiss-modal">
              Cancel
            </button>
          @else
            <button type="button" class="btn btn-default dismiss-modal">
              {{$cancel}}
            </button>
          @endif
        </div>
        @if (isset($delete) && $delete === true)
          {!! Form::open(['method' => 'DELETE', 'action' => [$action, $id], 'id' => 'deleteForm']) !!}
          {!! Form::close() !!}
        @endif
      </div>
    </div>
  </div>
</div>
