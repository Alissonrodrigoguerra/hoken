<li ><p>Geral</p></li>
<li class="li-hover"><div class="divider"></div></li>

<li >
<a href="<?= base_url('painel/dashboard') ?>" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
</li>

<li><a href="<?= base_url('painel/dashboard/limpar_cache') ?>"><i class="mdi-image-grid-on"></i> Limpar Cache</a> </li>

<?= helperPainel2MenuTabelas($view['controller'], $view['action']); ?>


<?php if(helperSession2GetValueOfArray('auth', 'idCargos') == '1'): ?>
    
    <li ><p>Desenvolvedor</p></li>
    <li class="li-hover"><div class="divider"></div></li>
    <!-- menuIten -->
    <li class="no-padding <?= ($view['controller']['name'] == 'tabelas' ? ' active' : null) ?>">
        <ul class="collapsible collapsible-accordion">
           <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-toggle-radio-button-on"></i> Tabelas</a>
            <div class="collapsible-body">
            <ul>
                <li<?= ($view['action']['name'] == 'listar' ? ' class="active"' : null) ?>>
                    <a href="<?= base_url('painel/tabelas') ?>">Listar</a>
                </li>                                        
                <li<?= ($view['action']['name'] == 'cadastrar' ? ' class="active"' : null) ?>>
                    <a href="<?= base_url('painel/tabelas/cadastrar') ?>">Cadastrar</a>
                </li>
             </ul>
            </div>
          </li>
    </ul> 
    </li>
    <!-- menuIten -->
    <li class="no-padding <?= ($view['controller']['name'] == 'tabelas_grupos' ? ' active' : null) ?>">
    <ul class="collapsible collapsible-accordion">
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-toggle-radio-button-on"></i> Tabelas Grupos</a>
    <div class="collapsible-body">
    <ul>
    <li<?= ($view['action']['name'] == 'listar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/tabelas_grupos') ?>">Listar</a>
    </li>                                        
    <li<?= ($view['action']['name'] == 'cadastrar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/tabelas_grupos/cadastrar') ?>">Cadastrar</a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    </li>
    <!-- menuIten -->
    <li class="no-padding <?= ($view['controller']['name'] == 'acoes' ? ' active' : null) ?>">
    <ul class="collapsible collapsible-accordion">
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-toggle-radio-button-on"></i> Ações</a>
    <div class="collapsible-body">
    <ul>
    <li<?= ($view['action']['name'] == 'listar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/acao') ?>">Listar</a>
    </li>                                        
    <li<?= ($view['action']['name'] == 'cadastrar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/acao/cadastrar') ?>">Cadastrar</a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    </li>
    <!-- menuIten -->
    <li class="no-padding <?= ($view['controller']['name'] == 'cargos' ? ' active' : null) ?>">
    <ul class="collapsible collapsible-accordion">
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-toggle-radio-button-on"></i> Cargos</a>
    <div class="collapsible-body">
    <ul>
    <li<?= ($view['action']['name'] == 'listar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/cargos') ?>">Listar</a>
    </li>                                        
    <li<?= ($view['action']['name'] == 'cadastrar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/cargos/cadastrar') ?>">Cadastrar</a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    </li>
    <!-- menuIten -->
    <li class="no-padding <?= ($view['controller']['name'] == 'permissoes' ? ' active' : null) ?>">
    <ul class="collapsible collapsible-accordion">
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-toggle-radio-button-on"></i> Permissões</a>
    <div class="collapsible-body">
    <ul>
    <li<?= ($view['action']['name'] == 'listar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/permissoes') ?>">Listar</a>
    </li>                                        
    <li<?= ($view['action']['name'] == 'cadastrar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/permissoes/cadastrar') ?>">Cadastrar</a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    </li>
    <!-- menuIten -->
    <li class="no-padding <?= ($view['controller']['name'] == 'areas' ? ' active' : null) ?>">
    <ul class="collapsible collapsible-accordion">
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-toggle-radio-button-on"></i> Areas</a>
    <div class="collapsible-body">
    <ul>
    <li<?= ($view['action']['name'] == 'listar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/areas') ?>">Listar</a>
    </li>                                        
    <li<?= ($view['action']['name'] == 'cadastrar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/areas/cadastrar') ?>">Cadastrar</a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    </li>
    <!-- menuIten -->
    <li class="no-padding <?= ($view['controller']['name'] == 'cargos_areas' ? ' active' : null) ?>">
    <ul class="collapsible collapsible-accordion">
    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-toggle-radio-button-on"></i> Cargos - Áreas</a>
    <div class="collapsible-body">
    <ul>
    <li<?= ($view['action']['name'] == 'listar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/cargos_areas') ?>">Listar</a>
    </li>                                        
    <li<?= ($view['action']['name'] == 'cadastrar' ? ' class="active"' : null) ?>>
    <a href="<?= base_url('painel/cargos_areas/cadastrar'); ?>">Cadastrar</a>
    </li>
    </ul>
    </div>
    </li>
    </ul>
    </li>
    
    
    
    <?php  endif; ?>
    
    
    
    
    