    <script type="text/javascript">
        function show_modal_page(url) {



            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#customModalTwo .modal-body').html('<div style="text-align:center;margin-top:0px;"><img src="<?php echo base_url(); ?>assets/img/loader-1.gif" style="height:25px;" /></div>');

            // LOADING THE AJAX MODAL
            jQuery('#customModalTwo').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    //alert(response);
                    jQuery('#customModalTwo .modal-body').html(response);
                }
            });
        }

        function show_modal_page1(url) {



            // SHOWING AJAX PRELOADER IMAGE
            jQuery('#customModalTwo1 .modal-body').html('<div style="text-align:center;margin-top:0px;"><img src="<?php echo base_url(); ?>assets/img/loader-1.gif" style="height:25px;" /></div>');

            // LOADING THE AJAX MODAL
            jQuery('#customModalTwo1').modal('show', {
                backdrop: 'true'
            });

            // SHOW AJAX RESPONSE ON REQUEST SUCCESS
            $.ajax({
                url: url,
                success: function(response) {
                    //alert(response);
                    jQuery('#customModalTwo1 .modal-body').html(response);
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
    </script>

    <!-- (Ajax Modal)-->
    <div class="modal fade" id="customModalTwo" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body" style="padding: 0px;">

                </div>

            </div>

        </div>
    </div>
    </div>
    <div class="modal fade" id="customModalTwo1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body" style="padding: 0px;">

                </div>

            </div>

        </div>
    </div>
    </div>
    <script src="<?= base_url('assets/js/select2.min.js') ?>"></script>