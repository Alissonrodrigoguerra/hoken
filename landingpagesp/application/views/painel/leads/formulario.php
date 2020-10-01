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
                    <?php echo form_open('painel/'.TABELA_NOME.'/'. $view['action']['name'].'/'.$id); ?>
                        <!-- Form -->
                        <div class="col s12 m12 l12 ">
                        <!-- <i class="mdi-communication-phone prefix"></i> -->
                         <?php 
                        //  CAMPO INPUT COMPLETO
                        
                        if(!isset($view['record'])){ input_text($nome = "nome", $alias ="Nome", NULL, NULL );}else{ input_text($nome = "nome", $alias ="Nome", NULL, $record = $view['record']['nome'] );}
                        if(!isset($view['record'])){ input_text($nome = "email", $alias ="E-mai", NULL, NULL );}else{ input_text($nome = "email", $alias ="E-mai", NULL, $record = $view['record']['email'] );}
                        if(!isset($view['record'])){ input_text($nome = "telefone", $alias ="Telefone", NULL, NULL );}else{ input_text($nome = "telefone", $alias ="Telefone", NULL, $record = $view['record']['tel'] );}
                        if(!isset($view['record'])){ input_text($nome = "estado", $alias ="Estado", NULL, NULL );}else{ input_text($nome = "estado", $alias ="Estado", NULL, $record = $view['record']['estado'] );}
                        if(!isset($view['record'])){ input_text($nome = "cidade", $alias ="Cidade", NULL, NULL );}else{ input_text($nome = "cidade", $alias ="Cidade", NULL, $record = $view['record']['cidade'] );}
                        if(!isset($view['record'])){ input_text($nome = "investimento", $alias ="Investimento", NULL, NULL );}else{ input_text($nome = "investimento", $alias ="Investimento", NULL, $record = $view['record']['investimento'] );}

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