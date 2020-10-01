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


            <div class="section">

                <!-- <p class="caption">A Simple Blank Page to use it for your custome design and elements.</p> -->
                <div class="divider"></div>
    
                <div class="card-panel">
                    <div class="row">
                    <?php if(!isset($view['record'])){ $id = NULL; }else{$id = $view['record'][TABELA_ID];} ?>
                    <?php echo form_open_multipart('painel/'.TABELA_NOME.'/'. $view['action']['name'].'/'.$id); ?>
                        <!-- Form -->
                        <div class="col s12 m12 l12 ">
                        <!-- <i class="mdi-communication-phone prefix"></i> -->
                         <?php 
                        //  CAMPO INPUT COMPLETO
                        if(!isset($view['record'])){ input_text($nome = "nome", $alias ="Nome", NULL, NULL );}else{ input_text($nome = "nome", $alias ="Nome", NULL, $record = $view['record']['name'] );}
                        if(!isset($view['record'])){ input_file($nome = "Imagem");}else{ input_file($nome ="Imagem", $record = $view['record']['imagem'],  $tabela = TABELA_NOME);}


                        // END  CAMPO INPUT COMPLETO
                        $data = array(
                            'type'  => 'submit',
                            'name' => 'mysubmit',
                            'value' => $view['action']['alias'],
                            'class' => 'btn cyan waves-light '
                        );
                        
                        echo form_submit($data);
                        //<!-- End Form -->

                        ?>

                    </div>
                    </div>
                </div>
                <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
            </div>
            </div>
            <!--end container-->
           
           
            </section>

            <?php  $this->load->view('painel/_templates/floating');?>

     
    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <?php  $this->load->view('painel/_templates/copyright');?>
    <?php  $this->load->view('painel/_templates/footer_scripts');?>


</body>

</html>