<table class="table table-striped">
    <tbody>
        <?php if ($temp_data != null) {
            foreach($temp_data as $td) { 
        ?>
        <tr>
            <td><button type="button" class="btn btn-link p-0 text-start" onclick='focusIrigasi(<?=json_encode((string) $td->id_di)?>)'><?=html_escape($td->NAMA_DI)?></button></td>
        </tr>
        <?php }
		} else { ?>
		<tr>
			<td class="text-muted small">Data tidak ditemukan.</td>
		</tr>
		<?php
		}
		?>
       
    </tbody>
</table>

