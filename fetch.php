<html>
<!--Links to external stylesheets and scripts-->
<div class="body">
    <?php
//fetch.php
include_once('dbconnect.php');
        
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT VoterId, LastName, FirstName, ResidenceAddress, DOB, City, State, Zip FROM voter_reg WHERE VoterId = '$search' OR CONCAT(Firstname, ' ', LastName) LIKE '%" . $search . "%' OR ResidenceAddress LIKE '%" . $search . "%' OR Zip LIKE '%" . $search . "%' ORDER BY LastName ASC LIMIT 75";
}
else
{
 $query = "
  SELECT VoterId, LastName, FirstName, ResidenceAddress, DOB, City, State, Zip FROM voter_reg ORDER BY LastName ASC LIMIT 100
 ";
}
$result = mysqli_query($conn, $query);
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

?>
</div>

</html>
