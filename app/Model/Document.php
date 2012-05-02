<?php
App::uses('AppModel', 'Model'); 
/**
 * Document Model
 *
 * @property Tag $Tag
 */
class Document extends AppModel {
	public $displayField = 'filename';
	
   var $actsAs = array(
        'MeioUpload.MeioUpload' => array( 
            'filename' => array(
					'maxSize' => 268435456,
					'thumbnails'=>false,
					'allowedMime' => array('image/jpeg', 'image/pjpeg', 'image/png', 'image/gif', 'image/bmp', 'image/x-icon', 'image/vnd.microsoft.icon', 'application/pdf', 'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel', 'application/rtf', 'application/zip'),
					'allowedExt' => array('.jpg', '.jpeg', '.png', '.gif', '.bmp', '.ico', '.pdf', '.doc', '.pptx', '.ppt', '.xls', '.rtf', '.zip', '.xlsx'),
                )                   
            )
        );


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'caption' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Tag' => array(
			'className' => 'Tag',
			'joinTable' => 'documents_tags',
			'foreignKey' => 'document_id',
			'associationForeignKey' => 'tag_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
