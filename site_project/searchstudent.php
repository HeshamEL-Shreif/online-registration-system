<!DOCTYPE html>
<html>
<head>

	<title>Student Search</title>

</head>

 <style>

        ul{

            position: fixed;
            top: 35%;
            left:40%;
            background-color: white;
            padding-left: 54px;
            padding-bottom: 30px;
            padding-top: -40px;
            padding-right: 50px;
            border-radius: 25px;
            list-style-type: none;
            align-items: center;
            text-align: center;
            z-index: -1;

        }

        li{

            font-family: vag;
            font-size:15px ;
            color: grey;
            font-weight: bold;
            margin-bottom:15px;
            margin-top: 5px;

        }

        li a{

            text-decoration: none;
            color:white;
           background-color:  #e49f7f ;
            border-radius: 25px;
            padding-top: 6px;
            padding-bottom: 6px;
            padding-left: 10px;
            padding-right: 10px;

        }

        .list{
            position: relative;
             width:100px;

            display: block;

            top: -66px;

            left:22%;
            margin-bottom: -50px;
        }


        form{

            position: fixed;
            top:240px;
            left:42%;
            text-align: center;
           font-size: 20px;
           font-family: vag;
          align-items: center;

        }

        input{

             display: block;
            align-items: center;
            align-content: center;
            margin-top: 18px;
            margin-bottom: 18px;
        }

        .in{


   width: 200px;
    height:50px;
    min-height: 120%;

    border-color: white;
    outline: none;
    border-radius: 25px;
    outline: none;
    padding-left: 30px;
    padding-left: 30px;
    font-family: vag;
    color: #000000;
    font-size: 16px;
    font-weight: bold;
    letter-spacing: 1px;
    background-color:white;

}

.in2{
    width: 100px;
    border-radius: 25px;
    height: 50px;
    border: none;
    outline: none;
    padding-left: 10px;
    font-family: vag;
    color: white;
    margin-left: 70px;
    margin-top: 40px;
    font-size: 15px;
    font-weight: bold;

    letter-spacing: 2px;
    background-color:#237e67;

}


    </style>
    <?php

include('db_connection.php');
 include('header_inst.php');
if(isset($_POST["submit"])){
 include ('doc_student_search_result.php');
$str = $_POST["search"];
$sql = "SELECT * FROM students_info WHERE id = '$str' ";

$result = $conn->query($sql);

if($result->num_rows>0){
    $row = $result->fetch_assoc();
?>
<br><br><br>
<ul >
        <li> <img class="card z-depth-0 list" src="img/user.png"><li>
        <li> <?php echo 'Student Name: '.$row["name"] ; ?>  </li>
        <li> <?php echo 'Student ID: '.$row["id"] ; ?>  </li>
        <li> <?php echo 'Email: '.$row["email"] ; ?>  </li>
        <li> <?php echo 'Faculty: '.$row["faculty"] ; ?>  </li>
        <li> <?php echo 'Department: '. $row["department"] ; ?>  </li>

    </ul>



<?php
}

  else{
	echo "No Results!";
}
}

 ?>

<body>
    <form action="searchstudent.php" method="POST">
        <label style="color:grey">Search by ID :</label>
		<input class="in" type="number" name="search">
		<input class="in2" type="submit" name="submit">
	</form>

</body>


<?php include ('doc_course_footer.php'); ?>
</html>