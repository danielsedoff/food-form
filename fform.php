<?php
 /* DATA */
 $thead = 
 "<html>
   <head>
    <style>
     table {
      border-collapse: collapse; 
      border:1px solid black;
     } 
     table td {
      border:1px solid black;
      padding:5px;
      text-align: center;
      padding-top:19px;
      padding-bottom:19px;
      font-size:40px;
     }
    </style>
   </head>
  <body>
   <table width=\"100%\">
    <thead>
     <tr style=\"background-color:lightgray;\">
      <td>Time</td>
      <td>Snacks</td>
      <td>Content</td>
      <td>Portion</td>
      <td>Price</td>
     </tr>
    </thead>
    <tbody>
     <tr>
      <td>";
 $tfoot = 
 "    </td>
     </tr>
    </tbody>
   </table>";

$the_filename = 'food-form.csv';   
 
 /* CODE */

if(isset ($_GET["uu364"])) {
 if($_GET["uu364"] != "a83oygvz70") {
  die ("Error: wrong key.\n");
 }
 $log = file_get_contents($the_filename);

 $log = str_replace("; end;", "</td></tr><tr><td>", $log);
 $log = str_replace("; ", "</td><td>", $log);
 echo($thead . $log . $tfoot);
};

if(isset($_POST["the_entry"])) {
 $the_entry = $_POST["the_entry"];
 if(strlen($the_entry) > 100) {
  die("Error: the request is too long.\n");
 }
 
 $log = file_get_contents($the_filename);
 $log = $the_entry . $log;
 
 file_put_contents ($the_filename, $log);
 
 /* check */
 
 $log = file_get_contents($the_filename);
 if (strpos($log, $the_entry) === false) {
  echo ("Error");
 } else {
  echo ("Success");
 }
}



?>

