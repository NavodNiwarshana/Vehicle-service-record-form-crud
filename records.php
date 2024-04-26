<?php

    include_once "db_conn.php";
    $offset_value=0;
     
        $sql = "SELECT * FROM `form` ORDER BY owner_id DESC LIMIT 1 OFFSET $offset_value";
        /*$sql = "SELECT * FROM `form` ORDER BY owner_id DESC LIMIT 1";*/
        $result=(mysqli_query($conn, $sql));

           
            while ($row = mysqli_fetch_assoc($result)) 
            { 
                   /**-------------------------------------------------------------------------------------------------------------- */
                    $sql1 = "SELECT labor_hours FROM form";
                    $result1 = mysqli_query($conn, $sql1);
                    
                    $sql2 = "SELECT * FROM labor_hours";
                    $result2 = mysqli_query($conn, $sql2);

                    if ($result1 && $result2) {
                        $row1 = mysqli_fetch_assoc($result1);
                        $row2 = mysqli_fetch_assoc($result2);

                       // Multiply the values from both tables
                       $result3 = $row1['labor_hours'] * $row2['rate'];
                       $id= $row["owner_id"];              
                                   

            } else {
                return "Error fetching data from the database.";
            }
              ?>                              
             <!------------------------------------------------------------------------------------------------->
                            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">

    
    <title>records</title>
</head>
<body>
    <div class="backimg">

        <div class="header">
            <div class="header-item">
                <img class="logo"src="autocare.png" alt="logo">
            </div>
            <div class="header-item">
                <h1 class="subject">Vehicle service record</h1>
            </div>
            <div class="header-item">
                <a href="index.php">
                    <button class="btn1">Form</button>
                </a>
            </div>  
        </div>
        <!----------------------------------------------------------------------------------------------------------------------------->
        <br><br><br><br>
                <h1 class="sub2">Service Report</h1>
                </div> 
                <div class="values-table">
                    <br><br>
                    <table>

                        <tr>
                            <td class="subject-td">Service Date</td>
                            <td class="data-td"><?php echo $row["service_date"] ?></td>
                        </tr>
                        <tr>
                            <td class="subject-td">Appoinment No.</td>
                            <td class="data-td"><?php echo $row["appointment_number"] ?></td>
                        </tr>
                        <tr>
                            <td class="subject-td">Owner Name</td>
                            <td><?php echo $row["owner_name"] ?></td> 
                        </tr>
                        <tr>
                            <td class="subject-td">Owner Address</td>
                            <td><?php echo $row["owner_address"] ?></td>
                        </tr>
                        <tr>
                            <td>Owner Contact No.</td>
                            <td><?php echo $row["owner_contact_no"] ?></td>
                        </tr>
                        <tr>
                            <td>Vehicle Number</td>
                            <td><?php echo $row["vehicle_number"] ?></td>
                        </tr>
                        <tr>
                            <td>Vehicle Brand & Model</td>
                            <td><?php echo $row["vehicle_make"] . " - " . $row["vehicle_model"] ?></td>
                        </tr>
                        <tr>
                            <td>Service Station</td>
                            <td><?php echo $row["service_station_name"] ?></td>
                        </tr>
                        <tr>
                            <td>Service Station Location</td>
                            <td><?php echo $row["service_date"] ?></td>
                        </tr>
                        <tr>
                            <td>Service Station Contact No.</td>
                            <td><?php echo $row["service_date"] ?></td>
                        </tr>
                        <tr>
                            <td>Service Type</td>
                            <td><?php echo $row["service_type"] ?></td>
                        </tr>
                        <tr>
                            <td>Service Charge</td>
                            <td><?php echo $row2["service_charge"] ?></td>
                        </tr>
                        <tr> 
                            <td>Labor Charge</td>
                            <td><?php echo $result3 ?></td>
                        </tr>
                        <tr>
                            <td>Total Service Charge</td>
                            <td><?php echo $result3 + $row2["service_charge"]?></td>
                        </tr>
                        <tr>
                            <td>Current Mileage</td>
                            <td><?php echo $row["mileage"] ." KM"?> </td>
                        </tr>
                        <tr class="NextService-tr">
                            <td>Next Service</td>
                            <td><?php echo $row["mileage"] +3000 . " KM"; ?></td>
                        </tr>  
                    
                    </table><br>
                   
                    
                    <div class ="option-btn">
                    <a href="Edit.php?owner_id=<?php echo $row['owner_id']; ?>&offset=<?php echo $offset_value; ?>">
                            <button class="edit-btn">Edit</button>
                        </a>
                        <a href="delete.php">
                        <a href="delete.php?owner_id=<?php echo $row["owner_id"]; ?>&offset=<?php echo $offset_value; ?>">
                            <button class="delete-btn">delete</button>
                        </a>
                        <?php

                    } ?>   
                    </div>
                </div> 
                <br><br></br><br>
                <p class="copyright">&copy All Right Reseved</p>
                <br>
    <!-------------------------------------------------------------------------------------------------------------------------->
        <div class="footer">           
            <p class="footer-text">Privacy & Potdcy | Terms of Use | About Us | Contact Us</p>
            <button class="btn2" onclick="printPage()">Print</button>
                        
        </div>
    </div>
    <script>
        function printPage() {
            window.print();
        }

        function incrementOffset() {
        offset_value++;
        updateOffset();
    }

    // Function to decrement offset_value
    function decrementOffset() {
        offset_value--;
        updateOffset();
    }
    function updateOffset() {
        // Construct the URL with the updated offset value
        var newUrl = window.location.href.split('?')[0] + '?offset=' + offset_value;

        // Redirect to the new URL
        window.location.href = newUrl;
    }
    function decrementOffset() {
        location.reload(); // Reload the current page
    }
    </script>
</body>
</html>