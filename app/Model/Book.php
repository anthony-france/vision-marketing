<?php
App::uses('AppModel', 'Model');
/**
 * Book Model
 *
 * @property Contact $Contact
 * @property GeneratedImage $GeneratedImage
 * @property GeneratedPdf $GeneratedPdf
 * @property Image $Image
 */
class Book extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'contact_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contact_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contact_phone' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contact_email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Image' => array(
			'className' => 'Image',
			'joinTable' => 'books_images',
			'foreignKey' => 'book_id',
			'associationForeignKey' => 'image_id', 
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
	
	public function generate_page($image, $contact, $book) {
		
		$path = '/var/www/app/webroot';
		$captionFont = '/var/www/app/webroot/files/ariblk.ttf';
		$captionFontSize = 20.0;

		$angle = 0;

		$generatedFileName = $path . '/' . $image['dir'] . '/generated/' . Inflector::slug($contact['name']) . '-' . Inflector::slug($book['name']) . '-' . $image['filename'];
		$generatedFile = imagecreatetruecolor(1200, 842);

		$fontColor = imagecolorallocate($generatedFile, 255, 255, 255);

		$background = imagecreatefromjpeg($path .'/' . $image['dir'] . '/' . $image['filename']);

		if ( strpos($contact['email'], 'visionps.com')) {
			   $footer = imagecreatefromjpeg($path . '/img/vig_footer.jpg');
		}
		else {
			   $footer = imagecreatefromjpeg($path . '/img/pi_footer.jpg');
		}

		imagecopymerge($generatedFile, $background, 0, 0, 0, 0, 1200, 776, 100);
		imagecopymerge($generatedFile, $footer, 0, 718, 0, 0, 1200, 126, 100);

	   // Image Caption 350 x 815

		imagettftext(
			$generatedFile,
			$captionFontSize,
			$angle,
			350,
			785,
			$fontColor,
			$captionFont,
			$image['caption']
		);

		// Contact Info - Right Aligned

		foreach (  $contact as $key => $text) {
			
			switch($key) {
				case 'name':
					$contactFont = '/var/www/app/webroot/files/ariblk.ttf';
					$contactFontSize = 14.0;
					$y = 765;
					break;
				case 'phone':
					$contactFont = '/var/www/app/webroot/files/arial.ttf';
					$contactFontSize = 12.0;
					$y = 785;
					break;
				case 'email':
					$contactFont = '/var/www/app/webroot/files/arial.ttf';
					$contactFontSize = 12.0;
					$y = 802;
					break;
				default: 
					$contactFont = '/var/www/app/webroot/files/arial.ttf';
					$contactFontSize = 6.0;
					$y = 1;
					break;
			}

			$dimensions = imagettfbbox(
				$contactFontSize,
				$angle,
				$contactFont,
				$text
			);

			$textWidth = abs($dimensions[4] - $dimensions[0]);
			$x = imagesx($generatedFile) - $textWidth;

			imagettftext(
					$generatedFile,
					$contactFontSize,
					$angle,
					$x - 15,
					$y,
					$fontColor,
					$contactFont,
					$text
			);

		}

		imagejpeg($generatedFile, $generatedFileName, 100);
		
		imagedestroy($background);
		imagedestroy($footer);
		imagedestroy($generatedFile);
		
		return($generatedFileName);
	}
	
	function create_zip($files = array(),$destination = '',$overwrite = false) {
        if(file_exists($destination) && !$overwrite) { return false; }
        $valid_files = array();
        if(is_array($files)) {
                foreach($files as $file) {
                        if(file_exists($file)) {
                                $valid_files[] = $file;
                        }
                }
        }

        if(count($valid_files)) {
                $zip = new ZipArchive();
                if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                        return false;
                }
                foreach($valid_files as $file) {
                    $zip->addFile($file,str_replace('/var/www/app/webroot/uploads/image/filename/generated/', '', $file));
                }
                
                $zip->close();
               
                if ( file_exists($destination) ) {
					return $destination;
				}
				
        }
        else
        {
                return false;
        }
	}

}
