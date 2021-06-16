<?php
echo  '<div class="modal fade in" id="login">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header w3-black">
						<a class="close" data-dismiss="modal" style="color: white">x</a>
						<h5 class="modal-title text-uppercase">Login: Student</h5>
					</div>
					<div class="modal-body">
                        <h2 align=center>Welcome Back</h2>
						 <form action="verify_login.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label class="nav-header">
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email" class="form-control"/>
          </div>
          
          <div class="field-wrap">
            <label class="nav-header">
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password" class="form-control"/>
          </div>
          
          <p class="forgot"><a href="student/forgot.php">Forgot Password?</a></p>
          
          <div class="g-recaptcha" data-sitekey="6LcwKKAUAAAAADTs4CjGxM4DWwbfShdJrqujEBYj"></div>
          <br>
        <div class="modal-footer">
          <button  class="btn btn-success" name="slogin">Log In</button>
        </div>
          </form>
					
				</div>
			</div>
		</div>
</div>'
?>
    