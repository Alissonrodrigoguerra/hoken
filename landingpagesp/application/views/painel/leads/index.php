<!DOCTYPE html>
<html lang="en">

<?php  $this->load->view('painel/_templates/head');?>

<body>
    <!-- Start Page Loading -->
    <!-- <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->
    
    <?php  $this->load->view('painel/_templates/header');?>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

   <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">
            <!-- START LEFT SIDEBAR NAV-->
            <?php  $this->load->view('painel/_templates/left_siderbar');?>

            <section id="content">
            <?php  $this->load->view('painel/_templates/breadcrumbs-wrapper');?>


            <!--start container-->
            <div class="container">

            <?php if ($this->session->flashdata('success')) { ?>
                        <div class="waves-effect waves-light btn green">
                       
                           Atenção:  <?= $this->session->flashdata('success') ?>
                    
                        </div>
                    <?php } ?>

                    <?php if ($this->session->flashdata('error')) { ?>
                        <div class="waves-effect waves-light btn">
                         Atenção:  <?= $this->session->flashdata('error') ?>
                        </div>
                    <?php } ?>
            <div class="section">
            <div class="card-panel">
                    <div class="row">
                        <div class="col s12">
                    <table id="data-table-simple" class=" display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Capital</th>
                            <th>Status</th>
                            <th>
                            <!-- <a class="btn btn-primary" href="<?= base_url("painel/{$view['controller']['name']}/cadastrar") ?>" title="Novo">
                            <i class="mdi-image-add-to-photos"></i>
                            </a> -->
                            </th>

                        </tr>
                    </thead>
                  
                </table>
                </div>
                    </div>
            </div>
                <!-- <p class="caption">A Simple Blank Page to use it for your custome design and elements.</p> -->
                <div class="divider"></div>
                <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
            </div>
            </div>
            <!--end container-->
           
           
            </section>
     
    </div>
    <!-- END MAIN -->

    

    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <?php  $this->load->view('painel/_templates/copyright');?>
    <?php  $this->load->view('painel/_templates/footer_scripts');?>
  <!--datatable-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script>
            $(document).ready(function() {
                $('#data-table-simple').DataTable( {
                    // "paging":   false,
                    // "ordering": false,
                    // "info":     false,
                    'scrollY':        '50vh',
                    'scrollCollapse': true,
                    'paging':         false,
                    "language": {
                        "lengthMenu": "Display _MENU_ records per page",
                        "zeroRecords": "Nothing found - sorry",
                        "info": "Showing page _PAGE_ of _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(filtered from _MAX_ total records)"
                    },


                    "ajax": "<?= base_url('painel/' . $view['controller']['name'] . '/datatable') ?>",
                    "aoColumns": [
                        null, null, null, null, null, null, null, {
                            "targets": 9,
                        "data": "editar",
                        "render": function ( data, type, row, meta ) {

                            if(!row[8] == '0'){
                                return 'Já Contatado';
                            }else{
                                return 'Não Contatado';
                            }
                        }

                        }, {
                        "targets": 9,
                        "data": "editar",
                        "render": function ( data, type, row, meta ) {
                        var html = new Array(
                        '<a  class="btn-floating btn-large btn-flat waves-effect waves-light pink accent-2 white-text" href="<?= base_url('painel/' . $view['controller']['name'] . '/editar') ?>/' + row[0] + '"> <i class="mdi-image-edit"></i> </a>',
                        '<a onclick="confirmDisabled(' + row[0] + ')" class="btn-floating btn-large btn-flat waves-effect waves-light pink accent-2 white-text" href="#"> <i  class="mdi-action-cached"> </i> </a>',
                        '<a onclick="confirmDelete(' + row[0] + ')" class="btn-floating btn-large btn-flat waves-effect waves-light pink accent-2 white-text" href="#"> <i  class="mdi-action-delete"> </i></a>'
                            );

                        return html[0] +'&nbsp;'+ html[1] +'&nbsp;'+ html[2];       
                   
                        }
                        }]                  

                } );
            } );
            function confirmDisabled(id) {
                if (window.confirm('Deseja realmente desativar o registro ' + id + '?'))
                {
                    window.location = '<?= base_url('painel/' . $view['controller']['name'] . '/desativar') ?>/' + id;
                }
            }
            function confirmDelete(id) {
                if (window.confirm('Deseja realmente apagar permanentemente o registro ' + id + '?'))
                {
                    window.location = '<?= base_url('painel/' . $view['controller']['name'] . '/apagar') ?>/' + id;
                }
            }
        </script>

</body>

</html>
