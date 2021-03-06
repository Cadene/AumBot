<?php
App::uses('AppModel', 'Model');
/**
 * Member Model
 *
 * @property Girl $Girl
 */
class Member extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'girl_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'datetime' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Girl' => array(
			'className' => 'Girl',
			'foreignKey' => 'girl_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
