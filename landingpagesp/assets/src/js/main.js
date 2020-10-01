
$(document).ready(function () {

    $('.form-cadastro').submit(function (event) {
        event.preventDefault();
        $('.alert-danger').hide();
        $('.botao-principal').prop('disabled', true);

        $.ajax({
            type: "POST",
            url: url,
            crossDomain: true,
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
               
                if (data === 'error') {
                    $('.alert-danger').fadeIn().text(response[0].msg).delay(3000).fadeOut();
                    $('.botao-principal').prop('disabled', false);

                } else {
                    $('.alert-success').fadeIn().text('Cadastro realizado com sucesso!');
                    $('.form-cadastro').each(function () {
                        this.reset();
                    });
                }
            }
        });
    });

    new dgCidadesEstados({
        cidade: document.getElementById('cidade2'),
        estado: document.getElementById('estado2'),
        estadoVal: 'Selecione um estado',
        cidadeVal: 'Selecione uma cidade'
    });
    
    new dgCidadesEstados({
        cidade: document.getElementById('cidade'),
        estado: document.getElementById('estado'),
        estadoVal: 'Selecione um estado',
        cidadeVal: 'Selecione uma cidade'
    });


        
    $(document).ready(function($) {
            $('.counter').counterUp({
                delay: 1,
                time: 1000
            });

            $('.counter1').counterUp({
                delay: 1,
                time: 1000
            });
        });

    $(document).ready(function () {
        //parallax banner
        if ($(window).width() > 992) {
            $('#banner').parallax({
                relativeInput: true,
                clipRelativeInput: true,
                invertX: true,
                invertY: true,
                scalarX: 0,
                scalarY: 10,
                originX: 0.2,
                originY: 0.2,
                frictionY: .1
            });
        }
        $('.slick-form-after').slick({
            dots: false,
            arrows: false,
            infinite: false,
            loop: false,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipeToSlide: false,
            fade: false,
            autoplay: false,
            draggable: false,
            accessibility: false,
            adaptiveHeight: true
        });

        $('.btn-slick-last').click(function () {
            $('.slick-form-after').slick('slickGoTo', 3);
            // to dando return false só pra não enviar o form, retirar quando fizer o ajax
            return false;
        });

        $('.send-exit').on('click', function () {
            var check = true;
            $(this).hide();

            $('#form-exit').find('input, select').each(function () {
                if ($(this).prop('required') && ($(this).val() == '' || $(this).val() == null) && $(this).is(":visible")) {
                    $(this).addClass('error');
                    $(this).parent().append("<small class='fz12 msgerror'>este campo é obrigatório</small>");
                    check = false;
                }
            });
        });
    });

    if ($(window).width() > 1280) {
        var wow = new WOW(
                {
                    boxClass: 'wow', // animated element css class (default is wow)
                    animateClass: 'animated', // animation css class (default is animated)
                    offset: 200, // distance to the element when triggering the animation (default is 0)
                    mobile: false, // trigger animations on mobile devices (default is true)
                    live: true, // act on asynchronously loaded content (default is true)
                    callback: function (box) {
                        // the callback is fired every time an animation is started
                        // the argument that is passed in is the DOM node being animated
                    },
                    scrollContainer: null // optional scroll container selector, otherwise use window
                }
        );
        wow.init();
    }
    else {
        var wow = new WOW(
                {
                    boxClass: 'wow', // animated element css class (default is wow)
                    animateClass: 'animated', // animation css class (default is animated)
                    offset: 100, // distance to the element when triggering the animation (default is 0)
                    mobile: false, // trigger animations on mobile devices (default is true)
                    live: true, // act on asynchronously loaded content (default is true)
                    callback: function (box) {
                        // the callback is fired every time an animation is started
                        // the argument that is passed in is the DOM node being animated
                    },
                    scrollContainer: null // optional scroll container selector, otherwise use window
                }
        );
        wow.init();
    }

    /* TOPO FIXO */
    var topo = $("#topo");
    if ($(window).width() > 992) {
        $('.fixed').stick_in_parent({offset_top: 80});
    }
    else {
        $('.topo-mobile').sticky({wrapperClassName: 'topo-mobile-sticky'});
    }
    var botaoTopo = $(".totop");
    var windowScroll_t;

    // linha no top nav
    var topnavLi = $('.top-nav > ul > li'),
            linha = $('.top-nav .linha');

    topnavLi.hover(function () {
        var liPadding = parseInt($(this).children('a').css('padding-left').replace(/[^-\d\.]/g, '')),
                liLeft = $(this).offset().left - $('.top-nav').offset().left,
                liWidth = $(this).children('a').innerWidth();
        linha.stop(true, true);
        linha.animate({
            left: liLeft,
            width: liWidth
        }, 200);
    }, function () {
    });


    function topoFixo() {
        //if($('.fundo-interna').length > 0)
        //  var topOffset = $('.fundo-interna').outerHeight() - topo.outerHeight();
        //else
        var topOffset = 0;

        if ($(this).scrollTop() > topOffset && topo.hasClass('topo-normal')) {
            topo.removeClass('topo-normal').addClass('topo-fixo');
            botaoTopo.addClass('ativo');
        } else if ($(this).scrollTop() <= topOffset && topo.hasClass('topo-fixo')) {
            topo.removeClass('topo-fixo').addClass('topo-normal');
            botaoTopo.removeClass('ativo');
        }
    }
    //TOTOP
    $(window).scroll(function () {
        //TOPO
        topoFixo();

        //ativa titulos
        var winOffset = $(this).scrollTop() + $(this).height() * .75;
        $('.titulo-principal, .ativa-no-scroll').each(function (index, el) {
            var titleOffset = $(el).offset().top;
            if (winOffset > titleOffset)
                $(el).addClass('ativo');
        });

        // parallax
        var windowTop = $(this).scrollTop(),
                windowBottom = windowTop + $(window).height();
        $('.img-parallax').each(function (index, el) {
            if (!$(el).attr('data-parallax')) {
                var parallaxMultiplier = 1;
            }
            else {
                var parallaxMultiplier = $(el).attr('data-parallax');
            }
            //console.log('parallax:'+ parallaxMultiplier);
            var secTop = $(el).parent('section').offset().top,
                    secBottom = secTop + $(el).parent('section').outerHeight(),
                    imgTranslate = (((windowTop - secTop) / secBottom) * 100) * parallaxMultiplier;
            if (imgTranslate >= 35)
                imgTranslate = 35;
            if (imgTranslate <= -35)
                imgTranslate = -35;

            if (secTop - $(window).height() < windowBottom && secBottom > windowTop) {
                $(el).css('transform', 'translateY(' + imgTranslate + '%)');
                //console.log($(el).parent('section').attr('id'), secTop, secBottom, windowTop, win)
                //console.log($(el).parent('section').attr('id'), $(el).attr('class'), ((windowTop - secTop) / secBottom) * 100);
            }
        });
    });
    botaoTopo.click(function () {
        $('html, body').animate({scrollTop: 0}, 600, 'easeInOutExpo');
        return false;
    });
    topoFixo();

    // fundo interna parallax
    function internaParallax() {
        if ($(this).scrollTop() <= $('.fundo-interna').outerHeight()) {
            var transf = $(this).scrollTop() / 1.5,
                    opac = 1 - (($(this).scrollTop() * 1.5) / $('.fundo-interna').outerHeight());
            //console.log(opac);
            $('.fundo-interna .img-fundo').css({
                transform: 'translateX(-50%) translateY(' + transf + 'px)',
                opacity: opac
            });
        }
    }
    if ($('.fundo-interna .img-fundo').length > 0) {
        $(window).scroll(function () {
            internaParallax();
        });
        internaParallax();
    }

    var scrollOffset = 0;

    // SMOOTH SCROLLING - Code stolen from css-tricks for smooth scrolling:
    $('a[href*=#]:not([href=#]):not([data-toggle="collapse"]):not([data-toggle="modal"]):not([data-toggle="tab"]):not(.botao-tab)').click(function (e) {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - scrollOffset //ALTURA DO TOPO
                }, 1000, 'easeInOutExpo');
                if ($('#check-nav').is(':checked')) {
                    $('#check-nav').click();
                }
                return false;
            }
        }
    });

    // fecha  popup no esc
    $(document).keyup(function (e) {
        if (e.keyCode == 27) {
            $('[id^="check-popup"]:checked,#check-form:checked').click();
        }
    });
    $('#check-form:not(:checked)').change(function () {
        $('.side-form input:first').focus();
    });
    $('[id^="check-popup"]').change(function () {
        if ($('[id^="check-popup"]').is(':checked')) {
            $('body').css('overflow', 'hidden');
        }
        else {
            $('body').css('overflow', 'auto');
        }
    });

    $('input[id*="telefone"],input[id*="celular"]').focusout(function () {
        var phone, element;
        element = $(this);
        element.unmask();
        phone = element.val().replace(/\D/g, '');
        if (phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    }).trigger('focusout');

    $('input[id*="data"]').focusout(function () {
        var date, element;
        element = $(this);
        element.unmask();
        date = element.val().replace(/\D/g, '');
        element.mask("99/99/9999");
    }).trigger('focusout');

    $('input[id*="cep"]').focusout(function () {
        var date, element;
        element = $(this);
        element.unmask();
        date = element.val().replace(/\D/g, '');
        element.mask("99999-999");
    }).trigger('focusout');

    $('.form input,.form textarea,.form select').on({
        focusout: function () {
            if ($(this).val().length > 0 && $(this).val() != '(__) ____-_____' && $(this).val() != '__/__/____') {
                $(this).addClass('touched');
            }
            else {
                $(this).removeClass('touched');
            }
        },
        keyup: function () {
            if ($(this).val().length == 0 || $(this).val() == '(__) ____-_____' || $(this).val() == '__/__/____') {
                $(this).removeClass('touched');
                console.log($(this).val().length)
            }
        }
    });

    // floating label
    function updateText() {
        var input = $(this);
        setTimeout(function () {
            var val = input.val();
            if (val != "")
                input.parent().addClass("floating-placeholder-float");
            else
                input.parent().removeClass("floating-placeholder-float");
        }, 1)
    }
    $(".floating-placeholder input, .floating-placeholder textarea").keydown(updateText);
    $(".floating-placeholder input, .floating-placeholder textarea").change(updateText);
    $(".floating-placeholder input, .floating-placeholder textarea").click(updateText);
    $(".floating-placeholder input, .floating-placeholder textarea").focus(updateText);

    //  Fancybox Gallery Images    
    $('.fancybox').fancybox({
        fitToView: true,
        width: '100%',
        height: '100%',
        autoSize: false,
        closeClick: true,
        cyclic: true,
        padding: 0,
        title: false,
        helpers: {
            media: {}
        }
    });

    // GALERIA DETALHE
    if ($('.slick-detalhe-grande').length) {
        $('.slick-detalhe-grande').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: false,
            autoplay: false,
            arrows: true,
            autoplaySpeed: 2000,
            adaptiveHeight: true,
            asNavFor: '.slick-detalhe-thumb'
        });
    }
    if ($('.slick-detalhe-thumb').length) {
        $('.slick-detalhe-thumb').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slick-detalhe-grande',
            arrows: false,
            autoplay: true,
            autoplaySpeed: 2000,
            centerMode: true,
            focusOnSelect: true,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    // se só tiver 1 thumb, remove o slick-thumb
    var qtd_slide = 0;
    $('.slick-detalhe-thumb').find('.slick-slide').each(function () {
        qtd_slide++;
    });
    if (qtd_slide <= 1) {
        $('.slick-detalhe-thumb').css('display', 'none');
    }

    if ($('.slick-6itens').length) {
        $('.slick-6itens').slick({
            dots: true,
            arrows: false,
            infinite: false,
            loop: true,
            speed: 1000,
            slidesToShow: 6,
            slidesToScroll: 1,
            swipeToSlide: true,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 670,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 420,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

    if ($('.slick-5itens').length) {
        $('.slick-5itens').slick({
            dots: true,
            arrows: false,
            infinite: false,
            loop: true,
            speed: 1000,
            slidesToShow: 5,
            slidesToScroll: 1,
            swipeToSlide: true,
            autoplay: true,
            autoplaySpeed: 10000,
            responsive: [
                {
                    breakpoint: 1450,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

    if ($('.slick-4itens').length) {
        $('.slick-4itens').slick({
            dots: true,
            arrows: false,
            infinite: false,
            loop: true,
            speed: 750,
            centerPadding: '10px',
            slidesToShow: 4,
            slidesToScroll: 1,
            swipeToSlide: true,
            autoplay: false,
            autoplaySpeed: 5000,
            pauseOnHover: false,
            responsive: [
                {
                    breakpoint: 1450,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        dots: true,
                        arrows: false,
                        infinite: false,
                        loop: false,
                        slidesToShow: 2
                    }
                }
            ]
        });
    }

    if ($('.slick-3itens').length) {
        $('.slick-3itens').slick({
            dots: true,
            arrows: false,
            infinite: false,
            loop: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            swipeToSlide: true,
            autoplay: false,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 640,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        dots: true,
                        loop: false,
                        infinite: false,
                        autoplay: false
                    }
                }
            ]
        });
    }

    if ($('.slick-2itens').length) {
        $('.slick-2itens').slick({
            dots: true,
            arrows: false,
            infinite: false,
            loop: true,
            speed: 500,
            slidesToShow: 2,
            slidesToScroll: 1,
            swipeToSlide: true,
            autoplay: false,
            autoplaySpeed: 2000,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 1300,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

    if ($('.slick-1item').length) {
        $('.slick-1item').slick({
            dots: true,
            arrows: false,
            infinite: true,
            loop: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipeToSlide: true,
            autoplay: false,
            autoplaySpeed: 7000,
            pauseOnHover: true,
            fade: false,
            adaptiveHeight: true
        });
    }
    if ($('.slick-1item-alt').length) {
        $('.slick-1item-alt').slick({
            dots: true,
            arrows: false,
            infinite: true,
            loop: true,
            speed: 1000,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipeToSlide: true,
            autoplay: false,
            autoplaySpeed: 7000,
            pauseOnHover: true,
            fade: false,
            adaptiveHeight: true
        });
    }

    if ($('.slick-slideshow').length) {
        $('.slick-slideshow').slick({
            dots: true,
            arrows: true,
            infinite: true,
            loop: true,
            speed: 600,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipeToSlide: true,
            autoplay: false,
            autoplaySpeed: 7000,
            pauseOnHover: true,
            fade: false,
            adaptiveHeight: true
        });
    }
    if ($('.slick-banner').length) {
        $('.slick-banner').slick({
            dots: false,
            arrows: true,
            infinite: true,
            loop: true,
            speed: 750,
            slidesToShow: 1,
            slidesToScroll: 1,
            swipeToSlide: true,
            fade: true,
            autoplay: false,
            autoplaySpeed: 5000,
            pauseOnHover: false,
            responsive: [
                {
                    breakpoint: 480,
                    settings: {
                        dots: true,
                        arrows: false
                    }
                }
            ]
        });
    }


});