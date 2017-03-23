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
      * @param integer , should contains $i
      * @param string| null ,should contains $nom 
      * @param string| null, should contains $prenom
      * @param string| null, should contains $mail 
      *
      */
     public function Add($id, $nom, $prenom, $mail);
     

     /**
      * Update a user 
      * @param integer| null,should contains $id_user_account 
      * @param string| null ,should contains $nom 
      * @param string| null, should contains $prenom
      * @param string| null, should contains $mail 
      */
    public function Update($id_user_account,$nom, $prenom, $mail);

   
    /**
     * Set a role  in table user_roles
     * @param bundle
     * @param deleted
     * @param entity_id
     * @param revision_id
     * @param delta
     * @param roles_target_id;
     */
    public function roles($bundle,$deleted, $entity_id, $revision_id,$langcode, $delta, $roles_target_id);


    /**
     * @param integer| null , $id
     * @return image captcha
     */
    public function buildCaptchImage($id = null);

    /**
     * @param integer| null , $id
     *
     * @return $object
     */
    public function getNomAndPrenomById($id);

}
