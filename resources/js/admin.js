//sidebar aside animation
if ($(window).width() > 768) {
    $('.header-toggler').removeClass('d-md-none').addClass('closed').css({width: 40 + 'px'})
    $('.header-toggler').attr('data-bs-target', '')

    function hideMenu() {
        $('.aside .text-muted').hide()
        $('.aside .nav-item span').hide()
        $('.aside .badge').hide()

        function hideOrOpen() {
            $(document).on('click', '.header-toggler', function () {

                if ($(this).hasClass('closed')) {
                    localStorage.setItem('aside', 'opened');
                    $('.aside').addClass('opened')
                    $(this).removeClass('closed')
                    $('.aside .text-muted').show('fast')
                    $('.aside .nav-item span').show('fast')
                    $('.aside .badge').show('fast')
                    $('#headerMenuCollapse .ms-auto').show()
                    $('.header-toggler span').html(' Закрыть ').show()
                    $('.header-toggler').css({width: 280 + 'px'})
                    return
                }

                localStorage.setItem('aside', 'closed');
                $('.aside').removeClass('opened')
                $(this).addClass('closed')
                $('.aside .text-muted').hide('fast')
                $('.aside .nav-item span').hide('fast')
                $('.aside .badge').hide('fast')
                $('.header-toggler span').html(' Закрыть ').hide()
                $('#headerMenuCollapse .ms-auto').hide()
                $('.header-toggler').css({width: 40 + 'px'})
            })
        }

        hideOrOpen()
    }

    hideMenu()
} else {
    $('.header-toggler').attr('data-bs-target', '#headerMenuCollapse')
    $('.aside').css({
        width: 100 + '%',
        minWidth: 100 + '%',
        maxWidth: 100 + '%',
    })

    $('.aside').addClass('opened')
    $(this).removeClass('closed')
    $('.aside .text-muted').show('fast')
    $('.aside .nav-item span').show('fast')
    $('.aside .badge').show('fast')
    $('#headerMenuCollapse .ms-auto').show()
    $('.header-toggler span').html(' Закрыть ').show()
    $('.header-toggler').css({width: 280 + 'px'})
    $('.header-toggler').removeClass('closed')
}

//is active check value
$('.is_active-check').on('click', function () {
    if ($(this).val() === '0') {
        $(this).val('1')
        return
    }
    $(this).val('0')
})
//tr table list link
$(document).on('click', '.table-link', function (e){
    if ($(this)){
        window.location.href = $(this).find($('.btn.btn-link')).attr('href')
    }
}).on('click', '.btn.btn-success, .btn.btn-danger', function(e) {
    e.stopPropagation();
})
