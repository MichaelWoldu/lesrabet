<?php 
echo '
<div class="modal fade in" id="reg">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header w3-black">
						<a class="close" data-dismiss="modal" style="color: white">x</a>
						<h5 class="modal-title text-uppercase"> Register: Student</h5>
					</div>
				<div class="modal-body">
                    <h2 align=center>Welcome to GetGired</h2>
				<form action="verify_login.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label class="col-form-label">
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="firstname" class="form-control" />
            </div>
        
            <div class="field-wrap">
              <label class="col-form-label">
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="lastname" class="form-control" />
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
          
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="register" >Register</button>
        </div>
          </form>
					<div><span id="message"></span></div>
					
					<div class="g-recaptcha" data-sitekey="6LedcH0UAAAAAO3k8oRdZQr6EjubymxSHP_eiMWU"></div>

				</div>
			</div>
		</div>
	</div>'
    ?>