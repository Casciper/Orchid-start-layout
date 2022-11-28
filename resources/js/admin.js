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
                    $('.switch').css({left: 15 + 'px'})
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
                $('.switch').css({left: 4 + 'px'})
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
$(document).on('click', '.table-link', function (e) {
    if ($(this)) {
        window.location.href = $(this).find($('.btn.btn-link')).attr('href')
    }
}).on('click', '.btn.btn-success, .btn.btn-danger', function (e) {
    e.stopPropagation();
})


$('.switch').on('click', function () {
    if ($('body').hasClass('light')) {
        console.log(1)
        $('body').addClass('dark').removeClass('light')
        $('.bg-body-white').addClass('bg-body-dark').removeClass('bg-body-white')
        $('.bg-container-white').addClass('bg-container-dark').removeClass('bg-container-white')
        $('.bg-sub-container-white').addClass('bg-sub-container-dark').removeClass('bg-sub-container-white')
        $('.bg-top-bar-white').addClass('bg-top-bar-dark').removeClass('bg-top-bar-white')
        $('.bg-aside').addClass('bg-dark-aside').removeClass('bg-aside')
        $('.text-dark').addClass('text-white').removeClass('text-dark')
        $('.text-black').addClass('text-white').removeClass('text-black')
        $('.grey-color').addClass('white-color').removeClass('grey-color')

        $('.switch input').attr('checked', true)
        return false
    }

    $('body').addClass('light').removeClass('dark')
    $('.bg-body-dark').addClass('bg-body-white').removeClass('bg-body-dark')
    $('.bg-container-dark').addClass('bg-container-white').removeClass('bg-container-dark')
    $('.bg-sub-container-dark').addClass('bg-sub-container-white').removeClass('bg-sub-container-dark')
    $('.bg-top-bar-dark').addClass('bg-top-bar-white').removeClass('bg-top-bar-dark')
    $('.bg-aside').addClass('bg-aside').removeClass('bg-dark-aside')
    $('.text-white').addClass('text-dark').removeClass('text-white')
    $('.text-white').addClass('text-black').removeClass('text-white')
    $('.white-color').addClass('grey-color').removeClass('white-color')
    $('.switch input').attr('checked', false)

    return false


})

