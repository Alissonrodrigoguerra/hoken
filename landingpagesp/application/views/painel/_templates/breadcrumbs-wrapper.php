
            <!--breadcrumbs start-->
            <div id="breadcrumbs-wrapper" class=" grey lighten-3">
                <!-- Search for small screen -->
                <div class="header-search-wrapper grey hide-on-large-only">
                    <i class="mdi-action-search active"></i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
                </div>
            <div class="container">
                <div class="row">
                <div class="col s12 m12 l12">
                    <h5 class="breadcrumbs-title">
                        <?php 
                            if($view['controller']['name'] !== "dashboard"){

                                echo $view['controller']['alias'];


                            }else{


                                echo "Bem-Vindos";

                            }
                        ?>
                    </h5>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?= base_url('painel/'.$view['controller']['name']) ?>"><?=  $view['controller']['alias']; ?> ></a> 
                            <a href="<?= base_url('painel/'.$view['controller']['name'].'/'.$view['action']['name']); ?>"><?=  $view['action']['alias']; ?></a>
                    </ol>
                </div>
                </div>
            </div>
            </div>
            <!--breadcrumbs end-->
            