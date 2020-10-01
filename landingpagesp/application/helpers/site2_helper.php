<?php

function helperSite2Logo() {

    $ci = get_instance();

    $ci->db->cache_on();
    $row = $ci->db->query("
            select *
            from logos
            where status = '1'
            order by dataCadastro desc
            limit 1
        ")->row_array();
    $ci->db->cache_off();

    return base_url("assets/img/upload/logos/{$row['imagem']}");
}

function helperSite2RedesSociais() {

    $ci = get_instance();

    $html = '';

    $ci->db->cache_on();
    $rows = $ci->db->query("
            select *
            from redes_sociais
            where status = '1'
            order by dataCadastro
        ")->result_array();
    $ci->db->cache_off();

    if ($rows) {
        foreach ($rows as $row) {
            $html .= '<li><a href="' . $row['link'] . '"><i class="' . $row['icone'] . '"></i></a></li>';
        }
    }
    return $html;
}

function helperSite2Contato($coluna) {

    $ci = get_instance();

    $ci->db->cache_on();
    $row = $ci->db->query("
        select *
        from contatos
        where status = '1'
        order by dataCadastro desc
        limit 1
    ")->row_array();
    $ci->db->cache_off();

    return $row[$coluna];
}

function helperSite2ProductFrontThumbnail($idProduto) {
    $ci = get_instance();
    $sql = "select `imagem` from `produtos_imagens` where `status` = '1' and `idProduto` = '{$idProduto}' order by `posicao` limit 1 offset 0";
    $row = $ci->db->query($sql)->row_array();
    if ($row) {
        return $row['imagem'];
    } else {
        return null;
    }
}

function helperSite2ProductBackThumbnail($idProduto) {
    $ci = get_instance();
    $sql = "select `imagem` from `produtos_imagens` where `status` = '1' and `idProduto` = '{$idProduto}' order by `posicao` limit 1 offset 1";
    $row = $ci->db->query($sql)->row_array();
    if ($row) {
        return $row['imagem'];
    } else {
        return null;
    }
}

function helperSite2MenuCategoria($categoria_path) {
    $ci = get_instance();
    $html = '';
    $categoria_path = addslashes($categoria_path);
    $sql = "
        select * 
        from categorias a 
        where a.status = '1' 
        and a.path = '{$categoria_path}'
        order by a.dataCadastro";
    $categoria = $ci->db->query($sql)->row_array();
    if ($categoria) {
        $html .= '<li class="yolo_megamenu mega-col-columns-4 menu-item menu-item-has-children">';

        $html .= '<a href="' . base_url("linha/{$categoria['path']}") . '" title="' . $categoria['nome'] . '" style="font-size:14px">';
        $html .= $categoria['nome'];
        $html .= '</a>';

        $sql = "
            select * 
            from subcategorias 
            where status = '1' 
            and idCategoria = '{$categoria['idCategoria']}'
            and idSubcategoria in (
                select idSubcategoria
                from produtos
                where status = '1'
                and estoque > 0
            )
            order by nome
        ";
        $subcategorias = $ci->db->query($sql)->result_array();

        $linhas_por_coluna = ceil(count($subcategorias) / 3);

        $html .= '<ul class="sub-menu">';

        $html .= '<li class="menu-item">';
        $html .= '<div class="yolo_megamenu_widget_area">';
        $html .= '<div class="widget">';
        $html .= '<img src="' . base_url("assets/uploads/categorias/{$categoria['imagem']}") . '" alt="' . $categoria['nome'] . '">';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</li>';

        $html .= '<li class="menu-item menu-item-has-children">';

        $html .= '<ul class="sub-menu">';

        for ($i = 0; $i < count($subcategorias); $i++) {
            $html .= '<li class="menu-item">';
            $html.= '<a href="' . base_url("linha/{$categoria['path']}/{$subcategorias[$i]['path']}") . '">';
            $html.= $subcategorias[$i]['nome'];
            $html.= '</a>';
            $html.= '</li>';
            if (($i + 1) % $linhas_por_coluna == 0 && ($i + 1) < count($subcategorias)) {
                $html .= '</ul>';
                $html .= '</li>';
                $html .= '<li class="menu-item menu-item-has-children">';
                $html .= '<ul class="sub-menu">';
            }
        }

        $html .= '</ul>';

        $html .= '</li>';

        $html .= '</ul>';

        $html .= '</li>';
    }
    return $html;
}

function helperSite2FooterCategorias() {

    $ci = get_instance();

    $sql = "
        select *
        from categorias
        where status = '1'
        order by nome
    ";

    $rows = $ci->db->query($sql)->result_array();

    $html = '';

    if ($rows) {
        $html .= '<ul class="menu">';
        foreach ($rows as $row) {
            $html .= '<li>';
            $html .= '<a href="' . base_url("linha/{$row['path']}") . '">';
            $html .= $row['nome'];
            $html .= '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
    }

    return $html;
}

function helperSite2OtimizaImagem($origem, $destino, $imagem, $width, $heigth, $qualidade) {

    $ci = get_instance();

    if (!file_exists("{$destino}/{$imagem}")) {

        $config['image_library'] = 'gd2';
        $config['source_image'] = "{$origem}/{$imagem}";
        $config['new_image'] = "{$destino}/{$imagem}";
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['quality'] = $qualidade;
        $config['width'] = $width;
        $config['height'] = $heigth;

        $ci->load->library('image_lib', $config);

        if (!$ci->image_lib->resize()) {
            return false;
        } else {
            return "{$destino}/{$imagem}";
        }
    } else {
        return "{$destino}/{$imagem}";
    }
}

function helperSite2VerificaProdutoNaListaDePresentes($idListaDePresente, $idProduto) {

    $ci = get_instance();

    $idListaDePresente = addslashes($idListaDePresente);

    $sql = "
        select *
        from listas_de_presentes_produtos
        where status = '1'
        and idListaDePresente = '{$idListaDePresente}'
        and idProduto = '{$idProduto}'
    ";

    $rows = $ci->db->query($sql)->result_array();

    if (count($rows) > 0) {
        return true;
    } else {
        return false;
    }
}
