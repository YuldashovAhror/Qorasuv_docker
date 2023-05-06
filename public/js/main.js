$(window).on('load', () => {

    $('.preloader').delay(2000).fadeOut(600)

    //________DAY-NIGHT_________    


    $('.header-switch__switch input').on('change', function() {
        if($(this).is(':checked')) {
            $('.header-switch__time').removeClass('active')
            $('.header-switch__night').addClass('active')
            $('.main-bg__night').css('opacity', '1')
        } else {
            $('.header-switch__time').removeClass('active')
            $('.header-switch__day').addClass('active')
            $('.main-bg__night').css('opacity', '0')
        }
    })


    //_______MOBILE MENU______


    $('.header-mobile').click(function() {
        $(this).toggleClass('active')
        $('.mobile-menu').slideToggle(500)
        $('.header-switch').toggleClass('hide')
    })

    $('.mobile-menu__list a').click(function(e) {
        e.preventDefault()
        let link = $(this).attr('href')
        $('.header-mobile').toggleClass('active')
        $('.mobile-menu').slideToggle(500)
        $('.header-switch').toggleClass('hide')
        window.scrollTo({top: $(link).offset().top - 50, behavior: 'smooth'})
    })


    //_______GENPLAN______

    $('.genplan-wrap').scrollLeft($(window).height()*.4)



    function mousemove(event) {
        var mouse_x = mouse_y = 0;
        if (document.attachEvent != null) {
            mouse_x = window.event.clientX;
            mouse_y = window.event.clientY;
        } else if (!document.attachEvent && document.addEventListener) {
            mouse_x = event.clientX;
            mouse_y = event.clientY;
        }

        $('.genplan-info').css('top', mouse_y+'px')
        $('.genplan-info').css('left', mouse_x+'px')
    }


    $('.genplan').mousemove(mousemove)


    $('.genplan-img svg path').mouseenter(function() {
        $('.genplan-info').css({
            opacity: '1',
            visibility: 'visible'
        })



        $('.genplan-info__number span').text($(this).data('number'))
        $('.genplan-info__flats span').text($(this).data('flats')) 

    })

    $('.genplan-img svg path').mouseleave(function() {
        $('.genplan-info').css({
            opacity: '0',
            visibility: 'hidden'
        })
    })
    

    //_______PLANS______

    let showPlan = index => {
        $('.plans-thumbs li').removeClass('current')
        $('.plans-thumbs li').eq(index).addClass('current')
        let src = $('.plans-thumbs .current img').attr('src')
        $('.plans-main img').attr('src', src)
    }

    showPlan(0)

    $('.plans-thumbs li').click(function() {
        let index = $(this).index()
        showPlan(index)
    })


    //_______COUNTER ANIMATION______


    let showCounter = true;
    $(window).on('scroll load resize', function () {
        if (!showCounter) return false; 
        let w_top = $(window).scrollTop(); 
        if (w_top >= $('.developer').offset().top - $(window).height()/2) {
            
            $('.developer-numbers__number span').each(function() {
                $(this).prop("col",0).animate({
                    counter: $(this).text()},{
                    duration: 4000,
                    easing: 'swing',
                    step:function(now){
                        $(this).text(Math.ceil(now));
                    }
                });
            });
            showCounter = false;
        }
 
    }); 



    //__________MAP_____________


    ymaps.ready(mapStart);
    function mapStart() {
        var map = new ymaps.Map("map", {
            center: [41.30217721816494, 69.26044054602785],
            zoom: 13,
        }, {
            searchControlProvider: 'yandex#search'
        });

        map.geoObjects
        .add(new ymaps.Placemark([41.29227395196873, 69.28048346137045], {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'img/marker.svg',
            iconImageSize: [30, 42],
        })).add(new ymaps.Placemark([41.31145713496565, 69.23932593949392], {
        }, {
            iconLayout: 'default#image',
            iconImageHref: 'img/marker.svg',
            iconImageSize: [30, 42],
        }))

  
        map.panes.get('ground').getElement().style.filter = 'grayscale(100%)';
    }

    
    //__________WOW____________


    new WOW({
        offset: 50,
        mobile: false, 
    }).init();


    $('.form__tel').inputmask("+\\9\\98 99 999 99 99")


    //_____________FEEDBACK_________________


    $('.feedback-open').click(e => {
        e.preventDefault()
        $('.feedback').fadeIn(600); 
    })


    $('.feedback-done .feedback-form__btn').click(e => {
        e.preventDefault()
        $('.feedback').fadeOut(600); 
    })



    $('.feedback').click(e => {
        let div = $(".feedback-content");
        if (!div.is(e.target) 
            && div.has(e.target).length === 0) { 
            $('.feedback').fadeOut(600); 
        }
    })

    //_____________FORM SEND__________

    let token = '5609523715:AAGye814_ViAyw36Yb7W0Shf8CA1cJ-TkgU'
    let chatId = '-780709159'

    $('.feedback-form').on('submit', e => {
        e.preventDefault()
        $('.feedback-wrap .feedback-form__btn').addClass('btn-disabled')
        let name = $('.feedback-form__name').val()
        let tel = $('.feedback-form__tel').val()
        let text = `**Форма обратной связи**%0AИмя: ${name}%0AТелефон: ${tel}%0AПроект: NRG Qorasuv%0A`
        fetch('https://api.telegram.org/bot' + token + '/sendMessage?chat_id='+ chatId + 'parse_mode=html&text=' + text ).then(response => {
            if(response.status == 200 || response.status == 201) {
                $('.feedback-wrap').hide()
                $('.feedback-done').show()
            }
        })
    })

    $('.consult-form').on('submit', e => {
        e.preventDefault()
        $('.consult-form__btn').addClass('btn-disabled')
        let name = $('.consult-form__name').val()
        let tel = $('.consult-form__tel').val()
        let text = `**Форма обратной связи**%0AИмя: ${name}%0AТелефон: ${tel}%0AПроект: NRG Qorasuv%0A`
        fetch('https://api.telegram.org/bot' + token + '/sendMessage?chat_id='+ chatId + 'parse_mode=html&text=' + text ).then(response => {
            if(response.status == 200 || response.status == 201) {
                $('.consult-form__btn').hide()
                $('.consult-form__text').show()
            }
        })
    })

})