<div class="toast-container position-fixed bottom-0 end-0 p-3">
	<div id="liveToast" class="toast text-bg-<?php echo $type->value; ?>" role="alert" aria-live="assertive" aria-atomic="true">
		<div class="toast-body d-flex justify-content-between"> <?php echo ($message); ?>
			<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		</div>
	</div>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
		var toastElement = document.getElementById("liveToast");
		var toast = new bootstrap.Toast(toastElement, {
			delay: 5000
		});
		toast.show();
	});
</script>