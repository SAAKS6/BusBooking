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

function getValue(clickedElement) {
    // Get the text content of the clicked element
    var textContent = clickedElement.innerText;

    // Alert the text content (you can do whatever you want with it)
    alert('Text Content: ' + textContent.toLowerCase());
}