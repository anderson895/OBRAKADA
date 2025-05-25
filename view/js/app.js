$("#UpdatePortfolioForm").submit(function (e) { 
    e.preventDefault();

    var fullname = $("#user_fullname").val();
    var email = $("#user_email").val();

    // Basic validation
    if (fullname === '') {
        alertify.error("Full Name is required.");
        return;
    }

    if (email === '') {
        alertify.error("Email is required.");
        return;
    }
    
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        alertify.error("Invalid email format.");
        return;
    }

    $('#btnUpdatePortfolio').prop('disabled', true);
    $('#btnUpdatePortfolio').text('Updating...');

    // Create FormData from the form element (this will include file inputs automatically)
    var formData = new FormData(this);

    // Add extra data if needed
    formData.append('requestType', 'UpdatePortfolio');

    $.ajax({
        type: "POST",
        url: "backend/end-points/controller.php",
        data: formData,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        dataType: "json",
        success: function (response) {
            if (response.status === 'success') {
                alertify.success(response.message);
                
                $('#btnUpdatePortfolio').prop('disabled', false);
                $('#btnUpdatePortfolio').text('Save');
                
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                alertify.error(response.message); 
                $('#btnUpdatePortfolio').prop('disabled', false);
                $('#btnUpdatePortfolio').text('Save');
            }
        }
    });
});
