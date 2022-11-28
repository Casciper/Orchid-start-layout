<div class="form-group ">
    <x-admin.input :name="'content[title]'" :title="'Заголовок'" :id-count="2" is-required="true" value="{{ $currentSlide->content['title'] ?? '' }}"/>
</div>
<div class="form-group ">
    <x-admin.input :name="'content[description]'" :title="'Описание'" :id-count="3" is-required="true" value="{{ $currentSlide->content['description'] ?? '' }}"/>
</div>
<div class="form-group ">
    <x-admin.input :name="'content[first_btn]'" :title="'Текст первой кнопки'" :id-count="4" is-required="true" value="{{ $currentSlide->content['first_btn'] ?? '' }}"/>
</div>
<div class="form-group ">
    <x-admin.input :name="'content[second_btn]'" :title="'Текст второй кнопки'" :id-count="5" is-required="true" value="{{ $currentSlide->content['second_btn'] ?? '' }}"/>
</div>
