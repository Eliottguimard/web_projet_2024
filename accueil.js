document.addEventListener('DOMContentLoaded', function() {
    // Initialisation des écouteurs d'événements pour la navigation
    setupNavigationListeners();
    loadSpecialistCategories();

    // Gestion des rendez-vous
    if (document.getElementById('appointmentForm')) {
        document.getElementById('appointmentForm').addEventListener('submit', handleAppointmentSubmission);
    }

    // Chargement initial des médecins généralistes
    loadSpecialists('general');

    // Initialisation du carrousel
    initCarousel();

    function setupNavigationListeners() {
        const navLinks = document.querySelectorAll('nav ul li a');
        navLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const category = this.getAttribute('href').split('.')[0]; // Assuming the href is like 'general.html'
                loadSpecialists(category);
                setActiveLink(this);
            });
        });
    }

    function setActiveLink(activeLink) {
        const navLinks = document.querySelectorAll('nav ul li a');
        navLinks.forEach(link => {
            link.classList.remove('active');
        });
        activeLink.classList.add('active');
    }

    function loadSpecialists(category) {
        fetch(`api/specialists/${category}`)
            .then(response => response.json())
            .then(data => {
                displaySpecialists(data);
            })
            .catch(error => console.error('Error loading the specialists:', error));
    }

    function displaySpecialists(specialists) {
        const specialistContainer = document.getElementById('specialistList');
        specialistContainer.innerHTML = ''; // Clear previous entries
        specialists.forEach(specialist => {
            const specialistElement = document.createElement('div');
            specialistElement.className = 'specialist';
            specialistElement.innerHTML = `
                <h3>${specialist.name}</h3>
                <p>${specialist.specialty}</p>
                <button onclick="bookAppointment('${specialist.id}')">Book Appointment</button>
            `;
            specialistContainer.appendChild(specialistElement);
        });
    }

    function bookAppointment(specialistId) {
        const appointmentInfo = {
            specialistId: specialistId,
            userId: 'user123', // This should be dynamically set
            time: '2024-05-27T14:00:00' // Example static time
        };

        fetch('api/appointments', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(appointmentInfo)
        })
            .then(response => response.json())
            .then(data => {
                alert('Appointment booked successfully!');
            })
            .catch(error => {
                console.error('Error booking the appointment:', error);
                alert('Failed to book the appointment.');
            });
    }

    function handleAppointmentSubmission(event) {
        event.preventDefault();
        const formData = new FormData(event.target);
        const appointmentDetails = {
            specialistId: formData.get('specialistId'),
            userId: formData.get('userId'),
            time: formData.get('time')
        };

        bookAppointment(appointmentDetails.specialistId);
    }

    function loadSpecialistCategories() {
        fetch('api/specialist_categories')
            .then(response => response.json())
            .then(categories => {
                const categoryMenu = document.getElementById('categoriesMenu');
                categories.forEach(category => {
                    const categoryOption = document.createElement('option');
                    categoryOption.value = category.id;
                    categoryOption.textContent = category.name;
                    categoryMenu.appendChild(categoryOption);
                });
            })
            .catch(error => console.error('Error loading categories:', error));
    }

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
