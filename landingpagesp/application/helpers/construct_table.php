<?php 

function helperconstruct_table_criar($value)
  {
  	$attributes = array('ENGINE' => 'InnoDB');
	$this->dbforge->create_table($value, FALSE, $attributes);

	
  	$fields = array(
        'blog_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
        ),
        'blog_title' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'unique' => TRUE,
        ),
        'blog_author' => array(
                'type' =>'VARCHAR',
                'constraint' => '100',
                'default' => 'King of Town',
        ),
        'blog_description' => array(
                'type' => 'TEXT',
                'null' => TRUE,
        ),
	);

	$this->dbforge->add_field($fields);
        $this->dbforge->add_field('id_'.$value.'');
	



  }
?>