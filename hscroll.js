document.addEventListener("DOMContentLoaded", function () {
    // Get the services grid
    var servicesGrid = document.querySelector('.explore_our_services_grid');

    // Add event listeners for mouseenter and wheel events
    servicesGrid.addEventListener('mouseenter', function () {
        // On mouse enter, add a class to enable scrolling
        servicesGrid.classList.add('scrollable');
    });

    servicesGrid.addEventListener('mouseleave', function () {
        // On mouse leave, remove the class to disable scrolling
        servicesGrid.classList.remove('scrollable');
    });

    servicesGrid.addEventListener('wheel', function (e) {
        // Scroll horizontally based on the wheel direction
        e.preventDefault();
        servicesGrid.scrollLeft += e.deltaY;
    });
});

// HOMEPAGE - BANNER SECTION - BOOKING FORM - TRIP TYPE (one way, return & multicity)
// Function Call on the Trip type section of the booking form in the homepage
// to set the corresponding value of the type to the hidden input in the respective div
// and using that hidden input to get value in php
// Also Toggling th class 'clickedP' so that css may applied to the clicked P tag
function selectedValue(clickedElement) {
    // Get the text content of the clicked element
    var textContent = clickedElement.innerText;

    if (textContent.toLowerCase() === 'one way') {
        // Set the selected value in the hidden input field
        document.getElementById('selectedTripType').value = 1;
        // Alert the text content (you can do whatever you want with it)
        // alert('Text Content: ' + document.getElementById('selectedTripType').value);
    } else if (textContent.toLowerCase() === 'return') {
        // Set the selected value in the hidden input field
        document.getElementById('selectedTripType').value = 2;
        // Alert the text content (you can do whatever you want with it)
        // alert('Text Content: ' + document.getElementById('selectedTripType').value);
    } else if (textContent.toLowerCase() === 'multicity') {
        // Set the selected value in the hidden input field
        document.getElementById('selectedTripType').value = 3;
        // Alert the text content (you can do whatever you want with it)
        // alert('Text Content: ' + document.getElementById('selectedTripType').value);
    }

    // clickedElement.classList.toggle('clickedP');
    var formTripType = clickedElement.parentElement; // Get the parent container

    // Remove the clickedP class from all p elements within formTripType
    var allPTags = formTripType.getElementsByTagName('p');
    for (var i = 0; i < allPTags.length; i++) {
        allPTags[i].classList.remove('clickedP');
    }

    // Toggle the clickedP class on the clicked element
    clickedElement.classList.toggle('clickedP');
}
