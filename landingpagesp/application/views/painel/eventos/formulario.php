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
                        if(!isset($view['record'])){ input_text($nome = "alias", $alias ="Alias", NULL, NULL );}else{ input_text($nome = "alias", $alias ="Alias", NULL, $record = $view['record']['alias'] );}
                        if(!isset($view['record'])){ input_text($nome = "posicao", $alias ="Posição", NULL, NULL );}else{ input_text($nome = "posicao", $alias ="Posição", NULL, $record = $view['record']['posicao'] );}
                        if(!isset($view['record'])){ input_text($nome = "icone", $alias ="Icone", NULL, NULL );}else{ input_text($nome = "icone", $alias ="Icone", NULL, $record = $view['record']['icone'] );}
                        if(!isset($view['record'])){ 
                            
                        $options = array(); 
                        foreach ($tabelas_grupos as $key ){
                            
                            $options[$key['idTabelas_grupos']] = $key['nome'];
 
                        }
                        select_options($nome = "tabelas_grupos", $alias ="Grupos Tabelas", $options, NULL, Null  );
                        
                        }else{ 

                            
                        $options = array(); 
                        foreach ($tabelas_grupos as $key ){
                            
                            $options[$key['idTabelas_grupos']] = $key['nome'];
 
                        }
                        select_options($nome = "tabelas_grupos", $alias ="Grupos Tabelas", $options, NULL, $record = $view['record']['idTabelas_grupos']  );
                            

                        }


                        if(!isset($view['record'])){ 

                            
                        $options = array(
                            '0' => 'Sim',
                            '1' => 'Não',

                        );
                        select_options($nome = "VisivelNoMenu", $alias ="Visivel No Menu", $options, NULL, NULL  );

                        }else{

                            $options = array(
                                '0' => 'Sim',
                                '1' => 'Não',
    
                            );
                            select_options($nome = "VisivelNoMenu", $alias ="Visivel No Menu", $options, NULL, $record = $view['record']['visivelNoMenu']  );              
                        }


                                                
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