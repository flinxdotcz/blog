<div class="ui long modal image-upload">
  <div class="header">
    {{trans('admin/modals.images.upload.header')}}
  </div>
  <div class="content">
    {!! Form::open(['action' => '\App\Http\Controllers\Admin\ImagesController@store', 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
      {!! Form::hidden('image-url', false, ['id' => 'image-url']) !!}
    {!! Form::close() !!}
    @if (Auth::user()->images)
      <div class="ui hidden divider"></div>
      <h3 class="ui header">
        {{trans('admin/modals.images.upload.recent')}}
      </h3>
      <div class="ui hidden divider"></div>
      <div class="images-index">
        <div class="ui grid">
          <div class="four column row">
            @foreach (Auth::user()->images->take(10) as $image)
              <div class="column">
                <a href="#" class="ui small image chooseImage">
                  <img src="{{$image->url}}" id="{{$image->id}}" alt="{{$image->name}}" />
                </a>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    @endif
  </div>
  <div class="actions">
    <div class="ui cancel button">
      {{trans('admin/modals.all.cancel')}}
    </div>
  </div>
  <input type="hidden" id="image-url" value="">
</div>
