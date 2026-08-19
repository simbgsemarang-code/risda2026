    <script type="text/javascript">
        function show_modal_page(url) {



            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#page_model_view_data .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>assets/img/loader-1.gif" style="height:25px;" /></div>');

            // LOADING THE AJAX MODAL
            jQuery('#page_model_view_data').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    //alert(response);
                    jQuery('#page_model_view_data .modal-body').html(response);
                }
            });
        }

         function show_modal_page1(url) {



            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#page_model_view_data .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>assets/img/loader-1.gif" style="height:25px;" /></div>');

            // LOADING THE AJAX MODAL
            jQuery('#page_model_view_data1').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    //alert(response);
                    jQuery('#page_model_view_data1 .modal-body').html(response);
                }
            });
        }
        function show_modal_page2(url) {



            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#page_model_view_data2 .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url(); ?>assets/img/loader-1.gif" style="height:25px;" /></div>');

            // LOADING THE AJAX MODAL
            jQuery('#page_model_view_data2').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    //alert(response);
                    jQuery('#page_model_view_data2 .modal-body').html(response);
                }
            });
        }
        function add_new_row(url) {
            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    //alert(response);
                    jQuery('#transaction_table_body').append(response);
                }
            });
        }

         function tutup() {
            $('#page_model_view_data1').modal('hide');
         }
          function tutup2() {
            $('#page_model_view_data2').modal('hide');
         }
    </script>

    <!-- (Ajax Modal)-->
    <div class="modal fade" id="page_model_view_data" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 100000;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style=" background-color: #252525;overflow:auto;">
                <div class="modal-header" style="background-color:rgb(210, 162, 162);">

                    <h4 class="modal-title" style="color: white;"><i class="fa fa-search" aria-hidden="true" style="color: white;"></i> Pencarian </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="overflow:auto;">

                </div>
                <div class="modal-footer" style="background-color:rgb(210, 162, 162);">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

        <div class="modal fade" id="page_model_view_data1" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 100000;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style=" background-color: #f5e4e4e2;overflow:auto;">
                <div class="modal-header" style="background-color:rgba(105, 48, 211, 0.81);">

                    <h4 class="modal-title" style="color: white;"><i class="fa fa-image" aria-hidden="true" style="color: white;"></i> Detail HM </h4>
                    <button type="button"  onClick="tutup()" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="overflow:auto;">

                </div>
                <div class="modal-footer" style="background-color:rgba(105, 48, 211, 0.81);">
                    <button type="button" onClick="tutup()" id="myBtn" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="page_model_view_data2" tabindex="-1" role="dialog" aria-hidden="true" style="z-index: 100000;">
        <div class="modal-dialog modal-m">
            <div class="modal-content" style=" background-color: #f5e4e4e2;overflow:auto;">
                <div class="modal-header" style="background-color:rgba(105, 48, 211, 0.81);">

                    <h4 class="modal-title" style="color: white;"><i class="fa fa-image" aria-hidden="true" style="color: white;"></i> Statistik  </h4>
                    <button type="button"  onClick="tutup2()" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="overflow:auto;">

                </div>
                <div class="modal-footer" style="background-color:rgba(105, 48, 211, 0.81);">
                    <button type="button" onClick="tutup2()" id="myBtn" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    