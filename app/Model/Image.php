<?php
App::uses('AppModel', 'Model');
/**
 * Image Model
 *
 * @property Book $Book
 * @property Tag $Tag
 */
class Image extends AppModel {
	public $displayField = 'caption'; 
	

   var $actsAs = array(
        'MeioUpload.MeioUpload' => array( 
            'filename' => array(
                'thumbsizes' => array(
                    'index' => array(
                        'width' => 232,
                        'height' => 150,
						'forceAspectRatio' => 'C'
                    ),
					'icon' => array(
                        'width' => 52,
                        'height' => 36,
						'forceAspectRatio' => 'TR'
                    )
                )                   
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
		'Book' => array(
			'className' => 'Book',
			'joinTable' => 'books_images',
			'foreignKey' => 'image_id',
			'associationForeignKey' => 'book_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Tag' => array(
			'className' => 'Tag',
			'joinTable' => 'images_tags',
			'foreignKey' => 'image_id',
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
