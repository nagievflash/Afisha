$(document).ready(function(){

    setInterval(function(){
        let activeSlide = $('#pagination .active').data('slide');
        let sliderCount = $('#pagination button').length;
        if (activeSlide < (sliderCount - 1)) {
            $('#pagination button').eq(activeSlide + 1).click();
        }
        else {
            $('#pagination button:first').click();
        }
    }, 1116000);

        var ajaxRequest;

        $('#search-input').on('click keyup search', function(e){
        if (ajaxRequest) {
            ajaxRequest.abort();
        }
        e.preventDefault();
        $('.spinner-wrapper').remove();
        var a = e.target.value;
        if (a != '') {
            $('.search .input-group-prepend').hide();
        }
        else {
            $('.search .input-group-prepend').show()
        }

        let b = $('#search-results')
        b.show().prepend('<div class="spinner-wrapper"><span class="spinner"><span></span></span></div>');

        ajaxRequest = $.ajax({
            url: '/search',
            type: 'post',
            data: {
                title : a,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                b.html('<ul></ul>')
                $.each(data, function(i, item) {
                    b.find('ul').append('<li><a href="/events/' + item.slug + '">' + item.title + '</a></li>')
                });
                $('.spinner-wrapper').remove();
                $('.search-link').parent().remove();
                if (a.length != 0) b.find('ul').append('<li><a class="search-link" href="/search/' + encodeURIComponent(a) + '">Все результаты по поиску "' + a + '"</li>')
            }
        })
    })
    $('#searchform').submit(function(e) {
        e.preventDefault();
        let a = $(this).find('input[type="search"]').val()
        location.href = "/search/" + encodeURIComponent(a);
    })

    $(document).on('click',function (e) {
        var el = '.search';
        if (jQuery(e.target).closest(el).length) return;
        $('#search-results').html('').hide();
    });

    $('.hamburger').click(function(){
        $('body').toggleClass('menu-opened');
    })

})
