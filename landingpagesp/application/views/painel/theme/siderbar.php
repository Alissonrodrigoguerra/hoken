  <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="<?= base_url('assets/painel/images/'.helperSession2GetValueOfArray('auth', 'imagem')); ?>" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="<?= base_url('editar-profile'); ?>"><i class="mdi-action-settings"></i> Editar</a>
                                    </li>
                                    <li><a href="<?= base_url('logs'); ?>"><i class="mdi-communication-live-help"></i> Logs</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="<?= base_url('logout'); ?>"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>

                                    
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?= helperSession2GetValueOfArray('auth', 'nome') ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal"><?= helperSession2GetValueOfArray('auth', 'cargo') ?></p>
                            </div>
                        </div>
                    </li>

                    <li class="bold active"><a href="<?= base_url('dashboard'); ?>" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a></li>
                   <!-- colapse -->
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                        <?php  echo helperPainel2MenuTabelas($view['controller'], $view['action']); ?>

                      
                  
                    <!-- menu tabelas -->
                   <?php if (helperSession2GetValueOfArray('auth', 'idCargo') == '1'):?>
                   
                   <!-- menu tabelas -->

                    <li class="li-hover"><p class="ultra-small margin more-text">Configurações</p></li>
                    <li class="li-hover"><div class="divider"></div></li>

                    <li><a href="<?php base_url('tabelas'); ?>"></i>Tabela</a>
                    </li>
                    <li class="bold <?= ($view['controller']['name'] == 'tabelas_grupos' ? ' active' : null) ?>">
                        <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> Tabelas</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php base_url('tabelas/index'); ?>">Listar</a>
                                        </li>                                        
                                        <li><a href="<?php base_url('tabelas/cadastrar'); ?>">Cadastrar</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                           
                            <li class="bold <?= ($view['controller']['name'] == 'tabelas_grupos' ? ' active' : null) ?>">
                            <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> Tabelas Grupos</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php base_url('tabelas_grupos/index'); ?>">Listar</a>
                                        </li>                                        
                                        <li><a href="<?php base_url('tabelas_grupos/cadastrar'); ?>">Cadastrar</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="bold <?= ($view['controller']['name'] == 'tabelas_grupos' ? ' active' : null) ?>">
                            <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> Ações</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php base_url('acoes/index'); ?>">Listar</a>
                                        </li>                                        
                                        <li><a href="<?php base_url('acoes/cadastrar'); ?>">Cadastrar</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="bold <?= ($view['controller']['name'] == 'tabelas_grupos' ? ' active' : null) ?>">
                            <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> Cargos</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php base_url('cargos/index'); ?>">Listar</a>
                                        </li>                                        
                                        <li><a href="<?php base_url('cargos/cadastrar'); ?>">Cadastrar</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="bold <?= ($view['controller']['name'] == 'tabelas_grupos' ? ' active' : null) ?>">
                            <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> Permissões</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php base_url('permissoes/index'); ?>">Listar</a>
                                        </li>                                        
                                        <li><a href="<?php base_url('permissoes/cadastrar'); ?>">Cadastrar</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="bold <?= ($view['controller']['name'] == 'tabelas_grupos' ? ' active' : null) ?>">
                            <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> Áreas</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php base_url('areas/index'); ?>">Listar</a>
                                        </li>                                        
                                        <li><a href="<?php base_url('areas/cadastrar'); ?>">Cadastrar</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
      
                            <li class="bold <?= ($view['controller']['name'] == 'tabelas_grupos' ? ' active' : null) ?>">
                            <a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> Cargos-Áreas</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="<?php base_url('cargos-areas/index'); ?>">Listar</a>
                                        </li>                                        
                                        <li><a href="<?php base_url('cargos-areas/cadastrar'); ?>">Cadastrar</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
      
  
                  
                    <li ><a href="<?= base_url('phpmailer'); ?>" class="waves-effect waves-cyan"><i class="mdi-action-exit-to-app"></i> E-mail</a></li>
                    <li class="bold active blue lighten-5"><a href="<?= base_url('painel/painel/limpar_cache'); ?>" class="waves-effect waves-cyan"><i class="mdi-action-cached"></i> Limpar Cahce</a></li>

                    <?php endif; ?>
                    </ul>
                    </li>
                </ul>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->    