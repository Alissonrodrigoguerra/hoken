<?php

function helperPainel2NomeDoCargo() {
    $ci = get_instance();
    $auth = $ci->session->userdata('auth');
    $cargo = $ci->db->get_where("cargos", array('idCargos' => $auth['idCargos']))->row_array();
    return $cargo['nome'];
}

function helperPainel2VerificaPermissao($table, $action) {

    $ci = get_instance();

    $auth = $ci->session->userdata('auth');

    $tabela = $ci->db->get_where('tabelas', array('nome' => $table, 'status' => '1'))->row_array();

    if (!$tabela && $auth['idCargos'] != '1') {
        $ci->session->set_flashdata('error', 'Permissão negada para a tabela <b>' . $table . '</b>.');
        redirect('painel/dashboard');
        #echo 'Tabela não encontrada e cargo diferente de root.';
    }

    $acao = $ci->db->get_where('acao', array('nome' => $action, 'status' => '1'))->row_array();

    if (!$acao && $auth['idCargos'] != '1') {
        $ci->session->set_flashdata('error', 'Permissão negada para a ação <b>' . $action . '</b>.');
        redirect('painel/dashboard');
        #echo 'Ação não encontrada e cargo diferente de root.';
    }

    $permissao = $ci->db->get_where('permissoes', array('idCargos' => $auth['idCargos'], 'idTabela' => @$tabela['idTabela'], 'idAcao' => @$acao['idAcao'], 'status' => '1'))->row_array();

    if (!$permissao && $auth['idCargos'] != '1') {
        $ci->session->set_flashdata('error', 'Permissão negada para a tabela <b>' . $table . '</b> e ação <b>' . $action . '</b>.');
        redirect('painel/dashboard');
        #echo 'Permissão não encontrada.';
    }
}

function helperPainel2MenuTabelas($controller, $action) {
    $ci = get_instance();
    $idCargo = helperSession2GetValueOfArray('auth', 'idCargos');
    $ci->load->database();

    $where = '1';

    $ci->db->cache_on();
    if ($idCargo == '1') {
        $tabelas = $ci->db->query("
            select a.*,
            b.nome grupo
            from tabelas a,
            tabelas_grupos b
            where {$where} 
            and a.idTabelas_grupos = b.idTabelas_grupos
            and a.status = '0'
            and b.status = '0'
            order by b.posicao, b.idTabelas_grupos, a.posicao, a.nome
        ")->result_array();
    } else {
        $tabelas = $ci->db->query("
            select a.*,
            b.nome grupo
            from tabelas a,
            tabelas_grupos b
            where {$where}
            and a.status = '1'
            and b.status = '1'
            and a.idTabelas_grupos = b.idTabelas_grupos
            and a.idTabela in (
                select idTabelas
                from permissoes
                where status = '1'
                and idCargos = '{$idCargo}'
            )
            order by b.posicao, b.idTabelas_grupos, a.posicao, a.nome
        ")->result_array();
    }
    $ci->db->cache_off();

    $html = '';
    $grupo = '';

    if ($tabelas) {

        foreach ($tabelas as $tabela) {

            $ci->db->cache_on();
            if ($idCargo == '1') {
                $acoes = $ci->db->query("
                select a.nome, 
                a.path
                from acao a
                where a.status = '0'
                and nome in('index','cadastrar')
            ")->result_array();
            } else {
                $acoes = $ci->db->query("
                select a.nome, 
                a.path
                from acoes a,
                permissoes b
                where a.status = '1'
                and b.status = '1'
                and a.idAcao = b.idAcao
                and b.idTabela = '{$tabela['idTabelas']}'
                and b.idCargo = '{$idCargo}'
                and a.nome in('index','cadastrar')
            ")->result_array();
            }
            $ci->db->cache_off();


            if ($grupo != $tabela['grupo']) {
                $html .= '<li>';
                $html .= '<p>';
                $html .= $tabela['grupo'];
                $html .= '</p>';
                $html .= '</li>';
                $html .= '<li class="li-hover"><div class="divider"></div></li>';
                $grupo = $tabela['grupo'];
            }

            if ($acoes) {
                $html .= '<li class="no-padding' . ($controller['name'] == $tabela['nome'] ? ' active' : null) . '">' . "\n";
                $html .= '<ul class="collapsible collapsible-accordion">';
                $html .= '<li class="bold"><a class="collapsible-header waves-effect waves-cyan">';
                $html .= '<i class="' . $tabela['icone'] . '"></i>' . "\n";
                $html .= $tabela['alias'] . "\n";
                $html .= '</a>' . "\n";
                $html .=' <div class="collapsible-body">';

                $html .= '<ul >' . "\n";

                foreach ($acoes as $acao) {
                    $html .= '<li' . ($action['name'] == $acao['nome'] ? ' class = "active"' : null) . '>' . "\n";
                    $html .= '<a href="' . base_url('painel/' . $tabela['nome'] . '/' . $acao['nome']) . '">' . "\n";
                    $html .= $acao['path'] . "\n";
                    $html .= '</a>' . "\n";
                    $html .= '</li>' . "\n";
                }

                $html .= '</ul>' . "\n";

                $html .= '</li>' . "\n";
            }
        }
    }


  

    return $html;
}
