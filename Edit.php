<?php 
    include_once "db_conn.php";
    
    
// Check if the owner_id parameter is set in the URL
if (isset($_GET['owner_id']) && isset($_GET['offset'])) {
    $owner_id = $_GET['owner_id'];
    $offset_value = $_GET['offset'];
   
    // Use $owner_id as needed (e.g., for database queries or processing)
} else {
    // Handle the case where no owner_id is provided
    echo "Owner ID is missing in the URL.";
}
$sql = "SELECT * FROM `form` ORDER BY owner_id DESC LIMIT 1 OFFSET $offset_value";

/*$sql = "SELECT * FROM `form` ORDER BY owner_id DESC LIMIT 1";*/
$rest=(mysqli_query($conn, $sql));
$row = mysqli_fetch_assoc($rest);

if(isset($_POST['submit']))
{
    $owner_name=$_POST['owner_name'];
    $owner_address=$_POST['owner_address'];
    $owner_contact_no=$_POST['owner_contact_no'];
    $vehicle_number=$_POST['vehicle_number'];
    $vehicle_make=$_POST['vehicle_make'];
    $vehicle_model=$_POST['vehicle_model'];
    $mileage=$_POST['mileage'];
    $service_station_name=$_POST['service_station_name'];
    $service_station_address=$_POST['service_station_address'];
    $service_station_contact_no=$_POST['service_station_contact_no'];
    $service_date=$_POST['service_date'];
    $appointment_number=$_POST['appointment_number'];
    $service_type=$_POST['service_type'];

    $labor_hours=$_POST['labor_hours'];
    if ($labor_hours=="10+") {
        $labor_hours=11;
    }

   // echo $owner_id;
    if(empty($owner_name) || empty($owner_address) || empty($owner_contact_no) || empty($vehicle_number)  || empty($vehicle_model) || empty($mileage) || empty($service_station_name) || empty($service_station_address) || empty($service_station_contact_no) || empty($service_date) || empty($appointment_number) || empty($service_type) || empty($labor_hours))
    {
        if(empty($owner_name)){
            header("Location: index.php?msg=not null");
        }
        
        header("Location:Edit.php?error=emptyinput");
    }
   // else{                                  
        $sql = "UPDATE `form` SET `owner_id`='$owner_id', `owner_name`='$owner_name', `owner_address`='$owner_address', `owner_contact_no`='$owner_contact_no',
        `vehicle_number`='$vehicle_number', `vehicle_make`='$vehicle_make', `vehicle_model`='$vehicle_model', `mileage`='$mileage',
        `service_station_name`='$service_station_name', `service_station_address`='$service_station_address', `service_station_contact_no`='$service_station_contact_no',
        `service_date`='$service_date', `appointment_number`='$appointment_number', `service_type`='$service_type', `labor_hours`='$labor_hours' WHERE `owner_id`='$owner_id'";                             
                                      
        $rest = mysqli_query($conn, $sql);
        if($rest){
            header("Location: index.php?msg=New recode update successfully");
        }else{
            echo"Failed: " . mysqli_error($conn);
        }  
   // }
}?>
         <!------------------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="styles.css">


    </style>
</head>
<body>
    
    
    <div class="header">
        <div class="header-item">
            <img class="logo"src="autocare.png" alt="logo">
        </div>
        <div class="header-item">
            <h1 class="subject">Vehicle service record</h1>
        </div>
        <div class="header-item">
            <a href="records.php">
                <button class="btn1">Recodes</button>
            </a>
        </div>
        
    </div>
    <br><br><br><br><br>
    <div class="form1">
        <form action="" method="post">
            <label class="form-label" for="fname">Owner Details</label>
           
            <input type="text" id="fname" name="owner_name" placeholder="Name" value="<?php echo $row["owner_name"] ?>">
            <input type="text" id="fname" name="owner_address" placeholder="Address" value="<?php echo $row["owner_address"] ?>">
            <input type="text" id="fname" name="owner_contact_no" placeholder="Contact No." value="<?php echo $row["owner_contact_no"] ?>">

            <label class="form-label" for="fname">Vehicle Details</label>
            <input type="text" id="fname" name="vehicle_number" placeholder="Vehicle Number (cab1212)" value="<?php echo $row["vehicle_number"] ?>">
            <select id="make" name="vehicle_make">
                <option value="" disabled selected><?php echo $row["vehicle_make"] ?></option>
                <option value="Toyota">Toyota</option>
                <option value="Ford">Ford</option>
                <option value="Honda">Honda</option>
                <option value="Chevrolet">Chevrolet</option>
                <option value="Volkswagen">Volkswagen</option>
                <option value="Nissan">Nissan</option>
                <option value="BMW">BMW</option>
                <option value="Mercedes-Benz">Mercedes-Benz</option>
                <option value="Hyundai">Hyundai</option>
                <option value="Subaru">Subaru</option>
                <option value="Audi">Audi</option>
                <option value="Kia">Kia</option>
                <option value="Jeep">Jeep</option>
                <option value="Mazda">Mazda</option>
                <option value="Tesla">Tesla</option>
                <option value="Porsche">Porsche</option>
                <option value="Ferrari">Ferrari</option>
                <option value="Lamborghini">Lamborghini</option>
                <option value="Aston Martin">Aston Martin</option>
                <option value="Rolls-Royce">Rolls-Royce</option>
                <option value="Jaguar">Jaguar</option>
                <option value="Land Rover">Land Rover</option>
                <option value="Lexus">Lexus</option>
                <option value="Volvo">Volvo</option>
                <option value="Mitsubishi">Mitsubishi</option>
                <option value="Dodge">Dodge</option>
                <option value="Buick">Buick</option>
                <option value="Cadillac">Cadillac</option>
                <option value="GMC">GMC</option>
                <option value="Acura">Acura</option>
                <option value="Infiniti">Infiniti</option>
                <option value="Alfa Romeo">Alfa Romeo</option>
                <option value="Mini">Mini</option>
                <option value="Fiat">Fiat</option>
                <option value="Maserati">Maserati</option>
                <option value="Bentley">Bentley</option>
                <option value="Bugatti">Bugatti</option>
                <option value="McLaren">McLaren</option>
                <option value="Ram">Ram</option>
                <option value="Subaru">Subaru</option>
                <option value="Pagani">Pagani</option>
                <option value="Maybach">Maybach</option>
                <option value="Karma">Karma</option>
                <option value="Rivian">Rivian</option>
                <option value="Lucid Motors">Lucid Motors</option>
                <option value="Polestar">Polestar</option>
                <option value="Rimac">Rimac</option>
                <option value="Genesis">Genesis</option>
                <option value="Faraday Future">Faraday Future</option>
                <option value="Fisker">Fisker</option>
            </select>
            <input type="text" id="fname" name="vehicle_model" placeholder="Model" value="<?php echo $row["vehicle_model"] ?>"> 
            <input type="text" id="fname" name="mileage" placeholder="Mileage in KM (25000)" value="<?php echo $row["mileage"] ?>">

            <label class="form-label" for="fname">Service Information</label>
            <input type="text"  name="service_station_name" placeholder="Service Station Name" value="<?php echo $row["service_station_name"] ?>">
            <input type="text"  name="service_station_address" placeholder="Service Station Address" value="<?php echo $row["service_station_address"] ?>">
            <input type="text"  name="service_station_contact_no" placeholder="Service Station Contact No." value="<?php echo $row["service_station_contact_no"] ?>">
            <input type="date"  name="service_date" placeholder="Service Date" value="<?php echo $row["service_date"] ?>">
            <input type="text"  name="appointment_number" placeholder="Appointment Number" value="<?php echo $row["appointment_number"] ?>">

            <label class="form-label-SType" for="fname">Service Type</label>   
            <div class="form-label-SType">
                
            <div class="form-label-SType">          
                <input type="radio" name="service_type" value="Body_Wash" <?php echo ($row['service_type'] == 'Body_Wash') ? 'checked' : ''; ?>>
                <label>Body Wash</label>

                <input type="radio" name="service_type" value="Repair_and_Maintain" <?php echo ($row['service_type'] == 'Repair_and_Maintain') ? 'checked' : ''; ?>>
                <label>Repair and Maintain</label>

                <input type="radio" name="service_type" value="Full_Service" <?php echo ($row['service_type'] == 'Full_Service') ? 'checked' : ''; ?>>
                <label>Full Service</label>
                 </div>
            </div>
            
            <select id="" name="labor_hours" Labor Hours >
                <option value="" enabled selected>
                <?php 
                if ($row["labor_hours"]==11) {
                    echo '10+';
                }
                else {
                    echo $row["labor_hours"];
                }
                ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">10+</option>
            </select>    
            
            <div class="btns">
                <button name="reset" type="reset" class="reset-btn">Reset</button>
                <button name="submit" type="submit" class="save-btn">Update</button>
            </div>
        </form>
    </div>
    <br><br><br><br>

    <div class="footer">       
        <p class="footer-text">Privacy & Policy | Terms of Use | About Us | Contact Us</p>
        
            <button class="btn2" href= "records.php">Back</button>         
    </div>
  

</body>
</html>