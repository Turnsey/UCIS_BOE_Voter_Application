<html>

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
<title>Advanced Search</title>

<div class="head">
    <h1><img src="seal-lg.png" alt="Ulster County Seal" height="45" width="45"> Advanced Search</h1>
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
        <input class="button" type="button" value="Back" onclick="goBack()" />
        <form id="form_search" action="search.php" method="POST"><br>
            <span title="VoterId"><input class="search" type="text" name="VoterId" placeholder="Voter Id"></span>
            <span title="First Name"><input class="search" type="text" name="FirstName" placeholder="First Name"></span><br>
            <span title="Last Name"><input class="search" type="text" name="LastName" placeholder="Last Name"></span>
            <span title="Address"><input class="search" type="text" name="ResidenceAddress" placeholder="Address"></span><br>
            <span title="City"><input class="search" type="text" name="City" placeholder="City"></span>
            <span title="Zipcode"><input class="search" type="text" name="Zip" placeholder="Zipcode"></span><br>
            <input class="search_btn" name="search" type="submit" value="Search" />
        </form>
    </div>
    <div class="head">
        <h2>Contact Us</h2>
        <h3 class="detail">
   
        </h3>
    </div>
</body>

</html>
