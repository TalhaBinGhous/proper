<?php 
include_once('config.php');
session_start();;
if(isset($_SESSION['admin'])){
   
}else{
    header("Location: adminlogin.php");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/adminindex.css">
    <link rel="stylesheet" href="./css/booktable.css">
    <script src="./js/jquery.js"></script> 
    <script src="./js/ajex.js"></script> 
   
</head>
<body>
    <div class="container">
        <div class="side-menus">
            <img src="./icons/logo-1.jpg" alt="">
            <ul class="menus">
            <a href="adminhome.php"><li>Home</li></a>
                <a href="adminindex.php"><li>Add Book</li></a>
                <a href="booktable.php"><li>Book Table</li></a>
                <a href="orderstable.php"><li>Orders</li></a>
                <a href="customertable.php"><li>Customer</li></a>
                <a href="adminlogout.php"><li>Log Out</li></a>
            
            </ul>

        </div>
        <div class="main">
            <div class="title">
                <h1>3</h1>
                <h2>Book Table</h2>
            </div>

            <div class="main-content">
            <div class="search-box">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Code..">
            <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search by names..">
            <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search by category..">
            </div>

        <table id="myTable">
        <tr>
            <th>Book Code</th>
            <th>Book Name</th>
            <th>Image</th>
            <th>Price</th>
			<th>Quantity</th>
			<th>Category</th>
            <th>Edit & Delete</th>
        </tr>
        <?php 
       $stmt = $con->query("SELECT * FROM book "); 
       while ($res = $stmt->fetch()) {    
            echo "<tr>";
            echo "<td id='code'>".$res['book_code']."</td>";
            echo "<td id='name'>".$res['book_name']."</td>";
            echo "<td><img src='uploads/".$res['book_img']."'></td>";
            echo "<td id='price'>".$res['book_price']."</td>";
			echo "<td id='quantity'>".$res['book_quantity']."</td>";
            echo "<td id='category'>".$res['book_category']."</td>";
            echo "<td><a  href=\"editbook.php?id=$res[book_code]\"><div class='edit'>Edit</div></a> <a href=\"deletebook.php?id=$res[book_code]\" onClick=\"return confirm('Are you sure you want to delete?')\"><div class='delete'>Delete</div></a></td>";
			echo "</tr>";
        }
        ?>
    </table>


            </div>

        </div>
    </div>

     <!-- Search Script -->
     
     <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function myFunction2() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


function myFunction3() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput3");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


</script>




</body>
</html>