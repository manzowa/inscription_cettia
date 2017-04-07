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

    /**
     * Set a CT_user_connect
     *
     * @param integer| null , $id_user
     * @param string | null, $timeout
     * @param string | null, $jeton
     * @param string | null, $hits
     * @param string | null, $hits_consult
     * @param string | null, $hits_ses
     * @param date | null,   $date_inscrit
     * @param string | null, $valid
     * @param string | null, $pref_sp
     * @param string | null, $pref_structure
     * @param string | null, $pref_centre
     * @param string | null, $droits
     * @param string | null, $domaine
     * @param string | null, $prefs_mc
     * @param integer| null, $charte_approuve
     * @param string | null, $coordonne_structure
     */
    public function AddConnect($id_user,$timeout,$jeton,$hits,$hits_consult,$hits_ses,$date_inscrit,$valid,$pref_sp,$pref_structure,$pref_centre,$droits,$domaine,$prefs_mc,$charte_approuve,$coordonne_structure);

}
