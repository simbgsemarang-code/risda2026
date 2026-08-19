<table class="table table-striped">
    <tbody>
        <?php if ($temp_data != null) {
            foreach($temp_data as $td) { 
        ?>
        <tr>
            <td><a hreef="#" style="cursor:pointer" onClick="cari('<?=$td->id?>')"><?=$td->DESA?></a></td>
        </tr>
        <?php }
    } ?>
       
    </tbody>
</table>

<script>
 function gayakec1(feature) {
        return {
            color: "white",
            weight: 3,
            opacity: 1,
            fillOpacity: 0
        };
    }
    var bd='';
function cari(val) {
   
    var jenis = '<?=$jenis?>'
    
     $.ajax({
            url: '<?= base_url('Welcome/cari_desa/') ?>' + val + '/' + jenis,
            success: function(msg) {
              
                var geojsonFeature = JSON.parse(msg);
                var on = { style: gayakec1};
                bd = L.geoJSON(geojsonFeature, on);
                bd.addTo(map);
                map.fitBounds(bd.getBounds());
            }
        });
}

</script>