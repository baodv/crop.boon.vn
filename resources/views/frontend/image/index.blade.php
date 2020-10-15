<div class="upload__item js-upload-item-cs2wzrsolh6n07bd6et5mh" id="crop-image-{{ $imageId }}">
    <div class="upload-item__content">
        <div class="upload-image__crop" style="padding: 0px">
        	<img class="upload-item__image" src="{{ asset('storage/'.$full_path) }}" id="upload-image-cs2wzrsolh6n07bd6et5mh"> 
        </div>
        <img src="http://mitadi.com/images/frames/1.svg" class="frame__image--active">
        <div class="frame__image--warning hidden" id="js-warning-cs2wzrsolh6n07bd6et5mh" data-toggle="tooltip" data-placement="top" title="Chất lượng hình ảnh không tốt.">
        	<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
        </div>
    </div>
    <div class="upload-image__footer">
    	<button id="js-btn-edit-image-{{ $imageId }}" class="btn btn-warning btn-sm btn-edit-crop-image js-crop-image js-btn-edit-cs2wzrsolh6n07bd6et5mh" data-id="" data-origin="true">
    		<i class="fa fa-pen" aria-hidden="true"></i> Chỉnh Sửa
    	</button>
    	<button class="btn btn-danger btn-sm js-delete-image js-btn-delete-cs2wzrsolh6n07bd6et5mh" data-id="" data-delete-image-ur="{{ route('image.delete') }}">
    		<i class="fa fa-trash" aria-hidden="true"></i> Xóa
    	</button>
    </div>
</div>