<script>
    function inittData(){
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
        //cropper remove data after delete
        $('.cropper-remove').on('click', function (){
            $(this).removeClass('none-remove')
            $('.cropper-preview').attr('src', '').removeClass('none-remove')
        })
    }
    @if(URL::current() !== URL::previous() || URL::current() === URL::previous())
    inittData()
    @endif
</script>
