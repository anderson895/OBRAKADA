  $(document).ready(function () {
    function setActiveTab(tab) {
      $('.tab-btn').removeClass('border-b-2 border-black text-black').addClass('text-gray-500');
      $(tab).addClass('border-b-2 border-black text-black').removeClass('text-gray-500');
    }

    $('#showLogin').click(function () {
      $('#loginForm').show();
      $('#registerForm').hide();
      setActiveTab(this);
    });

    $('#showRegister').click(function () {
      $('#loginForm').hide();
      $('#registerForm').show();
      setActiveTab(this);
    });
  });














  $("#registerForm").submit(function (e) { 
    e.preventDefault();
    $('.spinner').show();

    var fullname = $("#fullname").val();
    
    var email = $("#email").val();
    var password = $("#password").val();
    var confirmPassword = $("#confirm_password").val();

    // Basic validation
    if (fname === '') {
        alertify.error("First Name is required.");
        $('.spinner').hide(); 
        return;
    }
    
    if (password === '') {
        alertify.error("Password is required.");
        $('.spinner').hide();
        return;
    }
    if (password.length < 6) {
        alertify.error("Password must be at least 6 characters.");
        $('.spinner').hide();
        return;
    }
    if (confirmPassword === '') {
        alertify.error("Confirm Password is required.");
        $('.spinner').hide();
        return;
    }
    if (password !== confirmPassword) {
        alertify.error("Passwords do not match.");
        $('.spinner').hide();
        return;
    }

    // All validations passed
    var formData = $(this).serializeArray(); 
    formData.push({ name: 'requestType', value: 'RegisterMember' });
    var serializedData = $.param(formData);

    $.ajax({
        type: "POST",
        url: "backend/end-points/controller.php",
        data: serializedData,
        dataType: "json", 
        success: function (response) {
            if (response.status === 'success') {
                alertify.success(response.message);  
                setTimeout(function () {
                    window.location.href = "login_member"; 
                }, 1000);
            } else {
                alertify.error(response.message); 
                $('.spinner').hide();
            }
        }
    });
});