document.addEventListener("DOMContentLoaded", function () {
  // Get the services grid
  var servicesGrid = document.querySelector(".explore_our_services_grid");

  // Add event listeners for mouseenter and wheel events
  servicesGrid.addEventListener("mouseenter", function () {
    // On mouse enter, add a class to enable scrolling
    servicesGrid.classList.add("scrollable");
  });

  servicesGrid.addEventListener("mouseleave", function () {
    // On mouse leave, remove the class to disable scrolling
    servicesGrid.classList.remove("scrollable");
  });

  servicesGrid.addEventListener("wheel", function (e) {
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
//   var formDate = document.getElementsByClassName("form_date");

//   if (textContent.toLowerCase() === "one way") {
//     alert(formDate);
//     formDate.innerHTML = 
//       '<!-- Depature Date -->' +
//         '<div class="depature_date dates">' +
//         '<label for="depatureDate">Depature Date<span>*</span></label>' +
//         '<input type="date" id="departureDate" name="departure_Date" value="' +
//         "<?= date('Y-m-d') ?>" +
//         '" required>' +
//         "</div>" +
//         "<!-- Return Date => Only show for Round Trip-->" +
//         '<div class="return_date dates return_date_hide">' +
//         '<label for="return_date">Return Date<span>*</span></label>' +
//         '<input type="date" id="return_date" name="return_date" value="' +
//         "<?= date('Y-m-d') ?>" +
//         '">' +
//         '</div>';
//   } else if (textContent.toLowerCase() === "return") {
//     formDate.innerHTML = 
//       '<!-- Depature Date -->' +
//         '<div class="depature_date dates">' +
//         '<label for="depatureDate">Depature Date<span>*</span></label>' +
//         '<input type="date" id="departureDate" name="departure_Date" value="' +
//         "<?= date('Y-m-d') ?>" +
//         '" required>' +
//         "</div>" +
//         "<!-- Return Date => Only show for Round Trip-->" +
//         '<div class="return_date dates return_date_hide">' +
//         '<label for="return_date">Return Date<span>*</span></label>' +
//         '<input type="date" id="return_date" name="return_date" value="' +
//         "<?= date('Y-m-d') ?>" +
//         '" required>' +
//         '</div>';
//   }

  // Get the return_date div
  var returnDateDiv = document.querySelector(".form_date .return_date");

  if (textContent.toLowerCase() === "one way") {
    // Set the selected value in the hidden input field
    document.getElementById("selectedTripType").value = 1;
    // Alert the text content (you can do whatever you want with it)
    // alert('Text Content: ' + document.getElementById('selectedTripType').value);
    returnDateDiv.classList.add("return_date_hide");
  } else if (textContent.toLowerCase() === "return") {
    // Set the selected value in the hidden input field
    document.getElementById("selectedTripType").value = 2;
    // Alert the text content (you can do whatever you want with it)
    // alert('Text Content: ' + document.getElementById('selectedTripType').value);
    // Toggle the return_date_hide class on the clicked element (returb)
    returnDateDiv.classList.remove("return_date_hide");
  } else if (textContent.toLowerCase() === "multicity") {
    // Set the selected value in the hidden input field
    document.getElementById("selectedTripType").value = 3;
    // Alert the text content (you can do whatever you want with it)
    // alert('Text Content: ' + document.getElementById('selectedTripType').value);
    returnDateDiv.classList.add("return_date_hide");
  }

  // clickedElement.classList.toggle('clickedP');
  var formTripType = clickedElement.parentElement; // Get the parent container

  // Remove the clickedP class from all p elements within formTripType
  var allPTags = formTripType.getElementsByTagName("p");
  for (var i = 0; i < allPTags.length; i++) {
    allPTags[i].classList.remove("clickedP");
  }

  // Toggle the clickedP class on the clicked element
  clickedElement.classList.toggle("clickedP");
}

// HOMEPAGE - BANNER SECTION - BOOKING FORM - LOCATION (From , To)
// This func will be used to populate the 'From' & 'To' drope down in booking Form
//and excluding the from drop down selection from the to drop down
document.addEventListener("DOMContentLoaded", function () {
  var fromDropdown = document.getElementById("from");
  var toDropdown = document.getElementById("to");

  // Initial population of "From" dropdown
  populateDropdown(fromDropdown, toDropdown, formLocationDataArray);

  // Add change event listener to "From" dropdown
  fromDropdown.addEventListener("change", function () {
    console.log("Selected value:", this.value);
    // Your custom logic here
  });
});

function populateDropdown(fromId, toId, dataArray) {
  var from = document.getElementById(fromId);
  var to = document.getElementById(toId);

  // Populate the "From" dropdown
  dataArray.forEach(function (data) {
    var optionFrom = document.createElement("option");
    optionFrom.value = data.form_location;
    optionFrom.textContent = data.form_location;
    from.append(optionFrom);

    // Populate the "To" dropdown
    var optionTo = document.createElement("option");
    optionTo.value = data.form_location;
    optionTo.textContent = data.form_location;
    to.append(optionTo);
  });
}

function populateToDropdown(fromValue, toId, dataArray) {
  var to = document.getElementById(toId);
  to.innerHTML = "";

  var defaultOption = document.createElement("option");
  defaultOption.value = "";
  defaultOption.textContent = "To*";
  defaultOption.disabled = true;
  defaultOption.selected = true;

  to.appendChild(defaultOption);

  // Populate the "From" dropdown
  dataArray.forEach(function (data) {
    if (data.form_location !== fromValue) {
      var option = document.createElement("option");
      option.value = data.form_location;
      option.textContent = data.form_location;

      to.appendChild(option);
    }
  });
}
