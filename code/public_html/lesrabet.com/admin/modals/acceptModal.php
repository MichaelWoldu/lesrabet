<?php
echo ' <div class="modal fade in" id="accept">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header w3-black">
						<a class="close" data-dismiss="modal" style="color: white">x</a>
					</div>
					<div class="modal-body">
						 <h2 align=center>Are you sure you want to accpect this application</h2>
						<br>
						<div align=center>
						 <a href="company/accept.php?role=' . $job["jobs_id"] . '&id=' . $job["id"] .'"><p class="btn btn-success">Yes</p></a>
						 <button class="btn btn-danger" data-dismiss="modal">No</button>
						</div>
					
				</div>
			</div>
		</div>
</div>'
?>
    