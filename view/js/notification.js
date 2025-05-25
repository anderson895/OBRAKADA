$(document).ready(function () {

  // Function to fetch notifications count and data
const getNotificationCount = () => {
  $.ajax({
    url: 'backend/end-points/notification.php',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      console.log(response);

      let TotalVisitUnseen = response.TotalVisit;
      let ViewedUser = response.ViewedUser;
      let ViewerUser = response.ViewerUser;
      let view_date = response.view_date;

      // Update badge count
      $('#TotalVisitUnseen').text(TotalVisitUnseen);

      if (TotalVisitUnseen > 0) {
        $('#TotalVisitUnseen').show();
      } else {
        $('#TotalVisitUnseen').hide();
      }

      // Only update notification content if popup is hidden
      if ($('#notificationPopup').hasClass('hidden')) {
        if (TotalVisitUnseen > 0) {
          $('#notificationContent').html(`
            <div>
              <p><strong>${ViewerUser}</strong> viewed <strong>${ViewedUser}</strong>'s profile.</p>
              <p class="text-xs text-gray-500">${view_date}</p>
            </div>
          `);
        } else {
          $('#notificationContent').html('<p>No new notifications</p>');
        }
      }
    },
    error: function(xhr, status, error) {
      console.error("Error fetching notifications:", error);
    }
  });
};

  // Run initially and every 3 seconds
  getNotificationCount();
  setInterval(getNotificationCount, 3000);

  // Toggle notification popup & mark notifications as seen on click
  $('#notificationBtn').click(function (e) {
    e.preventDefault();

    // Toggle popup visibility
    $('#notificationPopup').toggleClass('hidden');

    // If popup shown, mark notifications as seen
    if (!$('#notificationPopup').hasClass('hidden')) {
      $.ajax({
        url: 'backend/end-points/notification.php',
        type: 'POST',
        data: { markSeen: true },
        success: function(response) {
          console.log("Notifications marked as seen", response);
        },
        error: function(xhr, status, error) {
          console.error("Failed to mark notifications as seen:", error);
        }
      });
    }
  });

});
