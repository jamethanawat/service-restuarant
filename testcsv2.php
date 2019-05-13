<html>
<head>  
          <title>Live Table Data Edit Delete using Tabledit Plugin in PHP</title>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
    <!-- <script src="jquery.tabledit.min.js"></script> -->

    <!-- <link href="css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="js/plugins/sweetalert/sweetalert.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    </head>  
<body>





<?php
 showtable();
function showtable()
{
$connect = mysqli_connect("localhost","id9411788_test2","12345678","id9411788_test2");
$query = "SELECT * FROM test3";
$result = mysqli_query($connect, $query);
?>
<table width="900" border="1" id="editable_table"  class="table table-bordered table-striped">
<thead>
      <tr>
      <th width="auto"> <div align="center">Date</div></th>
    <th width="auto"> <div align="center">Name</div></th>
    <th width="auto"> <div align="center">Province</div></th>
    <th width="auto"> <div align="center">Type</div></th>
    <th width="auto"> <div align="center"></div></th>
      </tr>
     </thead>
     <tbody>
     <?php
   
     while($row = mysqli_fetch_array($result))
     {
         
      echo '
      <tr>
       <td>'.$row["c"].'</td>
       <td>'.$row["d"].'</td>
       <td>'.$row["e"].'</td>
       <td>'.$row["f"].'</td>
       <td><button id="deleteitem" class="btn btn-danger btn-sm" type="button" name='.$row["b"].'><i class="glyphicon glyphicon-trash"></i>  <span class="bold">Delete</span></button></td>
      </tr>
      ';
        
     }
    }
     ?>
     </tbody>

</table>

</body>
</html>
<script>  

 $("#editable_table").on("click", "tr", function() {
     console.log("111");

});
$("#editable_table").on("click", "#deleteitem", function () {
    
var id = $(this).attr("name");
event.preventDefault(); 
  
       swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
            $.ajax({
			   		url: 'detestcsv2.php?id='+id,
			    	type: 'GET',
			       	data: 'delete='+id,
			       	dataType: 'json'
			     })
                 swal("success :)", "success");
                 document.location.reload();
      
        } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
      });



});

 </script>