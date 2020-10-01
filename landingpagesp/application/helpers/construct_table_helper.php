<?php 
 function helperconstruct_table_insert_fields($table, $nome=null, $type=null, $constraint=null, $unsigned=null, $aut_increment=null){

		$ci = get_instance();
		$ci->load->dbforge();
		$fieldsarray = array();


		if (!empty($type)){$fieldsarray['type'] = $type;}
		if (!empty($type)){$fieldsarray['constraint'] = $constraint;}
		if (!empty($type)){$fieldsarray['unsigned'] = $unsigned;}
		if (!empty($type)){$fieldsarray['aut_increment'] = $aut_increment;}

		$fields = array($nome => $fieldsarray);
		$ci->dbforge->add_column($table, $fields, 'path');

}

function helperconstruct_table_criar($value){
	$ci = get_instance();
	$ci->load->dbforge();	
		$fields = array(
			'id'.ucwords(strtolower($value)) => array(
			'type' => 'bigint',
			'constraint' => 20,
			'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			
			'ip' => array(
	                'type' => 'char',
	                'constraint' => '15',
	                'comment' => 'IP header',
			),
			'path' => array(
				'type' => 'varchar',
				'constraint' => '255',
			),
	        'user_agent' => array(
	                'type' =>'VARCHAR',
					'constraint' => '255',
					'comment' => 'User-Agent header',

	        ),
	        'created_at' => array(
	                'type' => 'datetime',
	                'null' => TRUE,
	        )
	        
		);

		
		$id = 'id'.ucwords(strtolower($value));
		$ci->dbforge->add_field($fields);
		$ci->dbforge->add_key($id, TRUE);
		$ci->dbforge->create_table($value);


  }

	//idTable = $id = 'id'.ucwords(strtolower($value));

    // 'id'.ucwords(strtolower($value)) => array(
	        //         'type' => 'bigint',
	        //         'constraint' => 20,
	        //         'unsigned' => TRUE,
	        //         'auto_increment' => TRUE
			// ),
?>

