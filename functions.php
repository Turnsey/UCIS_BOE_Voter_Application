        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script src="script.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<?php
    //Function that builds the main HTML Table for index.php
    function sql_to_html_table($sqlresult, $delim="\n") {
  // starting table
  $htmltable =  '<table id="table" class="table">' . $delim ;   
  $counter   = 0 ;
  // putting in lines
  while( $row = $sqlresult->fetch_assoc()  ){
    if ( $counter===0 ) {
      // table header
      $htmltable .=   "<tr><th>Action</th>"  . $delim;
      foreach ($row as $key => $value ) {
          $htmltable .=    "<th>" . $key . "</th>"  . $delim ;
      }
      $htmltable .=   "</tr>"  . $delim ; 
      $counter = 22;
    } 
      // table body

      $htmltable .=   "<tr><td><a class=\"link\" href=\"details.php?VoterId=" . $row["VoterId"] . "\">Details</a>"  . $delim ;
      //echo "<td>$key</td";
      foreach ($row as $key => $value ) {
          $htmltable .=   "</td>" . "<td>" . $value . "</td>"  . $delim ;
      }
      $htmltable .=   "</tr>"   . $delim ;
  }
  // closing table
  $htmltable .=   "</table>"   . $delim ; 
  // return
  return( $htmltable ) ; 
}

?>

