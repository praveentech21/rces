<?php
session_start();
if (!isset($_SESSION['supid'])) header("location: login.php");

include 'connect.php';

$participants = mysqli_query($conn, "SELECT * FROM `members` WHERE `particapation` ='oralpresen'");

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Mecap Certificate Generation</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="Bhavani/img/cup.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="Bhavani/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="Bhavani/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="Bhavani/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="Bhavani/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="Bhavani/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="Bhavani/vendor/libs/apex-charts/apex-charts.css" />

  <script src="Bhavani/vendor/js/helpers.js"></script>

  <script src="Bhavani/js/config.js"></script>
</head>

<body>

  <!-- Sidebar Starts Here Shiva -->
  <?php include 'header.php'; ?>
  <!-- Sidebar Ends Here Shiva -->

  <!-- Content Starts Here Shiva-->
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">

      <!-- Bordered Table -->
      <div class="card">
        <h5 class="card-header">Certificate for Oral Presentation</h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="registrationTable">
              <thead>
                <tr>
                  <th>NAME</th>
                  <th>DEPARTMENT</th>
                  <th>Certificate</th>
                  <th>WhatsApp</th>
                  <th>Mail</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_array($participants)) { ?>
                  <tr>
                    <td><strong><?php echo strtoupper($row['name']) ?></strong></td>
                    <td><?php echo $row['department'] ?></td>
                    <td><button type="button" class="btn rounded-pill btn-primary get-certificate" data-pid="<?php echo $row['mobile']; ?>" >Certificate</button></td>
                    <td><button type="button" class="btn btn-success whats-app" data-name="<?php echo $row['name'] ?>" data-pid="<?php echo $row['mobile']; ?>" ?>Whats App</button></td>
                    <td><button type="button" class="btn btn-danger email" data-name="<?php echo $row['name'] ?>" data-pid="<?php echo $row['email']; ?>" ?>Mail</button></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!--/ Bordered Table -->

      
    </div>
  </div>
  <!-- Content Ends Here Shiva -->

  <!-- Footer Starts Here Shiva-->
  <?php include 'footer.php'; ?>
  <!-- Footer Ends Here Shiva-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      // Add a click event listener to the buttons with the class "conform-payment"
      $(".get-certificate").click(function() {
        // Get the user ID from the data attribute
        var pid = $(this).data("pid");

        // Send an AJAX request to update the database
        $.ajax({
          type: "POST",
          url: "certificate/oralpresentation.php", // Replace with the URL of your PHP script
          data: {
            rollno: pid,
          }, // Send the user ID to the server
          success: function(response) {
            // Handle the server response if needed
            console.log("Server Response:", response);

            var link = document.createElement("a");

            // Set the href attribute to the file URL
            link.href = "http://saipraveen.free.nf/srkrmecap/certificate/tmp/" + pid + ".png";

            // Set the download attribute to specify the filename
            link.download = pid + ".png";

            // Trigger a click event on the anchor element
            link.click();

            window.open("http://saipraveen.free.nf/srkrmecap/certificate/tmp/" + pid + ".png" , "_blank");

          },
          error: function() {
            // Handle errors if the AJAX request fails
            console.error("Error in Generating Certificate.");
          }
        });
      });
      $(".whats-app").click(function() {
        // Get the user ID from the data attribute
        var phoneNumber = $(this).data("pid");
        var name = $(this).data("name");

        var message = "Dear " + name + ",\nThank You for being a part of SRKR MECAP 2023\n ";

        // Encode the message for use in a URL
        var encodedMessage = encodeURIComponent(message);

        // Construct the WhatsApp URL
        var whatsappURL = "https://wa.me/" + phoneNumber + "?text=" + encodedMessage;

        // Open WhatsApp with the pre-filled message
        window.open(whatsappURL, "_blank");
      });
      $(".email").click(function() {
        // Get the user's email from the data attribute
        var email = $(this).data("pid");
        var name = $(this).data("name");
        name = name.toUpperCase();

        var subject = "SRKR MECAP 2023";
        var message = "Dear " + name + ",\nThank You for being a part of SRKR Mecap 2023\n";

        // Encode the message for use in a URL
        var encodedMessage = encodeURIComponent(message);

        // Construct the mailto URL
        var mailtoURL = "mailto:" + email + "?subject=" + subject + "&body=" + encodedMessage ;

        // Open the default email client with the pre-filled message
        window.location.href = mailtoURL;
      });

    });
  </script>
  <script>
    $(document).ready(function() {
      // Cache the table rows for better performance
      var rows = $("#registrationTable tr");

      // Bind the input field's keyup event
      $("#searchInput").keyup(function() {
        var searchText = $(this).val().toLowerCase();

        // Iterate through each table row
        rows.each(function() {
          var name = $(this).find("td:nth-child(1)").text().toLowerCase();
          var regno = $(this).find("td:nth-child(2)").text().toLowerCase();
          var department = $(this).find("td:nth-child(3)").text().toLowerCase();

          // Check if the search text matches any of the row data
          if (
            name.includes(searchText) ||
            regno.includes(searchText) ||
            department.includes(searchText)
          ) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });
    });
  </script>



</body>

</html>