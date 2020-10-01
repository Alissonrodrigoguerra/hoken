
<!-- 
    <div id="modal4" class="modal modal-fixed-footer white ">
              <div class="modal-content">
                <iframe src="<?= base_url(); ?>" frameborder="0" width="100%"height="550px"></iframe> 
              </div>
              <div class="modal-footer blue lighten-4">
                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Fechar</a>
              </div>
            </div> -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/jquery-1.11.2.min.js"></script>    

    <!--materialize js-->
    <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/materialize.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <!-- sparkline -->
    <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/plugins/sparkline/sparkline-script.js"></script>
    
 
    <!--jvectormap-->
    <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/plugins/jvectormap/vectormap-script.js"></script>    

    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?= base_url('assets/painel/'); ?>js/plugins.js"></script>
    <!-- Toast Notification -->
    <script type="text/javascript">
    // Toast Notification
    $(window).load(function() {
        setTimeout(function() {
            Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
        }, 1500);
        setTimeout(function() {
            Materialize.toast('<span>You can swipe me too!</span>', 3000);
        }, 5000);
        setTimeout(function() {
            Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        }, 15000);
    });
    </script>