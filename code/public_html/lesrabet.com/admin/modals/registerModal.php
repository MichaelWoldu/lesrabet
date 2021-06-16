<?php 
echo  '<div class="modal fade in" id="reg">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header w3-black">
						<a class="close" data-dismiss="modal" style="color: white">x</a>
						<h5 class="modal-title text-uppercase"> Register: Student</h5>
					</div>
				<div class="modal-body">
                    <h2 align=center>Welcome to Lesrabet</h2>
				<form action="verify_login.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label class="col-form-label">
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="firstName" class="form-control" />
            </div>
        
            <div class="field-wrap">
              <label class="col-form-label">
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="lastName" class="form-control" />
            </div>
          </div>

          <div class="field-wrap">
            <label class="col-form-label">
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name="email" class="form-control" />
          </div>
          
          <div class="field-wrap">
            <label class="col-form-label">
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password" class="form-control"/>
          </div>
          			<div class="g-recaptcha" data-sitekey="6LcwKKAUAAAAADTs4CjGxM4DWwbfShdJrqujEBYj"></div>
          
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="sregister" >Register</button>
        </div>
          </form>
					
				</div>
			</div>
		</div>
	</div>'


    ?>