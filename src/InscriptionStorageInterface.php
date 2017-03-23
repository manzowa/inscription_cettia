<?php

namespace Drupal\inscription_cettia;

/**
 * Interface InscriptionStorageInterface.
 *
 * @package Drupal\inscription_cettia
 */
interface InscriptionStorageInterface {

     /**
      * Return All objects
      *
      * @return  object.  
      */
     public function findAll();

     /**
      * Add  a user 
      * @param string| null ,should contains $nom 
      * @param string| null, should contains $prenom
      * @param string| null, should contains $mail 
      */
     public function setAdd($id,$nom, $prenom, $mail);

     /**
      * Sec a user table CT_user_connect
      * @param integer| null ,should contains $id_user 
      * @param time| null, should contains $timeout
      * @param string| null, should contains $jeton 
      * @param string| null, should contains $hits
      * @param string| null, should contains $hits_consult
      * @param string| null, should contains $hits_ses
      * @param datetime | null, should contains $date_inscrit
      * @param integer| null, should contains $valid
      * @param string| null, should contains $pref_sp
      * @param integer| null, should contains $pref_structure
      * @param string| null, should contains $pref_centre
      * @param integer| null, should contains $droits
      * @param string| null, should contains $domaine	
      * @param integer| null, should contains $prefs_mc
      * @param integer| null, should contains $charte_approuve
      * @param integer| null, should contains $coordonne_structure
      */
     public function setAddUserConnect($id_user,$timeout,$jeton,$hits,$hits_consult,$hits_ses,$date_inscrit, 
     $valid,$pref_sp,$pref_structure,$pref_centre,$droits,$domaine,$prefs_mc,$charte_approuve,$coordonne_structure);

     /**
      * Update a user 
      * @param integer| null,should contains $id_user_account 
      * @param string| null ,should contains $nom 
      * @param string| null, should contains $prenom
      * @param string| null, should contains $mail 
      */
    public function setUpdate($id_user_account,$nom, $prenom, $mail);

    /**
     * Delete a user 
     * @param integer| null , should contains $id
     */
    public function remove($id);

    /**
     * Set a role  in table user_roles
     * @param bundle
     * @param deleted
     * @param entity_id
     * @param revision_id
     * @param delta
     * @param roles_target_id;
     */
    public function setRoles($bundle,$deleted, $entity_id, $revision_id,$langcode, $delta, $roles_target_id);

    /**
     * Get user by id
     * @param interger| null, should contains $id 
     */
    public function findId($id);

    /**
     * Get name, prenom by $id
     * @param interger| null, should contains $id 
     */
    public function findNomAndPrenomById($id);

}
