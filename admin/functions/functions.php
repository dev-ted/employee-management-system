<?php
include("../includes/db_con.php");



function getEmpNumber(){
  global $conn;
  
  $getCount = "SELECT * FROM tbl_employee";
  $run = mysqli_query($conn,$getCount);
  $count = mysqli_num_rows($run);
  if($count==0){
    echo '
    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number of Employees</div>
  <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>';
  }
  else{
    echo '<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Number of Employees</div>
    <div class="h5 mb-0 font-weight-bold text-gray-800"> '.$count.'</div>';
  }
}
function getAnnouncements(){
  global $conn;
  
  $getCount = "SELECT * FROM tbl_announcements";
  $run = mysqli_query($conn,$getCount);
  $count = mysqli_num_rows($run);
  if($count==0){
    echo '
    
  <div class="h5 mb-0 font-weight-bold text-gray-800">no announcements have been posted</div>';
  }
  else{
    
    while($row = mysqli_fetch_array($run)){
      $agenda = $row['Agenda'];
      

      echo "
      <div class='card-body'>
      $agenda
</div>";
    }
    
  }
}

function getTasksNumber(){
  global $conn;
  
  $getCount = "SELECT * FROM tbl_tasks where status='inprogress'";
  $run = mysqli_query($conn,$getCount);
  $count = mysqli_num_rows($run);
  if($count==0){
    echo '
    
    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>';
  }
  else{
    
   

      echo '  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> '.$count.'</div>';
      
    
    
  }
}

function getTasks(){
  global $conn;
  
  $getCount = "SELECT * FROM tbl_tasks";
  $run = mysqli_query($conn,$getCount);
  $count = mysqli_num_rows($run);
  if($count==0){
    echo '
    
    <h4 class="small font-weight-bold">No Tasks available </h4>';
  
  }
  else{
    
    while($row = mysqli_fetch_array($run)){
      $task_name = $row['task_name'];
      $progress = $row['progress'];
      

      echo '
       <div class="card-body">
      <h4 class="small font-weight-bold">'.$task_name.' <span class="float-right">'.$progress.'%</span></h4>
      <div class="progress mb-4">
        <div class="progress-bar bg-success" role="progressbar" style="width: '.$progress.'%" aria-valuenow="'.$progress.'" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      
      
     
    </div>

      ';
    }
    
  }
}

function getLeaveNumber(){
  global $conn;
  $status ="pending";
  $getCount = "SELECT * FROM tbl_leave where status='$status'";
  $run = mysqli_query($conn,$getCount);
  $count = mysqli_num_rows($run);
  if($count==0){
    echo '
    
    <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>';
  }
  else{
    
   

      echo '   <div class="h5 mb-0 font-weight-bold text-gray-800">'.$count.'</div>';
      
     
    
  }
}

function getSalaryRequestsNumber(){
  global $conn;
  $status ="pending";
  $getCount = "SELECT * FROM tbl_increaserequest where status ='$status'";
  $run = mysqli_query($conn,$getCount);
  $count = mysqli_num_rows($run);
  if($count==0){
    echo '
    
    <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>';
  }
  else{
    
   

      echo '   <div class="h5 mb-0 font-weight-bold text-gray-800">'.$count.'</div>';
      
     
    
  }
}