<fieldset class="mb-3" data-async="">
    <div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-row justify-content-between">
        <div class="d-flex flex-column">
            <div class="form-group">
                <x-admin.is-active :name="'item[is_active]'" :title="'Активность'" :help="'Показывать слайд на сайте или нет?'" value="{{ $currentSlide->is_active ?? '1' }}"/>
            </div>

            <div class="form-group ">
                <x-admin.input :name="'item[title]'" :title="'Название слайда'" :id-count="1" :is-required="'true'" value="{{ $currentSlide->title ?? '' }}"/>
            </div>
        </div>

        <div class="form-group w-50">
            <x-admin.cropper
                :title="'Фоновое изображение слайда'"
                :upload-text="'Загрузите изображение с вашего компьютера'"
                :browse-text="'Открыть'"
                :remove-text="'Удалить'"
                :crop-text="'Обрезать'"
                :close-text="'Закрыть'"
                :name="'item[image]'"
                :height="''"
                :width="''"
                :is-required="'true'"
                value="{{ $currentSlide->image ?? '' }}"
            />
        </div>
    </div>
</fieldset>

<fieldset class="mb-3" data-async="">
    <div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-row justify-content-between">
        <div class="d-flex flex-column w-100">
            <x-admin.select
                :name="'item[layout]'"
                :title="'Шаблон'"
                currentValue="{{ $currentSlide->layout ?? '' }}"
                :id-count="1"
                :optionsCount="4"
                :option1="'Заголовок/подзаголовок/две кнопки'" :value1="'/all-items'"
                :option2="'Заголовок/подзаголовок/одна кнопка'" :value2="'/all-items-one-btn'"
                :option3="'Заголовок/подзаголовок/'" :value3="'/without-btn'"
                :option4="'Заголовок'" :value4="'/only-title'"
            />
        </div>
    </div>
</fieldset>

<fieldset class="mb-3" data-async="">
    <div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-row justify-content-between">
        <div class="slide-style-layout-container" id="slide-style-layout-container">

        </div>
    </div>
</fieldset>

<script>

    function initSelectData(){
        //select slider value on load page
        let sliderLayoutStyleContainer = $('#slide-style-layout-container')
        $.ajax({
            method: 'get',
            url: $('#field-itemselect-1').val(),
            success: function (data) {
                sliderLayoutStyleContainer.slideUp('', function () {
                    sliderLayoutStyleContainer.html(data)
                    sliderLayoutStyleContainer.slideDown('')
                });
            }
        })
        //select slider value on change check
        $('#field-itemselect-1').on('change', function () {
            let sliderLayoutStyleContainer = $('#slide-style-layout-container')
            $.ajax({
                method: 'get',
                url: $(this).val(),
                success: function (data) {
                    sliderLayoutStyleContainer.slideUp('', function () {
                        sliderLayoutStyleContainer.html(data)
                        sliderLayoutStyleContainer.slideDown('')
                    });
                }
            })
        })
    }
    @if(URL::current() !== URL::previous() || URL::current() === URL::previous())
        initSelectData()
    @endif
</script>
