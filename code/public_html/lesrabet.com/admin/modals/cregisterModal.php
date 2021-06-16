<?php
echo ' <div class="modal fade in" id="reg">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header w3-black">
						<a class="close" data-dismiss="modal" style="color: white">x</a>
						<h5 class="modal-title text-uppercase"> Register: Company</h5>
					</div>
				<div class="modal-body">
                    <h2 align=center>Welcome to GetGired</h2>
				<form action="verify_login.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label class="col-form-label">
                Company Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="companyName" class="form-control" />
            </div>
        
            <div class="field-wrap">
              <label class="col-form-label">
                Contact Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="contactName" class="form-control" />
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
                Contact Number<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="number" class="form-control" />
            </div>
			
			<div class="field-wrap">
              <label class="col-form-label">
                Company Decription <span class="req">*</span>
              </label>
              <textarea class="input-group-text" type="text" name="company_decription" id="company_decription" rows="10" cols="80%" maxlength="500"></textarea>
        <small id="coveletterinfo" class="text-muted">Please copy and paste your cover letter here. Your cover letter should not be more than 4000 characters.</small>
            </div>
			
			<div class="field-wrap">
              <label class="col-form-label">
                CV: <span class="req">*</span>
              </label>
             <input type="file" name="logo" id="logo">
            </div>                    
          
          <div class="field-wrap">
            <label class="col-form-label">
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="password" class="form-control"/>
          </div>
					
					<div class="g-recaptcha" data-sitekey="6LcwKKAUAAAAADTs4CjGxM4DWwbfShdJrqujEBYj"></div>
          
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="register" >Register</button>
        </div>
          </form>
					<div><span id="message"></span></div>
					
				

				</div>
			</div>
		</div>
	</div>'
?>
    