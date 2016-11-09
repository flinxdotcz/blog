<div class="modal fade" id="image-upload" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">{{trans('admin/modals.images.upload.header')}}</h5>
      </div>
      <div class="modal-body">
        <div>
          <ul class="nav nav-tabs " role="tablist">
            <li role="presentation" class="active">
              <a href="#gallery" aria-controls="gallery" role="tab" data-toggle="tab">
                {{trans('admin/modals.images.upload.tabs.gallery')}}
              </a>
            </li>
            <li role="presentation">
              <a href="#upload" aria-controls="upload" role="tab" data-toggle="tab">
                {{trans('admin/modals.images.upload.tabs.upload')}}
              </a>
            </li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="gallery">
              @if (Auth::user()->images)
                <h4>{{trans('admin/modals.images.upload.recent')}}</h4>
                <div class="row">
                  @foreach (Auth::user()->images->take(10) as $image)
                    <div class="col-xs-3">
                      <a href="#" class="thumbnail chooseImage">
                        <img src="{{$image->url}}" id="{{$image->id}}" alt="{{$image->name}}" />
                      </a>
                    </div>
                  @endforeach
                </div>
              @endif
            </div>
            <div role="tabpanel" class="tab-pane" id="upload">
              <div class="row">
                <div class="col-xs-12">
                  {!! Form::open(['action' => '\App\Http\Controllers\Admin\ImagesController@store', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
                  {!! Form::hidden('image-url', false, ['id' => 'image-url']) !!}
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">
          {{trans('admin/modals.all.done')}}
        </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">
          {{trans('admin/modals.all.cancel')}}
        </button>
      </div>
    </div>
  </div>
  <input type="hidden" id="image-url" value="">
</div>
