<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		
		<script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
		<script src="<?=base_url('assets/js/moment.js')?>"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		
		<script src="<?=base_url('vendor/slimscroll/slimscroll.min.js')?>"></script>
		<script src="<?=base_url('vendor/slimscroll/custom-scrollbar.js')?>"></script>
		<script src="<?=base_url('vendor/datatables/dataTables.min.js')?>"></script>
		<script src="<?=base_url('vendor/datatables/dataTables.bootstrap.min.js')?>"></script>

		<!-- Custom Data tables -->
		<script src="<?=base_url('vendor/datatables/custom/custom-datatables.js')?>"></script>
		<script src="<?=base_url('vendor/datatables/custom/fixedHeader.js')?>"></script>

		<!-- Download / CSV / Copy / Print -->
		<script src="<?=base_url('vendor/datatables/buttons.min.js')?>"></script>
		<script src="<?=base_url('vendor/datatables/jszip.min.js')?>"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="<?=base_url('vendor/datatables/vfs_fonts.js')?>"></script>
		<script src="<?=base_url('vendor/datatables/html5.min.js')?>"></script>
		<script src="<?=base_url('vendor/datatables/buttons.print.min.js')?>"></script>
		<!-- Prism -->
		<script src="<?=base_url('vendor/prism/prism.js')?>"></script>
		<script src="<?=base_url('vendor/datepicker/js/picker.js')?>"></script>
		<script src="<?=base_url('vendor/datepicker/js/picker.date.js')?>"></script>
		<script src="<?=base_url('vendor/datepicker/js/custom-picker.js')?>"></script>
		<script src="<?=base_url('assets/js/select2.min.js')?>"></script>
		<!-- Main JS -->
		<script src="<?=base_url('assets/js/main.js')?>"></script>
		<script src="<?=base_url('assets/js/jquery.bootstrap-growl.js')?>"></script>
		 
		<script type="text/javascript">
			//pesan 
			function alertFunc(alet,pesan){
				setTimeout(function() {
                    $.bootstrapGrowl(pesan, { type: alet });
                }, 1000);
			 }
			//import
			
        </script>
		
		<?php
		if($this->session->flashdata('status') == "")
		{

		}
		else
		{
			$message = $this->session->flashdata('status');
			echo "<script>alertFunc('".$message['alert']."','".$message['msg']."')</script>";
		}