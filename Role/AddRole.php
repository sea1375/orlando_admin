<?php
 include('../Config/Connection.php');
 //Check Login
      session_start();
       $login_check=$_SESSION['id'];
     if ($login_check!='1')
     {
       header("../Login/login.php");
     }
    //End Login
    //Insert Customers
    if(isset($_POST['adminsubmit']))
    {
      $name=$_POST['name'];
      $email=$_POST['email'];
      $password=$_POST['password'];
      $mobnumber=$_POST['mobnumber'];
      $type=$_POST['type'];
      $admin_insert = "INSERT INTO login_user (user_name,email,password ,mob_no,status)
        VALUES ('$name','$email','$password','$mobnumber','$type')";
     
      $result = mysqli_query($db,$admin_insert);
      
     header( "Location: RoleDetails.php" );
    
    }
    //End Insert
    //Include Header
 include('../includes/header.php');
 //End Header
?>
      <div id="content-wrapper">
       <div class="container-fluid">
	  
	  <div class="col-md-12">
		<h3>Users</h3>
	  <hr>
	   </div>	
	 
	 
	   <div class="container" style="display:flex;justify-content:center;margin-top:4%; ">
	   <div class="col-md-7">
	   
      <form action="AddRole.php" autocomplete='off' method="post" >
        <div class="form-group">
    <label for="fname">Name *</label>
    <input type="text" required class="form-control" name="name" id="name"   placeholder=" Name *" value="">
    <span id="username"  class="text-danger font-weight-bold"> </span>
  </div>
  <div class="form-group">
    <label for="lname">Email *</label>
   <input type="text" onblur="check_email_exists();" class="form-control"  id="email" name="email" required   placeholder="Email *" autocomplete="off">
  </div>
   <div class="form-group">
    <label for="Homecity">Password *</label>
    <input type="text" class="form-control" name="password" id="password" aria-describedby="email" required placeholder="Password *" value="">
    <span id="homecity" class="text-danger font-weight-bold"></span>
  </div> <div class="form-group">
   <div class="form-group">
    <label for="mobnumber">Mobile Number *</label>
    <input type="text" maxlength="10" onkeypress="return AllowNumbersOnly(event)" required class="form-control" name="mobnumber" id="mob" aria-describedby="mobnumber" placeholder="Mobile Number *" value="">
    <span id="mobileNumber" class="text-danger font-weight-bold"></span>
  </div>
  <label for="type">Role Type *</label> 
   <select class="form-control" name="type">
 
    <option  value="1">admin</option>
    <option  value="0">user</option>
   </select><br>
  
 
   <div class="form-group" style="text-align:center;">
  <button type="submit"  name="adminsubmit"class="btn btn-primary">Submit</button>
  </div>
</form>

</div >
</div>
</div>
       

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Universal Orlando Resort 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>


    <script type="text/javascript">
 $.validate({
    lang: 'en'
  });
  
  
     function AllowNumbersOnly(e) {
    var code = (e.which) ? e.which : e.keyCode;
    if (code > 31 && (code < 48 || code > 57)) {
      e.preventDefault();
    }
  }
  
</script>
<script type="text/javascript">
function check_email_exists(){
var email=$("#email").val();
$.ajax({
    type:'GET',
        url:'../Ajax/checkemail.php?email='+email,
       
        success:function(msg){
          
        alert(msg);   
        }
 });


}
</script>
  </body>

</html>
