<?php

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "login";

    //try connecting database

     $conn = mysqli_connect($servername,$username,$password,$database_name);

    // Check connection
if (!$conn) {
  die('Error : no connection done');
}

$name = $email = $phone = $date = $time = $department = $message = "";
$name_err = $email_err = $phone_err = $date_err = $time_err = $department_err = $message_err = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = 'Name cannot be blank';
    } else{
        $name = trim($_POST['name']);
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = 'Email cannot be blank';
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    // Validate phone
    if(empty(trim($_POST["phone"]))){
        $phone_err = 'Phone cannot be blank';
    } else{
        $phone = trim($_POST['phone']);
    }
    
    // Validate date
    if(empty(trim($_POST["date"]))){
        $date_err = 'Date cannot be blank';
    } else{
        $date = trim($_POST['date']);
    }

    // Validate time
    if(empty(trim($_POST["time"]))){
        $time_err = 'Time cannot be blank';
    } else{
        $time = trim($_POST['time']);
    }

    // Validate department
    if(empty(trim($_POST["department"]))){
        $department_err = 'Department cannot be blank';
    } else{
        $department = trim($_POST['department']);
    }

    // Validate message
    if(empty(trim($_POST["message"]))){
        $message_err = 'Message cannot be blank';
    } else{
        $message = trim($_POST['message']);
    }

    // If there were no errors, go ahead and insert into the database
    if(empty($name_err) && empty($email_err) && empty($phone_err) && empty($date_err) && empty($time_err) && empty($department_err) && empty($message_err))
    {
        $sql = "INSERT INTO appointments (name, email, phone, appointment_date, appointment_time, department, message) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt)
        {
            mysqli_stmt_bind_param($stmt, "sssssss", $param_name, $param_email, $param_phone, $param_date, $param_time, $param_department, $param_message);

            // Set these parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone = $phone;
            $param_date = $date;
            $param_time = $time;
            $param_department = $department;
            $param_message = $message;

            // Try to execute the query
            if (mysqli_stmt_execute($stmt))
            {
                header("location: index.html");
            }
            else{
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>






<!-- ======= Appointment Section ======= -->
<section id="appointment" class="appointment section-bg">
  <div class="container">

    <div class="section-title">
      <h2>Make an Appointment</h2>
      
    </div>

    <form action="forms/appointment.php" method="POST" role="form" class="php-email-form">
      <div class="row">
        <div class="col-md-4 form-group">
          <input type="text" name="name" class="form-control" id="names" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
          <div class="validate"></div>
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
          <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
          <div class="validate"></div>
        </div>
        <div class="col-md-4 form-group mt-3 mt-md-0">
          <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
          <div class="validate"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 form-group mt-3">
          <input type="date" name="date" class="form-control datepicker" id="date" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
          <div class="validate"></div>
        </div>
        
        <div class="col-md-4 form-group mt-3">
          <input type="time" name="date" class="form-control datepicker" id="time" placeholder="Appointment Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
          <div class="validate"></div>

          
        
      </div>
      <div class="col-md-4 form-group mt-3">
        <select name="department" id="department" class="form-select">
          <option value="">Select Department</option>
          <option value="Department 1">Physiotherapy</option>
          <option value="Department 2">Mental Health Care</option>
          <option value="Department 3">Diet and Nutrition</option>
        </select>
        <div class="validate"></div>
      </div>

        <div class="form-group mt-3">
          <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message (Optional)"></textarea>
        <div class="validate"></div>
      </div>
      <div class="mb-3">
        
        <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
      </div>
      <div class="text-center"><button type="submit" id="button">Make an Appointment</button></div>
    </form>

  </div>
</section><!-- End Appointment Section -->