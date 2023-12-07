// $(document).ready(function() {
//   $('.admin-container .left').css('background-color', 'BLUE');
// });
// 
// $(document).ready(function() {
//   // Initially hide all operation options
//   $('.options_for_admin, .options_for_schedual, .options_for_user').hide();

//   $('#selectOption').change(function() {
//       // Hide all operation options
//       $('.options_for_admin, .options_for_schedual, .options_for_user').hide();

//       var selectedOption = $('#selectOption').val();

//       // Show the corresponding operation options based on the selected option
//       if (selectedOption === 'admin') {
//           $('.options_for_admin').show();
//       } else if (selectedOption === 'schedule') {
//           $('.options_for_schedual').show();
//       } else if (selectedOption === 'user') {
//           $('.options_for_user').show();
//       }
//   });
// });


// This func will be used to populate the 'From' & 'To' drope down in create schedual Form
//and excluding the 'From' drop down selection, from the 'To' drop down
$(document).ready(function () {
  // Initial population of "From" dropdown
  populateDropdown('#from', '#to', formLocationDataArray);

  // Add change event listener to "From" dropdown
  $('#from').change(function () {
    populateToDropdown(this.value, '#to', formLocationDataArray);
    console.log("Selected value:", this.value);
    // Your custom logic here
  });
});

function populateDropdown(fromId, toId, dataArray) {
  var from = $('#' + fromId);
  var to = $('#' + toId);

  // Populate the "From" dropdown
  $.each(dataArray, function (index, data) {
    var optionFrom = $('<option></option>').val(data.form_location).text(data.form_location);
    from.append(optionFrom);

    // Populate the "To" dropdown
    var optionTo = $('<option></option>').val(data.form_location).text(data.form_location);
    to.append(optionTo);
  });
}

function populateToDropdown(fromValue, toId, dataArray) {
  var to = $('#' + toId);
  to.empty();

  var defaultOption = $('<option></option>').val('').text('To*').prop('disabled', true).prop('selected', true);
  to.append(defaultOption);

  // Populate the "From" dropdown
  $.each(dataArray, function (index, data) {
    if (data.form_location !== fromValue) {
      var option = $('<option></option>').val(data.form_location).text(data.form_location);
      to.append(option);
    }
  });
}

// CHANGING THE PAGES ACCORDING TO THE SELECTION
$(document).ready(function () {
  // Initially hide all operation options and their associated divs
  $('.options_for_admin, .options_for_schedual, .options_for_user').hide();
  $('.createAdmin_container, .deleteAdmin_container, .updateAdmin_container').hide();
  $('.createSchedule_container, .deleteSchedule_container, .updateSchedule_container').hide();
  $('.deleteUser_container, .updateUser_container').hide();

  $('#selectOption').change(function () {
    // Hide all operation options and their associated divs
    $('.options_for_admin, .options_for_schedual, .options_for_user').hide();
    $('.createAdmin_container, .deleteAdmin_container, .updateAdmin_container').hide();
    $('.createSchedule_container, .deleteSchedule_container, .updateSchedule_container').hide();
    $('.deleteUser_container, .updateUser_container').hide();

    var selectedOption = $('#selectOption').val();//ADMIN,SCHEDUAL,USER

    // Show the corresponding operation options based on the selected option
    if (selectedOption === 'admin') {
      $('.options_for_admin').show();
    } else if (selectedOption === 'schedule') {
      $('.options_for_schedual').show();
    } else if (selectedOption === 'user') {
      $('.options_for_user').show();
    }
  });

  // Handle the click event on each admin operation option
  $('.options_for_admin .option-box').click(function () {
    // Hide all admin operation divs
    $('.welcome_container, .createAdmin_container, .deleteAdmin_container, .updateAdmin_container').hide();

    // Get the ID of the clicked admin operation option
    var optionId = $(this).attr('id');
    // alert(optionId);
    // Show the corresponding admin operation div based on the clicked option
    switch (optionId) {
      case 'createAdminOption':
        $('.createAdmin_container').css('display', 'block');
        break;
      case 'deleteAdminOption':
        $('.deleteAdmin_container').css('display', 'block');
        break;
      case 'updateAdminOption':
        $('.updateAdmin_container').css('display', 'block');
        break;
      default:
        break;
    }
  });

  // Handle the click event on each Schedual operation option
  $('.options_for_schedual .option-box').click(function () {
    // Hide all schedual operation divs
    $('.welcome_container, .createSchedule_container, .deleteSchedule_container, .updateSchedule_container').hide();

    // Get the ID of the clicked admin operation option
    var optionId = $(this).attr('id');
    // alert(optionId);
    // Show the corresponding admin operation div based on the clicked option
    switch (optionId) {
      case 'createSchedualOption':
        // alert(optionId);
        $('.createSchedule_container').css('display', 'block');
        break;
      case 'deleteSchedualOption':
        $('.deleteSchedule_container').css('display', 'block');
        break;
      case 'updateSchedualOption':
        $('.updateSchedule_container').css('display', 'block');
        break;
      default:
        break;
    }
  });
  
  // Handle the click event on each Schedual operation option
  $('.options_for_user .option-box').click(function () {
    // Hide all schedual operation divs
    $('.welcome_container, .deleteUser_container, .updateUser_container').hide();

    // Get the ID of the clicked admin operation option
    var optionId = $(this).attr('id');
    // alert(optionId);
    // Show the corresponding admin operation div based on the clicked option
    switch (optionId) {
      case 'deleteUserOption':
        $('.deleteUser_container').css('display', 'block');
        break;
      case 'updateUserOption':
        $('.updateUser_container').css('display', 'block');
        break;
      default:
        break;
    }
  });

});




// 
const createPost = document.querySelector(".createPost-container"); // Access the first element with class 'createPost-container'
const deletePost = document.querySelector(".deletePost-container"); // Access the first element with class 'deletePost-container'
const createTicker = document.querySelector(".createTicker-container");
const deleteTicker = document.querySelector(".deleteTicker-container");
const updateProfile = document.querySelector(".updateProfile-container");

const createPostOption = document.querySelector("#createPostOption");
const deletePostOption = document.querySelector("#deletePostOption");
const createTickerOption = document.querySelector("#createTickerOption");
const deleteTickerOption = document.querySelector("#deleteTickerOption");
const updateProfileOption = document.querySelector("#updateProfileOption");

createPostOption.addEventListener("click", () => {
  createPost.style.display = "block";
  deletePost.style.display = "none";
  createTicker.style.display = "none";
  deleteTicker.style.display = "none";
  updateProfile.style.display = "none";
});

deletePostOption.addEventListener("click", () => {
  createPost.style.display = "none";
  deletePost.style.display = "block";
  createTicker.style.display = "none";
  deleteTicker.style.display = "none";
  updateProfile.style.display = "none";
});

createTickerOption.addEventListener("click", () => {
  createPost.style.display = "none";
  deletePost.style.display = "none";
  createTicker.style.display = "block";
  deleteTicker.style.display = "none";
  updateProfile.style.display = "none";
});

deleteTickerOption.addEventListener("click", () => {
  createPost.style.display = "none";
  deletePost.style.display = "none";
  createTicker.style.display = "none";
  deleteTicker.style.display = "block";
  updateProfile.style.display = "none";
});

updateProfileOption.addEventListener("click", () => {
  createPost.style.display = "none";
  deletePost.style.display = "none";
  createTicker.style.display = "none";
  deleteTicker.style.display = "none";
  updateProfile.style.display = "block";
});
