<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Page Title</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <base href="{{asset('')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/croppic.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">

    <script src="{{ asset('assets/js/jquery-2.1.3.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/jquery.mousewheel.min.js') }}"></script>
    <script src="{{ asset('assets/js/croppic.js') }}"></script>
</head>
<body>

<div class="setting-frame">

    <!-- frame -->
    <div class="container">
        <div class="frame">
            <div class="frame-content">
                <ul class="frame__list">
                    <li class="frame__item js-choose-frame " data-padding="0" data-id="3" data-frame="http://mitadi.com/images/frames/3.svg">
                        <img class="frame__image" src="http://mitadi.com/images/frames/3-thumb.png" alt="Đen">
                        <h3 class="frame-item__title">Đen</h3>
                    </li>
                    <li class="frame__item js-choose-frame " data-padding="20" data-id="4" data-frame="http://mitadi.com/images/frames/4.svg">
                        <img class="frame__image" src="http://mitadi.com/images/frames/4-thumb.png" alt="Đen Viền">
                        <h3 class="frame-item__title">Đen Viền</h3>
                    </li>
                    <li class="frame__item js-choose-frame  active " data-padding="0" data-id="1" data-frame="http://mitadi.com/images/frames/1.svg">
                        <img class="frame__image" src="http://mitadi.com/images/frames/1-thumb.png" alt="Trắng">
                        <h3 class="frame-item__title">Trắng</h3>
                    </li>
                    <li class="frame__item js-choose-frame " data-padding="20" data-id="2" data-frame="http://mitadi.com/images/frames/2.svg">
                        <img class="frame__image" src="http://mitadi.com/images/frames/2-thumb.png" alt="Trắng Viền">
                        <h3 class="frame-item__title">Trắng Viền</h3>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /frame -->

    <!-- upload image container -->
    <div class="container">
        <div class="upload-image-container">
            <div class="upload-image">
                <div class="upload__content">
                    <div class="upload__item">
                        <div class="upload__form" id="js-upload-image">
                            <div class="upload__from--middle">
                                <div class="upload__icon"><i class="fa fa-upload" aria-hidden="true"></i></div>
                                <p class="upload__label">Tải Ảnh Lên</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- upload image container -->
</div>

<!-- button order -->
<div class="setting-frame__order">
    <div class="container">
        <div class="order">
            <form action="http://mitadi.com/khung-anh" method="POST">
                @csrf<input type="hidden" name="order_id" value="819">
                <div class="order__content">
                    <button type="submit" class="order__button" id="js-btn-submit-order">Đặt Hàng</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /button order -->

<div class="form-upload">
    <form action="http://mitadi.com/upload-image" id="form-upload__form" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" id="upload-image" name="images[]" multiple>
        <input type="hidden" name="frame" id="frame-input" value="1">
    </form>
</div>
<!-- Modal -->
<div class="modal fade child-element-custom-display-none" id="crop-modal" tabindex="-1" role="dialog" aria-labelledby="crop-modal-title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header--crop">
                <h5 class="modal-title modal-title--crop" id="crop-modal-title">Modal Điều Chỉnh Hình Ảnh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-body--crop text-center">
                <div class="frame-crop" style="background-image: url('http://mitadi.com/images/frames/1.svg')">
                    <div class="frame-crop__content" id="crop-image-content">
                    </div>
                </div>
                <div class="crop-warning__content">
                    <p class="crop-warning__text"></p>
                </div>
            </div>
            <div class="modal-footer modal-footer--crop">
                <div class="row">
                    <div class="col-6 pl-0">
                        <button class="btn btn-reset-image js-reset-image" data-id="">
                            Khôi Phục Ảnh Gốc
                        </button>
                    </div>
                    <div class="col-6 text-right pr-0">
                        <button type="button" class="btn btn-primary js-done-edit">Chỉnh Sửa Xong</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header warning-modal__header">
                <h5 class="modal-title warning-modal__title">Cảnh Báo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="message-content" class="warning-modal__text"></p>
            </div>
        </div>
    </div>
</div>

<!-- Loading -->
<div class="loading" id="js-loading">Loading&#8230;</div>
<div class="site-mask"></div>
<aside class="panel--sidebar" id="panel-cart">
    <div class="panel__header">
        <h4>Đặt hàng ngay</h4><span class="panel__close"></span>
    </div>
    <div class="panel__content">
        <form action="" method="POST">
            @csrf
            <div class="ant-divider ant-divider-horizontal ant-divider-with-text-center" role="separator">
                <span class="ant-divider-inner-text">Thông tin giao hàng</span>
            </div>
            <div class="cart--mini">
                <div class="form-group">
                    <label for="fullname require">Họ tên</label>
                    <input id="fullname" class="form-control" type="text" name="fullname" placeholder="Nhập họ tên">
                </div>
                <div class="form-group">
                    <label for="phone require">Số điện thoại</label>
                    <input id="phone" class="form-control" type="text" name="phone" placeholder="Nhập số điện thoại">
                </div>
                <div class="form-group">
                    <label for="address require">Địa chỉ</label>
                    <input id="address" class="form-control" type="text" name="address" placeholder="Nhập địa chỉ">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" placeholder="Nhập Email">
                </div>
            </div>
        </form>

    </div>
</aside>

<!-- /Loading -->
    <script>
        function displayLoading() {
            $('#js-loading').show();
        }

        function hideLoading() {
            $('#js-loading').hide();
        }

        var uploadFrameImageUrl = "{{ route('image.upload') }}";
        var frameImagePath = "{{ asset('assets/images/1.svg') }}";
        var framePadding = "0";
        var cropImageUrl = "{{ route('image.crop') }}"
        $(document).ready(function () {
            /* ===========================================+
            *  Load tooltip
            * ============================================*/
            $("body").tooltip({ selector: '[data-toggle=tooltip]' });

            /* ===========================================+
             *  Handle trigger upload image
             * ============================================*/
            $('#js-upload-image').click(function () {
                $('#upload-image').trigger('click');
            });

            /* ===========================================+
             *  Process change frame
             * ============================================*/
            $('.js-choose-frame').click(function () {
                var frameUrl = $(this).data('frame');
                var frameId = $(this).data('id');
                var padding = $(this).data('padding');
                padding = parseInt(padding);
                $('.frame__item').removeClass('active');
                $(this).addClass('active');
                $('#frame-input').val(frameId);
                processChangeFrame(frameId, frameUrl, padding)
            });

            /* ===========================================+
             *  Process delete the image
             * ============================================*/
            $(document).on('click', '.js-delete-image', function () {
                var imageId = $(this).data('id');
                processDeleteImage(imageId);
            });

            /* ===========================================+
            *  Process upload the image
            * ============================================*/
            $(document).on('input, change', '#upload-image', function () {
                var files = $('#upload-image')[0].files
                $.each(files, function(key, file) {
                    uploadFrameImage(file);
                });
            });

            /* ===========================================+
             *  Reset the image
             * ============================================*/
            $(document).on('click' ,'.js-reset-image',function () {
                var imageId = $(this).data('id');
                processResetImage(imageId);
            });

            /* ===========================================+
             *  Process the crop image
             * ============================================*/
            $(document).on('click', '.js-crop-image', function () {
                var image = $(this).data('image');
                var message = $(this).data('message');
                var imageId = $(this).data('id');
                var origin = $(this).data('origin');
                var url = cropImageUrl.replace(0, imageId);

                var activeFrame = $('.frame__list .active');
                var frame = activeFrame.data('frame');
                var padding = activeFrame.data('padding');

                $('.js-reset-image').data('id', imageId);

                $('.frame-crop').css({'background-image': 'url(\'' + frame + '\')'});
                var cropImage = $('#crop-image-content');
                cropImage.css({padding: padding});
                cropImage.html('');
                $('#crop-image-id').val(imageId);
                $('#crop-modal').modal('show');
                $('.crop-warning__text').html(message);
                var cropperOptions = {
                    cropUrl: url,
                    zoomFactor: 10,
                    doubleZoomControls: false,
                    rotateFactor: 10,
                    rotateControls: true,
                    loadPicture: image,
                    onAfterImgUpload: function(){
                        if (origin == false) {
                            var cropImageContent = $('#crop-image-content');
                            var width = cropImageContent.width();
                            var height = cropImageContent.height();
                            cropImageContent.find('img').css({width: width});
                            cropImageContent.find('img').css({height: height});
                            cropImageContent.find('img').css({left: 0});
                            cropImageContent.find('img').css({top: 0});
                        }
                    },
                    onBeforeImgCrop: function(){
                        displayLoading();
                    },
                    onAfterImgCrop: function (response) {
                        if (response.status) {
                            var imageUrl = response.imageUrl;
                            var cropImage =  $('#crop-image-' + imageId);
                            cropImage.find('.upload-item__image').attr('src', imageUrl);
                            cropImage.find('.js-crop-image').attr('src', imageUrl);
                            cropImage.find('.js-crop-image').data('image', imageUrl);

                            var btnEdit =  $('#js-btn-edit-image-' + imageId);
                            btnEdit.data('origin', false);
                        }
                        hideLoading();
                        $('#crop-modal').modal('hide');
                    },
                }
                var cropperHeader = new Croppic('crop-image-content', cropperOptions);
            })


            $('.js-done-edit').on('click', function () {
                $('.cropControlsCrop').find('.cropControlCrop').trigger('click');
            });
        });

        /**
         * Function help to generate id
         */
        function generateId() {
            return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
        }

        /**
         * Function help to generate html frame
         */
        function generateFrameHtml(id) {
            var html = '<div class="upload__item js-upload-item-' + id + '" id="">';

            html += '<div class="upload-item__content">';
            html += '<div class="upload-image__crop" style="padding: ' + framePadding + 'px">';
            html += '<img class="upload-item__image" src="http://mitadi.com/images/loading.gif" id="upload-image-' + id + '">';
            html += ' </div>';
            html += '<img src="' + frameImagePath + '" class="frame__image--active">';
            html += '<div class="frame__image--warning hidden" id="js-warning-' + id + '" data-toggle="tooltip" data-placement="top" title="Chất lượng hình ảnh không tốt.">';
            html += '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>';
            html += '</div>'
            html += '</div>';

            html += '<div class="upload-image__footer">'
            html += '<button id="" class="btn btn-warning btn-sm btn-edit-crop-image js-crop-image js-btn-edit-' + id + '" data-id="" data-origin="true">';
            html += '<i class="fa fa-pen" aria-hidden="true"></i> Chỉnh Sửa';
            html += '</button>';
            html += '<button class="btn btn-danger btn-sm js-delete-image js-btn-delete-' + id + '" data-id="" ' +
                'data-delete-image-ur="http://mitadi.com/delete-image">';
            html += '<i class="fa fa-trash" aria-hidden="true"></i> Xóa';
            html += '</button>';
            html += '</div>';

            html += '</div>';

            return html;
        }

        /**
         * Function help to update the frame Image
         */
        function updateFrameImage(id, response) {
            var frameGroup = $('.js-upload-item-' + id);
            var warning = $('#js-warning-' + id);
            var btnEdit = $('.js-btn-edit-' + id);
            var btnDelete = $('.js-btn-delete-' + id);
            var uploadImage = $('#upload-image-' + id);
            frameGroup.attr('id', 'crop-image-' + response.imageId);
            if (response.hasBadImage == true) {
                warning.removeClass('hidden');
            }
            btnEdit.attr('id', 'js-btn-edit-image-' + response.imageId);
            btnEdit.data('id', response.imageId);
            btnEdit.data('image', response.imagePath);
            btnDelete.data('id', response.imageId);
            uploadImage.attr('src', response.imagePath);
        }

        /**
         * Function help to upload image file
         */
        function uploadFrameImage(file) {
            var formData = new FormData();
            formData.append('images[]', file);
            formData.append('frame', $('#frame-input').val());
            var id = generateId();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: uploadFrameImageUrl,
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    var html = generateFrameHtml(id);
                    $('.upload__content .upload__item:last').before(html);
                },
                success: function (response) {
                    updateFrameImage(id, response);
                    $('#upload-image').val('');
                },
                error: function (xhr) {
                    hideLoading();
                    var errors = xhr.responseJSON.errors;
                    $.each(errors, function (key, value) {
                        $('#message-content').html(value[0]);
                    })
                    $('#warning-modal').modal('show');
                }
            });
        }

        /**
         * Function help to process reset the image
         * @param  imageId
         */
        function processResetImage(imageId) {
            displayLoading();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('image.reset') }}",
                type: 'POST',
                data: {
                    image_id: imageId
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.status) {
                        var imageUrl = response.imageUrl;
                        var cropElement = '#crop-image-' + imageId;
                        $(cropElement).find('.upload-item__image').attr('src',  imageUrl);
                        $(cropElement).find('.js-crop-image').data('image',  imageUrl);

                        var btnEdit =  $('#js-btn-edit-image-' + imageId);
                        btnEdit.data('origin', true);
                    }
                    hideLoading();
                    $('#crop-modal').modal('hide');
                }
            });
        }

        /**
         * Function help to process change frame
         * @param  frameId
         * @param  frameUrl
         * @param  padding
         */
        function processChangeFrame(frameId, frameUrl, padding) {
            displayLoading();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('image.change.frame') }}",
                type: 'POST',
                data: {
                    frame: frameId
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.status) {
                        $('.upload-item__content').each(function () {
                            $(this).find('.frame__image--active').attr('src', frameUrl);
                            $(this).find('.upload-image__crop').css({padding: padding + 'px'});
                        });
                    }
                    frameImagePath = frameUrl;
                    framePadding = padding;
                    hideLoading();
                }
            });
        }

        /**
         * Function help to process delete the image
         * @param  imageId
         */
        function processDeleteImage(imageId) {
            displayLoading();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('image.delete') }}",
                type: 'POST',
                data: {
                    image_id: imageId
                },
                dataType: "JSON",
                success: function (response) {
                    if (response.status) {
                        $('#crop-image-' + imageId).remove();
                    }
                    hideLoading();
                }
            });
        }


        function togglePanel() {
            $('.panel-trigger').on('click', function(e) {
                e.preventDefault();
                let target = $(this).attr('href');
                $(target).addClass('active');
                $(target).siblings('.panel--sidebar').removeClass('active');
                $('.site-mask').addClass('active');
                $('body').css('overflow', 'hidden');
            });
            $('.panel--sidebar .panel__close').on('click', function(e) {
                e.preventDefault();
                $(this).closest('.panel--sidebar').removeClass('active');
                $('.site-mask').removeClass('active');
                $('body').css('overflow', 'auto');
            });
        }
        $(function() {
            togglePanel();
        });
    </script>
</body>
</html>
