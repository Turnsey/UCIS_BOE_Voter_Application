<html>
<title>Voter Search</title>

<div class="head">
    <h1 id="header"><img src="seal-lg.png" alt="Ulster County Seal" height="45" width="45"> BOE Registered Voter Search</h1>
    <?php
        
    require('functions.php');
    
        include_once('dbconnect.php');
        
        $sql = "SELECT UPDATE_TIME FROM information_schema.tables WHERE TABLE_SCHEMA = 'boe_voter_reg' AND TABLE_NAME = 'voter_reg'";
        $sqlresult = mysqli_query($conn,$sql);
        
         while ($row = $sqlresult->fetch_assoc()){
            echo "<strong>Data Refreshed:</strong> {$row['UPDATE_TIME']}";
             
         }
        ?>
</div>

<body>
    <div id="body">
        <br />
        <a class="link" href=\advanced.php>Advanced Search</a>
        <br />
        <span title="Search By VoterId, First/Last Name, Address, or Zipcode"><input class="text" type="text" name="search_text" id="search_text" placeholder="Search For Voter..." class="form-control" /></span>
        <br />
        <div id="result"></div>
    </div>


    <script>
        $(document).ready(function() {

            load_data();

            function load_data(query) {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {
                        query: query
                    },
                    success: function(data) {
                        $('#result').html(data);
                    }
                });
            }
            $('#search_text').keyup(function() {
                var search = $(this).val();
                if (search != '') {
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });

    </script>
    <div class="head">
        <h2>Contact Us</h2>
        <h3 class="detail">
            
        </h3>
    </div>
</body>

</html>
