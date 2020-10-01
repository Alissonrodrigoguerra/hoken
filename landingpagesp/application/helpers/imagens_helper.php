<?php


function arquivos_upload( $file = NULL, $config = NULL ){
    
    $ci = get_instance();
    
    $ci->load->helper('string2');
    $ci->load->helper('string');
        $imagem_path = './assets/uploads/' .  $config['table_nome'] . '/';
        
        #$imagem_path .= date('Ymd');
        if (!file_exists("{$imagem_path}")) {
            if (mkdir("{$imagem_path}", 0755, true)) {
                $ci->load->helper('file');
                $html = '<html><head><title>403 Forbidden</title></head><body><p>Directory access is forbidden.</p></body></html>';
                write_file("{$imagem_path}/index.html", $html);
                write_file("{$imagem_path}/index.php", $html);
            }
        }

        $imagem_upload_config['upload_path'] = $imagem_path;
        $imagem_upload_config['allowed_types'] = $config['allowed_types'];
        $imagem_upload_config['max_size'] = $config['max_size'];
        $imagem_upload_config['max_width'] = $config['imagem_max_width'];
        $imagem_upload_config['max_height'] = $config['imagem_max_height'];
        $imagem_upload_config['encrypt_name'] = false;
        $imagem_upload_config['file_name'] = $config['name'] . '-' . random_string('alnum', 4);


        $ci->load->library('upload');
        $ci->upload->initialize($imagem_upload_config);

            if (!$ci->upload->do_upload('Imagem')) {
            
                $imagem_upload_error = $ci->upload->display_errors();
                $ci->session->set_flashdata('error', $imagem_upload_error);
                redirect(current_url());
            
            } else {

            $imagem_upload_data = $ci->upload->data();

            $imagem_resize_config['image_library'] = 'gd2';
            $imagem_resize_config['source_image'] = $imagem_path . $imagem_upload_data['file_name'];
            $imagem_resize_config['create_thumb'] = FALSE;
            $imagem_resize_config['maintain_ratio'] = TRUE;
            $imagem_resize_config['width'] =$config['imagem_min_width'];
            $imagem_resize_config['height'] =$config['imagem_min_height'];

            $ci->load->library('image_lib');
            $ci->image_lib->initialize($imagem_resize_config);

            if (!$ci->image_lib->resize()) {
                $ci->session->set_flashdata('error', 'Ocorreu um erro no redimencionamento da imagem.');
                redirect(current_url());
            }
        }

        // unlink("{$imagem_path}{$data['view']['record']['imagem']}");
        
        return  $imagem_upload_data['file_name'];

    }

    //


function arquivos_remover($pasta = Null, $file = Null){

$ci = get_instance();
$imagem_path = 'assets/uploads/'.  $pasta .'/'.  $file;
unlink($imagem_path);


}

?>