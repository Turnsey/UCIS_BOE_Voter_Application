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
<title>Voter Search</title>

<div class="head">
    <h1><img src="seal-lg.png" alt="Ulster County Seal" height="45" width="45"> BOE Registered Voter Search</h1>
    <?php
        require 'functions.php';
    
        include_once('dbconnect.php');
        
        $sql = "SELECT UPDATE_TIME FROM information_schema.tables WHERE TABLE_SCHEMA = 'boe_voter_reg' AND TABLE_NAME = 'voter_reg'";
        $sqlresult = mysqli_query($conn,$sql);
        
         while ($row = $sqlresult->fetch_assoc()){
            echo "<strong>Data Refreshed:</strong> {$row['UPDATE_TIME']}";
             
         }
        ?>
</div>

<body>
    <div id=body>
        <input class="button" type="button" value="Back" onclick="goBack()" /><br>
        <?php
        include_once('dbconnect.php');
        $output = ''; 
        if(isset($_POST['search'])){
        $fields = array('VoterId','FirstName','LastName','ResidenceAddress','City','Zip');
        $conditions = array();
            
            foreach($fields as $field){
                
                if(isset($_POST[$field]) && $_POST[$field] != ''){
                    
                    $conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($conn,$_POST[$field]) . "%'";
                }
            }
            
 $query = "SELECT VoterId, LastName, FirstName, DOB, ResidenceAddress, City, State, Zip FROM voter_reg ";
            
            if(count($conditions) > 0){
                $query .= "WHERE " . implode(' AND ', $conditions);
            }
            else{
                $query .= "LIMIT 100";
            }

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div id="table" class="table-responsive">
   <table class="table">
    <tr>
     <th>Action</th>
     <th>Last Name</th>
     <th>First Name</th>
     <th>DOB</th>
     <th>Residence Address</th>
     <th>City</th>
     <th>State</th>
     <th>Zip</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td><a class="link" href=\details.php?VoterId='.$row["VoterId"] .'>Details</a></td>
    <td>'.$row["LastName"].'</td>
    <td>'.$row["FirstName"].'</td>
    <td>'.$row["DOB"].'</td>
    <td>'.$row["ResidenceAddress"].'</td>
    <td>'.$row["City"].'</td>
    <td>'.$row["State"].'</td>
    <td>'.$row["Zip"].'</td>
   </tr>
   
  ';
 }
 echo $output;
}
else
{
 echo '<h4><strong>No Data Found</strong></h4>';
}
}
?>
    </div>
</body>

</html>
