<div class="form-group ">
    <x-admin.input :name="'content[title]'" :title="'Заголовок'" :id-count="1" is-required="true" value="{{ $currentSlide->content['title'] ?? '' }}"/>
</div>
<div class="form-group ">
    <x-admin.input :name="'content[description]'" :title="'Описание'" :id-count="2" is-required="true" value="{{ $currentSlide->content['description'] ?? '' }}"/>
</div>
