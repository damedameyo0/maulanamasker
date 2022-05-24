<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('/js/scripts.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url('/assets/demo/chart-area-demo.js') ?>"></script>
<script src="<?php echo base_url('/assets/demo/chart-bar-demo.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?php echo base_url('/js/datatables-simple-demo.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


<script>
	$(document).ready(function() {
		$('table.display').DataTable();
	});
</script>

<script>
	function startCalc() {
		interval = setInterval("calc()", 1);
	}

	function calc() {
		one = document.autoSumForm.Uang_Pembayaran.value;
		document.autoSumForm.Kembalian.value = one - <?= $this->cart->total(); ?>;
	}

	function stopCalc() {
		clearInterval(interval);
	}
</script>
