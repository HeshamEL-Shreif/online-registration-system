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
        $errors='';
             
              $sem=$_POST['semester'];
              $sday=$_POST['day'];
              $cap=$_POST['cap'];
              $start=(string)$_POST['start'];
              $end=(string)$_POST['end'];
              $course=$_POST['course'];
              $room=$_POST['room'];
              $ins=$_POST['ins'];
              if($room!=null && $course!=null && $ins != null){
               $sql1 = "INSERT INTO section (semester,
               day,
               capacity,
               start_time,
               end_time,
               course_code,
               Room_ID,
               ID
               ) VALUES( ?, ?, ?, ?, ?, ?, ?, ?)";
               $params1 = array(  $sem, $sday, $cap, $start, $end, $course, $room, $ins);  
               $stmt1 = sqlsrv_query( $conn, $sql1, $params1 );
              if($stmt1){
              
              ?>
 <meta http-equiv="refresh" content="0;URL='http://localhost/site_project/add_section2.php'" />
<?php
      }
              
          }else{
                $errors='data not completed';

          }
        }
          
      
      
      
     ?>

    <form action="add_section.php"  method="POST">
        
        <label>Semester:</label>
        <input class="in" type="text" name="semester" required>
        <label>day:</label>
        <input class="in" type="number" name="day" required>
        <label>Capacity:</label>
        <input class="in" type="number" name="cap" required>
        <label>start Time:</label>
        <input class="in" type="time" name="start" required>
        <label>End Time:</label>
        <input class="in" type="time" name="end" required>
        
        <label>Courses</label>
        <?php $sql = "SELECT * FROM Courses";
              
              $stmt = sqlsrv_query($conn, $sql);
               while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){  ?>
               <label><?php echo $row['course_name'] ?></label>
        <input class="in2" type="radio" name="course" value='<?php echo $row['course_code'] ?>' required><br>
        <?php } ?>

        <label>Rooms </label>
        <?php $sql = "SELECT * FROM Room";
              
              $stmt = sqlsrv_query($conn, $sql);
               while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){ 
                $fid=$row['Faculty_ID'];
                $sql1 = "SELECT * FROM Faculty where Faculty_ID_ ='$fid'";
              
              $stmt1 = sqlsrv_query($conn, $sql1);
               $row1=sqlsrv_fetch_array($stmt1,SQLSRV_FETCH_ASSOC)
                ?>
               <label><?php echo 'Room '. $row['Room_num'] .' in '. $row1['Name']?></label>
        <input class="in2" type="radio" name="room" value='<?php echo $row['Room_ID'] ?>' required><br>
        <?php } ?>
        <label>instructors</label>
        <?php $sql = "SELECT * FROM Instructor";
              
              $stmt = sqlsrv_query($conn, $sql);
               while($row=sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)){ 
                ?>
               <label><?php echo  $row['Name'] ?></label>
        <input class="in2" type="radio" name="ins" value='<?php echo $row['ID'] ?>' required><br>
        <?php } ?>

        <div style="color:red"><?php echo $errors; ?></div><br>
        <input class="in2" type="submit" name="submit" value="Save">
        
        
        
    </form>
    
    
    
</html>