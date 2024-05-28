document.addEventListener('DOMContentLoaded', function() {
    var $carrousel = $('#carrousel');
    var $imgs = $carrousel.find('li');
    var currentIndex = 0;
    var changeInterval = 5000; // Interval de changement de l'image en millisecondes

    // Initialisation du carrousel
    function displayCurrentImage() {
        $imgs.removeClass('active').css('opacity', 0);
        $imgs.eq(currentIndex).addClass('active').css('opacity', 1);
    }

    function moveToNextImage() {
        currentIndex = (currentIndex + 1) % $imgs.length;
        displayCurrentImage();
    }

    function moveToPreviousImage() {
        currentIndex = (currentIndex - 1 + $imgs.length) % $imgs.length;
        displayCurrentImage();
    }

    // Contrôleurs pour le carrousel
    $carrousel.find('.next').on('click', moveToNextImage);
    $carrousel.find('.prev').on('click', moveToPreviousImage);

    // Défilement automatique du carrousel
    setInterval(moveToNextImage, changeInterval);

    // Afficher la première image au chargement
    displayCurrentImage();
});
