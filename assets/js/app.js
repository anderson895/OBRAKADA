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






  $("#loginForm").submit(function (e) { 
    e.preventDefault();
    

    $('#btnLoginUser').prop('disabled', true);
    $('#btnLoginUser').text('Loading...');

    var formData = $(this).serializeArray(); 
    formData.push({ name: 'requestType', value: 'LoginMember' });
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
                    window.location.href = "view/home"; 
                }, 1000);
            } else {
                alertify.error(response.message); 
                $('#btnLoginUser').prop('disabled', false);
                $('#btnLoginUser').text('LOGIN');
            }
        }
    });
});











  $("#registerForm").submit(function (e) { 
    e.preventDefault();

    

    var fullname = $("#fullname").val();
    
    var email = $("#email").val();
    var password = $("#password").val();
    var confirmPassword = $("#confirm_password").val();

    // Basic validation
    if (fullname === '') {
        alertify.error("Full Name is required.");
        return;
    }
    
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alertify.error("Invalid email format.");
        return;
    }

    if (password === '') {
        alertify.error("Password is required.");
        return;
    }
    if (password.length < 6) {
        alertify.error("Password must be at least 6 characters.");
        return;
    }
    if (confirmPassword === '') {
        alertify.error("Confirm Password is required.");
        return;
    }
    if (password !== confirmPassword) {
        alertify.error("Passwords do not match.");
        return;
    }


    $('#btnRegisterUser').prop('disabled', true);
    $('#btnRegisterUser').text('Loading...');

    // All validations passed
    var formData = $(this).serializeArray(); 
    formData.push({ name: 'requestType', value: 'RegisterUser' });
    var serializedData = $.param(formData);

    $.ajax({
        type: "POST",
        url: "backend/end-points/controller.php",
        data: serializedData,
        dataType: "json", 
        success: function (response) {
            if (response.status === 'success') {
                alertify.success(response.message);
                
                $('#btnRegisterUser').prop('disabled', false);
                $('#btnRegisterUser').text('REGISTER');
                
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                alertify.error(response.message); 
                $('#btnRegisterUser').prop('disabled', false);
                $('#btnRegisterUser').text('REGISTER');
            }
        }
    });
});