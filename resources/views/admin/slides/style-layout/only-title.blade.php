<div class="form-group ">
    <x-admin.input :name="'content[title]'" :title="'Заголовок'" :id-count="2" is-required="true" value="{{ $currentSlide->content['title'] ?? '' }}"/>
</div>
