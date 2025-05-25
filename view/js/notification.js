$(document).ready(function () {

  // Function to fetch notifications count and data
const getNotificationCount = () => {
  $.ajax({
    url: 'backend/end-points/notification.php',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      console.log(response);

      const TotalVisitUnseen = response.TotalVisit;
      const reports = response.reports || [];

      // Update badge count
      $('#TotalVisitUnseen').text(TotalVisitUnseen);

      if (TotalVisitUnseen > 0) {
        $('#TotalVisitUnseen').show();
      } else {
        $('#TotalVisitUnseen').hide();
      }

      // Only update notification content if popup is hidden
      if ($('#notificationPopup').hasClass('hidden')) {
        if (reports.length > 0) {
          let contentHtml = '';

          reports.forEach(report => {
            contentHtml += `
              <div class="mb-2 border-b pb-2">
                <p><strong>${report.ViewerUser}</strong> viewed <strong>${report.ViewedUser}</strong>'s profile.</p>
                <p class="text-xs text-gray-500">${report.view_date}</p>
              </div>
            `;
          });

          $('#notificationContent').html(contentHtml);
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
