$(document).ready(function () {
    if($('.js-control-input').length)
    {
        $('.js-control-input').on('keyup', function () {
            if($(this).val() != '')
            {
                $('.js-clear-input').show();
            }
            else
            {
                $('.js-clear-input').hide();
            }
        });

        $('.js-clear-input').on('click', function () {
            $('.js-control-input').val('').focus();
            $('.js-clear-input').hide();
        });
    }
});

var siteSlide = function(root)
{
    var me = this;
    me.root = $(root);

    var _init = function(element)
    {
        $element = element,
        initEvents();
    },

    initEvents = function()
    {
        var slideType = $element.attr('data-slide-type')

        if(slideType == 'upper')
        {
            var swiper = new Swiper('.js-site-slide[data-slide-type="'+slideType+'"]', {
                direction: 'vertical',
                slidesPerView: 1,
                mousewheelControl: true,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        number = index+1;
                        return '<span class="' + className + '">' + number + '</span>';
                    },
                },

            });
        }

        if(slideType == 'main')
        {
            var swiper = new Swiper('.js-site-slide[data-slide-type="'+slideType+'"]', {
                //direction: 'vertical',
                slidesPerView: 1,
                mousewheelControl: true,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    slidesPerView: 'auto',
                    renderBullet: function (index, className) {
                        number = index+1;
                        return '<span class="' + className + '"><span class="number">' + number + '</span></span>';
                    },
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                },
            });
        }

        if(slideType == 'thumbs')
        {
            var slideUniqId = $element.attr('data-slide-uniq-id')
            var galleryThumbs = new Swiper('.js-site-slide[data-slide-uniq-id="'+slideUniqId+'"] .gallery-thumbs', {
                spaceBetween: 10,
                slidesPerView: 4,
                loop: false,
                freeMode: true,
                loopedSlides: 5, //looped slides should be the same
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                allowTouchMove: false,
            });
            var galleryTop = new Swiper('.js-site-slide[data-slide-uniq-id="'+slideUniqId+'"] .gallery-top', {
                spaceBetween: 10,
                loop: false,
                loopedSlides: 5, //looped slides should be the same
                allowTouchMove: false,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                thumbs: {
                    swiper: galleryThumbs,
                },
            });
        }

        $('.js-site-slide[data-slide-type="'+slideType+'"] .swiper-pagination-bullet').hover(function() {
            $( this ).trigger( "click" );
        });
    }

    me.root.each(function(){
        new _init( $(this) );
    });
}

$(document).ready(function(){
    new siteSlide(".js-site-slide");
});