<html>
<head>  
          <title>Live Table Data Edit Delete using Tabledit Plugin in PHP</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <script src="jquery.tabledit.min.js"></script>
    </head>  
<body>
<button onclick="myFunction()">Click me</button>

<p id="demo"></p>


<?php
$objCSV = fopen("t1.csv", "r");
?>
<table width="600" border="1" id="editable_table"  class="table table-bordered table-striped">
  <tr>
    <th width="91"> <div align="center">Date</div></th>
    <th width="98"> <div align="center">Name</div></th>
    <th width="198"> <div align="center">Province</div></th>
    <th width="97"> <div align="center">Type</div></th>

  </tr>
<?php

while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
    $temp=[];
?>
  <tr>
    <td><div align="center"contenteditable><?php array_push($temp,(string)$objArr[0]); echo $objArr[0];?></div></td>
    <td><?php echo $objArr[1];?></td>
    <td><?php echo $objArr[2];?></td>
    <td><div align="center"><?php echo $objArr[3];?></div></td>

  </tr>
  
 
<?php

}
fclose($objCSV);

?>

</table>
<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "<?php echo $temp[1] ?>".toString()
}
</script>
</body>
</html>
<script>  
 $("#editable_table").on("click", "tr", function() {
     console.log("111");

});
// $(document).ready(function(){  
//      $('#editable_table').Tabledit({
//       url:'action.php',
//       columns:{
//        identifier:[0, "Date"],
//        editable:[[1, 'Name'], [2, 'Province'], [3, 'Type']]
//       },
//       restoreButton:false,
//       onSuccess:function(data, textStatus, jqXHR)
//       {
//        if(data.action == 'delete')
//        {
//         $('#'+data.id).remove();
//        }
//       }
//      });
 
// });  
 </script>