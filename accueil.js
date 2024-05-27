document.addEventListener('DOMContentLoaded', function() {


    // Initialisation du carrousel
    initCarousel();



    function initCarousel() {
        var $carrousel = $('#carrousel'),
            $img = $('#carrousel li'),
            indexImg = $img.length - 1,
            i = 0,
            $currentImg = $img.eq(i);

        $img.not('.active').css('opacity', '0');
        $currentImg.addClass('active');

        function changeImg(newIndex) {
            $img.removeClass('active').css('opacity', '0');
            $img.eq(newIndex).addClass('active').css('opacity', '1');
            i = newIndex;
        }

        $carrousel.find('.controls .next').click(function(){
            var nextIndex = i < indexImg ? i + 1 : 0;
            changeImg(nextIndex);
        });

        $carrousel.find('.controls .prev').click(function(){
            var prevIndex = i > 0 ? i - 1 : indexImg;
            changeImg(prevIndex);
        });

        function slideImg(){
            setTimeout(function(){
                var nextIndex = i < indexImg ? i + 1 : 0;
                changeImg(nextIndex);
                slideImg();
            }, 9000); // Change l'image toutes les 5 secondes
        }

        slideImg();
    }
});
