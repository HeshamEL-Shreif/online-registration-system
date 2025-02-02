<!DOCTYPE html>
<html>
    <style>
        
  
        form{
            
            position: inherit;
            top:180px;
           left: 1%;
            margin-top: 90px;
            text-align: center;
            align-items: center;
            align-content: center;
           font-size: 20px;
           font-family: vag;
          display: block;
     
           
        }
        
        input{
            
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 41%;
               
        }
        label{
            display: block;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-right: 12px;
            
        }
       
        
      
        .in{
 

   width: 200px;
    height:30px;
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
    margin-left: 46%;
    margin-top: 10px;
    font-size: 15px;
    font-weight: bold;
    
    letter-spacing: 2px;
    background-color:#0095f7;

}
        
        
    </style>
    
    <?php
    
    $errors='';
    
    session_start();
    
     include('db_connection.php');
     
      include('it_header.php');
      
      if(isset($_POST['submit'])){
        $crs_name=$_POST['crs_name'];
        $sql = "SELECT course_name FROM Courses WHERE course_name = '$crs_name' ";
 
     
        $stmt6 = sqlsrv_query($conn, $sql);
             
             if (sqlsrv_has_rows($stmt6)) {
              
             $errors='This Course Code Already Exist';
              
          }else{
              
              $crs_name=$_POST['crs_name'];
             $crs_credit=$_POST['credit'];
              $dep=$_POST['dep'];
              $sql = "SELECT * FROM Department WHERE depart_name='$dep' ";
              $stmt = sqlsrv_query($conn, $sql);
              while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){
               $did=$row['dep_code'];
              }
              $sql1 = "INSERT INTO Courses (course_hours,
              course_name,
              dep_code
              ) VALUES( ?, ?, ?)";

              $params1 = array( $crs_credit, $crs_name, $did);  
              $stmt1 = sqlsrv_query( $conn, $sql1, $params1 );

              $sql6 = "SELECT * FROM Courses";
              $stmt6 = sqlsrv_query($conn, $sql6);
              while($row6=sqlsrv_fetch_array($stmt6,SQLSRV_FETCH_ASSOC)){
              $cid=$row6['course_code'];
              }

              $sql7 = "SELECT * FROM Courses";
              $stmt7 = sqlsrv_query($conn, $sql7);
              while($row7=sqlsrv_fetch_array($stmt7,SQLSRV_FETCH_ASSOC)){
                $ccid=$row7['course_code'];
                if($_POST[$ccid]==$ccid){

                    $sql8 = "INSERT INTO perquisite (course_code_1,
                    perquisite_course_code_2
                    ) VALUES( ?, ?)";
      
      
                    $params8 = array( $cid, $ccid);  
                    $stmt8 = sqlsrv_query( $conn, $sql8, $params8 );

                }


              }

              if($stmt1){
              ?>
 <meta http-equiv="refresh" content="0;URL='http://localhost/site_project/add_course2.php'" />
<?php
             
              
          }}
          
      }
      
      
     ?>

    <form action="add_course.php"  method="POST">
        
        <label>Course Name:</label>
        <input class="in" type="text" name="crs_name" required>
       <label>Credit Hours:</label>
        <input class="in" type="number" name="credit" required>
        <label>Faculties:</label>
        <?php $sql = "SELECT * FROM Faculty";
              
              $stmt = sqlsrv_query($conn, $sql);
        while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){ 
             $fid=$row['Faculty_ID_'];
            $sql2 = "SELECT * FROM Department where Faculty_ID = '$fid'  ";
            $stmt2 = sqlsrv_query($conn, $sql2);
            ?>
            
            <label><?php echo $row['Name']. ' Faculty :' ?></label>
            <?php
            
            while($row2=sqlsrv_fetch_array($stmt2,SQLSRV_FETCH_ASSOC)){
            ?>
               <label><?php echo 'Depatrment of '. $row2['depart_name'] ?></label>
        <input class="in2" type="radio" name="dep" value='<?php echo $row2['depart_name'] ?>' required><br>

        <label>set prerequsites:</label>
            <?php
            $depc=$row2['dep_code'];
              $sql3 = "SELECT * FROM Courses where dep_code='$depc'";
              
             $stmt3 = sqlsrv_query($conn, $sql3);
       while($row3=sqlsrv_fetch_array($stmt3,SQLSRV_FETCH_ASSOC)){ 
?>

<label><?php echo $row3['course_name'] ?></label>
        <input class="in2" type="radio" name="<?php echo $row3['course_code'] ?>" value='<?php echo $row3['course_code'] ?>' required><br><br>
<?php


       }
            
            ?>       
       <?php
        }}?>



        <div style="color:red"><?php echo $errors; ?></div><br>
        <input class="in2" type="submit" name="submit" value="Save">
        
        
        
    </form>
    
    
    
</html>