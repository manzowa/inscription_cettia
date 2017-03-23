<?php

/**
 * @file 
 *
 * @package Drupal\inscription_cettia
 */

namespace Drupal\inscription_cettia;


/**
 * Class InscriptionCaptcha.
 *
 */
class InscriptionCaptcha implements InscriptionCaptchaInterface {

  /**
   * @var array|null, $questions;
   */
  protected $questions = [
       1 => ["Nombre d'oiseaux sur la photo",2],
			 2 => ["Nombre de fleurs sur la photo",3],
			 3 => ["Nombre de fleurs sur la photo",6],
			 4 => ["Nombre de fleurs sur la photo",4],
			 5 => ["Nombre d'oiseaux sur la photo",2],
			 6 => ["Nombre de pattes sur la photo",6],
			 7 => ["Nombre d'oiseaux sur la photo",2],
			 8 => ["Nombre de fleurs sur la photo",1],
			 9 => ["Nombre de papillons sur la photo",3],
		 	10 => ["Nombre de chenilles sur la photo",3],
			11 => ["Nombre d'oiseaux sur la photo",8],
			12 => ["Nombre d'oiseaux sur la photo",7],
			13 => ["Nombre d'oiseaux sur la photo",6],
			14 => ["Nombre d'escargot sur la photo",1],
		  15 => ["Nombre de pétales sur la photo",12],
			16 => ["Nombre d'ailes sur la photo",4],
			17 => ["Nombre de pétales sur la photo",5],
			18 => ["Nombre d'oiseaux sur la photo",9],
			19 => ["Nombre d'oiseaux sur la photo",10],
  ];

  /**
   * @var array|null, $lettres;
   */
  protected $lettres = [ 'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

  /**
   * @var array|null, $number_text;
   */
  protected $number_text =['zéro','un','deux','trois','quatre','cinq','six','sept','huit','neuf','dix','onze','douze','treize',
    'quatorze','quinze','seize','dix-sept','dix-huit','dix-neuf','vingt',
  ];


  /**
   * Constructor a InscriptionCaptcha object.
   */
  public function __construct() {
  }

  /**
   * {@inheritdoc}
   */
  public function creerImageCaptcha($id = null){
      mt_srand((double) microtime()*1000000);
      // valeur aleatoire pour le photo.
      $photo = mt_rand (1,19); 
      // Retourne la taille d'une image
      $img_size = getimagesize(drupal_get_path('module', 'inscription_cettia').'/photos/'.$photo.'.jpg'); 
      // Crée une nouvelle image depuis un fichier ou une URL
      $img_photo = imagecreatefromjpeg(drupal_get_path('module', 'inscription_cettia').'/photos/'.$photo.'.jpg');

      $txt_photo = $this->questions[$photo][0];
      $reponse_photo = $this->questions[$photo][1];

      $font = drupal_get_path('module', 'inscription_cettia').'/font/'.'verdana.ttf';
      $dim = imagettfbbox (11,0, $font ,$this->questions[$photo][0]);
      $largeur = $dim[2] - $dim[0] + 16;
    	$largeur = $largeur>266 ? $largeur : 266;
      $img = imagecreatetruecolor ($largeur,$img_size[1]+16+78);
	    imagefill($img, 0, 0, imagecolorallocate($img, 206, 206, 162));
	    imagecopy($img,$img_photo, 8 , 8 , 0 , 0 , $img_size[0],$img_size[1]);
	    $noir = imagecolorallocate($img, 20,20,20);

      mt_srand((double) microtime()*1000000);
      $nb = mt_rand (1,10);
	    mt_srand((double) microtime()*1000000);
	    $l1 = mt_rand (0,25);
	    mt_srand((double) microtime()*1000000);
	    $l2 = mt_rand (0,25);

      imagettftext($img, 11, 0, 8, $img_size[1]+16+22, $noir, $font, $this->questions[$photo][0]);
      imagettftext($img, 11, 0, 8, $img_size[1]+16+65, $noir, $font, "...suivi des lettres ".$this->lettres[$l1].' et '.$this->lettres[$l2]);

      if(!isset($id)){
	    	$id = uniqid("img_",true);
	    }
      $rep = $this->questions[$photo][1].$this->lettres[$l1].$this->lettres[$l2];
	    $rep = strtolower($rep);
	    $fp = fopen(drupal_get_path('module', 'inscription_cettia').'/images/'.$id.'.php',"w");
    	$nboctets = fwrite($fp,'<?php $reponse="'.$rep.'";');
	    fclose($fp);
	    imagejpeg($img, drupal_get_path('module', 'inscription_cettia').'/images/'.$id.'.jpg',90);
    	return $id;
  }

  /**
   * {@inheritdoc}
   */
  public function pathCaptcha($path = null, $valeur= null, $format =null){
     return drupal_get_path('module', 'inscription_cettia').'/'.$path.'/'.$valeur.'.'.$format;
  }
}
