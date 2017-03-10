<?php

namespace Drupal\inscription_cettia;

/**
 * Interface InscriptionManagerInterface.
 *
 * @package Drupal\inscription_cettia
 */
interface InscriptionManagerInterface {
    /**
     *test
     *
     * @return  object.  
     */
    public function  test();

    /**
      * Add  a user 
      * @param string| null ,should contains $nom 
      * @param string| null, should contains $prenom
      * @param string| null, should contains $mail 
      * @param integer| null, should contains $actif
      *
      */
     public function Add($nom, $prenom, $mail, $actif);

     /**
      * Update a user 
      * @param integer| null,should contains $id_user_account 
      * @param string| null ,should contains $nom 
      * @param string| null, should contains $prenom
      * @param string| null, should contains $mail 
      */
    public function Update($id_user_account,$nom, $prenom, $mail);

}
