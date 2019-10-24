<!DOCTYPE html>
<html>
<!--Links to external stylesheets and scripts-->

<head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<title>Voter Profile</title>

<div class="head">
    <h1><img src="seal-lg.png" alt="Ulster County Seal" height="45" width="45"> BOE Registered Voter Profile</h1><br><br>
</div>

<body>
    <div class="topnav">
        <input class="button" type="button" value="Back" onclick="goBack()" />
        <br><br>

        <h3 class="detail">
            <?php
    include_once('dbconnect.php');
        $VoterId=$_GET['VoterId'];
     
   
    $sql = "SELECT VoterId, LastName, FirstName, MiddleName, DOB, Status, Party, ResidenceAddress, City, State, Zip, Town, Ward, District, Cong, Sex, StateSen, StateLeg, School, VoterStateId FROM voter_reg WHERE VoterId = '$VoterId'";
    $sqlresult = mysqli_query($conn,$sql);
    
    
    while ($row = $sqlresult->fetch_assoc()){
        echo "<strong>Name:</strong> {$row['LastName']}".
            ", {$row['FirstName']}".
            " {$row['MiddleName']} <br><br>".
    
            "<strong>Address:</strong> {$row['ResidenceAddress']}".
            " {$row['City']}".
            ", {$row['State']}".
            " {$row['Zip']}<br><br>".
            
            "<strong>Voter Id:</strong> {$row['VoterId']} <br>".
            "<strong>DOB:</strong> {$row['DOB']} <br>".
            "<strong>Sex:</strong> {$row['Sex']} <br>".
            "<strong>Party:</strong> {$row['Party']} <br>".
            "<strong>Status:</strong> {$row['Status']}<br><br>".
            
            "<strong>Jurisdictions</strong> <br><ul>".
            "<li><strong>Town:</strong> {$row['Town']} </li>".
            "<li><strong>Ward:</strong> {$row['Ward']} </li>".
            "<li><strong>District:</strong> {$row['District']} </li>".
            "<li><strong>Congressional District:</strong> {$row['Cong']} </li>".
            "<li><strong>State Senate District:</strong> {$row['StateSen']} </li>".
            "<li><strong>NYS Assembly District:</strong> {$row['StateLeg']} </li>".
            "<li><strong>School District:</strong> {$row['School']} </li></ul>";
            $conn->close();
        }
?>
        </h3>
    </div>
    <div class="head">
        <h2>Contact Us</h2>
        <h3 class="detail">
            
        </h3>
    </div>
</body>

</html>
