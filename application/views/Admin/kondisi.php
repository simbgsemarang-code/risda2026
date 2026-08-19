<div class="page-header">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><?= $judul ?></li>
	</ol>

</div>

<!-- Row start -->
<div class="row gutters">
	<div class="col-sm-12">
		<div class="table-container">
			<div class="table-responsive">
				<div class="custom-btn-group">


					<form action="<?= base_url() . 'Admin/Kecamatan/import_excel/'.$tabel[0]->Id_Saluran.'/'.$triwulan ?>" method="POST" enctype="multipart/form-data" name="myForm">
						<div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" accept=".xls,.xlsx,.csv" type="file" name="upfile" value="upload" onchange="sub1(this)" /></div> 
						<button type="button" onclick="getFile()" class="btn btn-success btn-rounded">Import</button>
					</form>
					 <a href="<?= base_url('Admin/Kecamatan/export_excel/'.$tabel[0]->Id_Saluran.'/'.$triwulan) ?>" ><button type="button" class="btn btn-success btn-rounded">Unduh Template</button></a>
					
				</div>
				
				<table id="basicExample" class="table custom-table">
					<thead>
						<tr>
							<th>No</th>
							
							<th>Daerah Irigasi</th>
							<th>HM</th>
							<th>Kondisi</th>
							<th>Tinggi Kiri</th>
							<th>Tebal Kiri</th>
							<th>Tinggi Kanan</th>
							<th>Tebal Kanan</th>
							<th>Konstruksi Kiri</th>
							<th>Konstruksi Kanan</th>
							<th>Lebar Atas</th>
							<th>Lebar Bawah</th>
							<th>Upload</th>
						
						</tr>
					</thead>
					<tbody>
						<?php if ($tabel != null) {
							$no = 0;
							foreach ($tabel as $t) {
								$no++;
						?>

								<tr>
									<td><?=$t->id ?></td>
									
									<td><?= $t->DI ?></td>
									<td><?= $t->HM ?></td>
									<td>
										<select name="kondisi<?= $no ?>" onchange="perkerasan(<?= $t->id ?>,this.value,'KONDISI')" id="kondisi<?= $no ?>" class="form-control">
											<option value="<?= $t->KONDISI ?>"><?= $t->KONDISI ?></option>
											<option value="Baik">Baik</option>
											<option value="Rusak Ringan">Rusak Ringan</option>
											<option value="Rusak Sedang">Rusak Sedang</option>
											<option value="Rusak Berat">Rusak Berat</option>
										</select>


									</td>
									<td><input type="text" size="5" onkeyup="perkerasan(<?= $t->id ?>,this.value,'tinggikiri')" class="form-control" id="tinggikiri<?= $no ?>" name="tinggikiri<?= $no ?>" value="<?= $t->tinggikiri ?>"></td>
									
									<td>
										<input type="text" size="5" onkeyup="perkerasan(<?= $t->id ?>,this.value,'tebalkiri')" class="form-control" id="tebalkiri<?= $no ?>" name="tebalkiri<?= $no ?>" value="<?= $t->tebalkiri ?>">
									</td>
									<td><input type="text" size="5" onkeyup="perkerasan(<?= $t->id ?>,this.value,'tinggikanan')" class="form-control" id="tinggikanan<?= $no ?>" name="tinggikanan<?= $no ?>" value="<?= $t->tinggikanan ?>"></td>
									<td><input type="text" size="5" onkeyup="perkerasan(<?= $t->id ?>,this.value,'tebalkanan')" class="form-control" id="tebalkanan<?= $no ?>" name="tebalkanan<?= $no ?>" value="<?= $t->tebalkanan ?>"></td>
									<td><input type="text" size="5" onkeyup="perkerasan(<?= $t->id ?>,this.value,'konstruksikiri')" class="form-control" id="konstruksikiri<?= $no ?>" name="konstruksikiri<?= $no ?>" value="<?= $t->konstruksikiri ?>"></td>
									<td><input type="text" size="5" onchange="perkerasan(<?= $t->id ?>,this.value,'konstruksikanan')" class="form-control" id="konstruksikanan<?= $no ?>" name="konstruksikanan<?= $no ?>" value="<?= $t->konstruksikanan ?>"></td>
									<td><input type="text" size="5" onkeyup="perkerasan(<?= $t->id ?>,this.value,'lebaratas')" class="form-control" id="lebaratas<?= $no ?>" name="lebaratas<?= $no ?>" value="<?= $t->lebaratas ?>"></td>
									<td><input type="text" size="5" onkeyup="perkerasan(<?= $t->id ?>,this.value,'lebarbawah')" class="form-control" id="lebarbawah<?= $no ?>" name="lebarbawah<?= $no ?>" value="<?= $t->lebarbawah ?>"></td>
									<td>
										<?php
										$inv = $t->Id_Saluran;

										if (isset($t->foto)) {
											$fil = base_url('assets/foto/' . $t->folder . '/'. $t->foto);
										} else {
											$fil =  base_url('assets/foto/no_image.jpg');
										}

										?>
										<img width="50px" onclick="tes(<?=$no ?>,<?= $t->Id_Saluran ?>)" id="frame<?= $no ?>" src="<?= $fil ?>" alt="Bootstrap Gallery" />

										<div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile<?= $no ?>" accept=".jpg,.png,.bmp,.jpeg" type="file" name="upfile<?= $no ?>" value="upload" onchange="preview('<?= $no ?>','<?= $inv ?>','<?= $t->id ?>','<?= $triwulan ?>')" /></div>
									</td>
							
								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('Admin/bootstrap_model.php'); ?>
<script>
	function hapus(pesan, url) {

		var result = confirm('Anda Yakin Untuk Menghapus ' + pesan);
		if (result) {
			window.location = url;
		}
	}

	function sub1(obj) {
		var file = obj.value;
		var fileName = file.split("\\");
		document.myForm.submit();
      	event.preventDefault();
    }

	function getFile() {
        document.getElementById("upfile").click();
    }

	function preview(no, inf, id, tri) {
		
		upfile = document.getElementById('upfile' + no);
		const [file] = upfile.files
		const foto1 = $('#upfile' + no).prop('files')[0];
		nama_file = event.target.files[0].name;
		f = document.getElementById('frame' + no);
		if (file) {
			f.src = URL.createObjectURL(file)
			let formData = new FormData();
			formData.append('foto1', foto1);
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url('Welcome/upload_foto/'); ?>' + no + '/' + inf + '/' + id + '/' + tri,
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				success: function(response) {
					alert('Upload Foto Sukses');

				}
			});

		}

	}

	function perkerasan(no, val, field) {
		
		$.ajax({
			url: '<?php echo base_url('Welcome/update_kondisi/'); ?>' + no + '/' + field + '?val=' + val,
			success: function(response) {
				
				//alert(response);            
			}
		});


	}

	function tes(no, kode) {

		document.getElementById("upfile" + no).click();

	}
</script>