@props([
    'title',
    'uploadText',
    'browseText',
    'removeText',
    'cropText',
    'closeText',
    'name',
    'width',
    'height',
    'isRequired' => 'false',
    'value' => '/'
])
<label for="field-itemtitle-7930a46f20f3253599fe479e60ec8998e71293eb" class="form-label">
    {{ $title }}
    @if($isRequired === 'true')
        <sup class="text-danger">*</sup>
    @endif
</label>
<div data-controller="cropper"
     data-cropper-value=""
     data-cropper-storage="local"
     data-cropper-width="{{ $width }}"
     data-cropper-height="{{ $height }}"
     data-cropper-min-width="0"
     data-cropper-min-height="0"
     data-cropper-max-width="Infinity"
     data-cropper-max-height="Infinity"
     data-cropper-target="url"
     data-cropper-url=""
     data-cropper-accepted-files="image/*"
     data-cropper-max-file-size="2"
     data-cropper-groups=""
     data-cropper-path="">
    <div class="border-dashed text-end p-3 cropper-actions">

        <div class="fields-cropper-container">
            <img src="#" class="cropper-preview img-fluid img-full mb-2 border none" alt="">
        </div>

        <span class="mt-1 float-start">{{ $uploadText }}</span>

            <div class="btn-group">
                <label class="btn btn-default m-0">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="1em" height="1em" viewBox="0 0 32 32" class="me-2" role="img" fill="currentColor" id="field-itemtitle-28806a3f1d8f2b52528de56e9fd019aa368e654f" path="cloud-upload" componentname="orchid-icon">
                        <path d="M23.845 8.124c-1.395-3.701-4.392-6.045-8.921-6.045-5.762 0-9.793 4.279-10.14 9.86-2.778 0.889-4.784 3.723-4.784 6.933 0 3.93 3.089 7.249 6.744 7.249h2.889c0.552 0 1-0.448 1-1s-0.448-1-1-1h-2.889c-2.572 0-4.776-2.404-4.776-5.249 0-2.514 1.763-4.783 3.974-5.163l0.907-0.156-0.080-0.916-0.008-0.011c0-4.871 3.205-8.545 8.161-8.545 3.972 0 6.204 1.957 7.236 5.295l0.214 0.688 0.721 0.015c3.715 0.078 6.972 3.092 6.972 6.837 0 3.408-2.259 7.206-5.678 7.206h-2.285c-0.552 0-1 0.448-1 1s0.448 1 1 1l2.277-0.003c5-0.132 7.605-4.908 7.605-9.203 0-4.616-3.617-8.305-8.14-8.791zM16.75 16.092c-0.006-0.006-0.008-0.011-0.011-0.016l-0.253-0.264c-0.139-0.146-0.323-0.219-0.508-0.218-0.184-0.002-0.368 0.072-0.509 0.218l-0.253 0.264c-0.005 0.005-0.006 0.011-0.011 0.016l-3.61 3.992c-0.28 0.292-0.28 0.764 0 1.058l0.252 0.171c0.28 0.292 0.732 0.197 1.011-0.095l2.128-2.373v10.076c0 0.552 0.448 1 1 1s1-0.448 1-1v-10.066l2.199 2.426c0.279 0.292 0.732 0.387 1.011 0.095l0.252-0.171c0.279-0.293 0.279-0.765 0-1.058z"></path>
                    </svg>

                    {{ $browseText }}
                    <input type="file" accept="image/*" data-cropper-target="upload" data-action="change->cropper#upload click->cropper#openModal" class="d-none">
                </label>

                <button type="button" class="btn btn-outline-danger cropper-remove" data-action="cropper#clear">{{ $removeText }}</button>
            </div>

        <input type="file" accept="image/*" class="d-none">
    </div>

    <input class="cropper-path d-none"
           type="text"
           data-cropper-target="source"
           @if($isRequired === 'true') required="required" @endif
           target="url"
           name="{{ $name }}"
           value="{{ $value }}"
    >

    <div class="modal" role="dialog">
        <div class="modal-dialog modal-fullscreen-md-down modal-lg">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="position-relative">
                        <img class="upload-panel" width="0" height="0">
                    </div>

                    <div class="modal-footer">

                            <button type="button" class="btn btn-link" data-bs-dismiss="modal">
                                {{ $closeText }}
                            </button>

                            <button type="button" class="btn btn-default" data-action="cropper#crop">
                                {{ $cropText }}
                            </button>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
