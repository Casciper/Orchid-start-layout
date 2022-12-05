@php
    use \App\Models\Slide;
    $slides = Slide::query()->pluck('title', 'id');
@endphp

<fieldset class="mb-3" data-async="">
    <div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-row justify-content-between">
        <div class="form-group">
            <div class="d-flex flex-column w-100">
                <select style="width: 250px" class="js-selectize" name="item[select_value]" id="123">
                    <option value=""
                            @if($currentSlide === null)
                                selected disabled hidden
                            @endif
                            >Выберите слайд</option>
                        @foreach($slides as $key => $slide)
                            @if($currentSlide !== null)
                                @if($currentSlide->select_value === $key)
                                    <option selected value="{{ $key }}">{{ $slide }}</option>
                                @else
                                    <option value="{{ $key }}">{{ $slide }}</option>
                                @endif
                            @else
                                <option value="{{ $key }}">{{ $slide }}</option>
                            @endif
                        @endforeach
                </select>
            </div>
        </div>
    </div>
</fieldset>
<fieldset class="mb-3" data-async="">
    <div class="bg-white rounded shadow-sm p-4 py-4 d-flex flex-row justify-content-between">
        <div class="d-flex flex-column">
            <div class="form-group">
                <x-admin.is-active :name="'item[is_active]'" :title="'Активность'" :help="'Показывать слайд на сайте или нет?'" value="{{ $currentSlide->is_active ?? '1' }}"/>
            </div>

            <div class="form-group ">
                <x-admin.input :name="'item[title]'" :title="'Название слайда'" :id-count="1" :is-required="'true'" value="{{ $currentSlide->title ?? '' }}"/>
            </div>

            <div class="form-group">
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

            <div class="form-group">
                <div class="slide-style-layout-container" id="slide-style-layout-container">

                </div>
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

<link rel="stylesheet" href="https://snipp.ru/cdn/selectize.js/0.12.6/dist/css/selectize.default.css">
<style type="text/css">
    .select_wrp {
        width: 300px;
        margin: 0 auto;
    }
</style>

<script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
<script src="https://snipp.ru/cdn/microplugin.js/src/microplugin.js"></script>
<script src="https://snipp.ru/cdn/sifter.js/sifter.min.js"></script>
<script src="https://snipp.ru/cdn/selectize.js/0.12.6/dist/js/selectize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.js-selectize').selectize();
    });
</script>
@include('components.admin.scripts.data')
