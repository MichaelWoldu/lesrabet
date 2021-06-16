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
						<form action="company/contact.php?appID=' . $applicant_detail . '&compID=' . $compid . '" method="post" autocomplete="off">
							 <div class="top-row">
            						<div class="field-wrap">
											<label class="col-form-label">
												Applicant Email<span class="req">*</span>
              									</label>
              <input type="email" required autocomplete="off" name="email" id="email" class="form-control" value=" ' . $app["email"] .'"/>
            </div>
        
            <div class="field-wrap">
              <label class="col-form-label">
               Message<span class="req">*</span>
              </label>
              <textarea class="input-group-text" type="text" name="message" id="message" rows="10" cols="70%" maxlength="1000"></textarea>
            </div>
          </div>

						 <div class="modal-footer">
          <button  class="btn btn-success" name="contact">Contact</button>
			<button class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
						</form>
					 	</div>
				</div>
			</div>
		</div>'
?>
    