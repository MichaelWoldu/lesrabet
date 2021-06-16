<?php
echo '<div class="modal fade in" id="contact">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header w3-black">
						<a class="close" data-dismiss="modal" style="color: white">x</a>
					</div>
					<div class="modal-body">
						 <h2 align=center>Send this applicant a message saying your intrested?</h2>
						<br>
						<form action="verify_login.php" method="post" autocomplete="off">
							 <div class="top-row">
            						<div class="field-wrap">
											<label class="col-form-label">
												Applicant ID<span class="req">*</span>
              									</label>
              <input type="text" required autocomplete="off" name="applicantID" id="applicantID" class="form-control" value=" ' . $app["id"] .'"/>
            </div>		 
            <div class="top-row">
            						<div class="field-wrap">
											<label class="col-form-label">
												Role Title<span class="req">*</span>
              									</label>
              <input type="text" required autocomplete="off" name="jobTitle" id="jobTitle" class="form-control"/>
            </div>
        
            <div class="field-wrap">
              <label class="col-form-label">
               Message<span class="req">*</span>
              </label>
              <textarea class="input-group-text" type="text" name="message" id="message" rows="10" cols="70%" maxlength="1000"></textarea>
            </div>
          </div>

						 <div class="modal-footer">
           <input class="btn btn-success" type="submit" value="Submit" name="contact">
			<button class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
						</form>
					 	</div>
				</div>
			</div>
		</div>'
?>
    