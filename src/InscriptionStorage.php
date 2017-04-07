<?php

/**
 * @file 
 *
 *
 * @package \Drupal\inscription_cettia
 */
 
namespace Drupal\inscription_cettia;

use Drupal\Core\Database\connection;
use Drupal\inscription_cettia\InscriptionStorageInterface;


/**
 * Class InscriptionStorage.
 *
 */
class InscriptionStorage implements InscriptionStorageInterface {

  /**
   *  Database Service Object.
   *
   *  @param \Drupal\Core\Database\connection $connection
   * 
   */
  private $connection;

  /**
   * Constructor a InscriptionStorage object.
   */
  public function __construct(Connection $connection) {
    $this->connection = $connection;
  }

  /**
   * {@inheritdoc}
   */
  public function findAll() {
    return $this->connection->query("SELECT * FROM {users_field_data}");
  }
  
  /**
   * {@inheritdoc}
   */
  public function setAdd($id, $nom, $prenom, $mail){
     $this->connection->insert('bdseme_cettia.CT_user_obseurs')
          ->fields(array('id_user'=>$id,'nom'=>$nom, 'prenom'=>$prenom,'mel'=>$mail))
          ->execute();
  }

  /**
   * {@inheritdoc}
   */
   public function setUpdate($id_user_account,$nom, $prenom, $mail){
       $this->connection->update('bdseme_cettia.CT_user_obseurs')
            ->fields(array('nom'=>$nom, 'prenom'=>$prenom,'mel'=>$mail))
            ->condition('id_user',$id_user_account,'=')
            ->execute();
   }

   /**
    * {@inheritdoc}
    */
    public function remove($id){
    }

    /**
     * {@inheritdoc}
     */
    public function setRoles($bundle,$deleted, $entity_id, $revision_id,$langcode, $delta, $roles_target_id){
        $this->connection->insert('8drupal.user__roles')
          ->fields(array('bundle'=>$bundle, 'deleted'=>$deleted,'entity_id'=>$entity_id,'revision_id'=>$revision_id,
                      'langcode'=>$langcode,'delta'=>$delta,'roles_target_id'=>$roles_target_id
          ))->execute();
     }

    /**
     * {@inheritdoc}
     */
    public function findId($id){
      return $this->connection->select('bdseme_cettia.CT_user_obseurs','bccuo')
                  ->fields('bccuo', array('id_user'))
                  ->condition('id_user',$id,'=')->execute();
    }

    /**
     * {@inheritdoc}
     */
     public function setAddUserConnect($id_user,$timeout,$jeton,$hits,$hits_consult,$hits_ses,$date_inscrit,$valid,$pref_sp,$pref_structure,$pref_centre,$droits,$domaine,$prefs_mc,$charte_approuve,$coordonne_structure){
        $this->connection->insert('bdseme_cettia.CT_user_connect')
             ->fields(array('id_user'=>$id_user, 'timeout'=>$timeout, 'jeton'=>$jeton, 'hits'=>$hits,'hits_consult'=>$hits_consult, 'hits_ses'=>$hits_ses,
             'date_inscrit'=>$date_inscrit, 'valid'=>$valid,'pref_sp'=>$pref_sp, 'pref_structure'=>$pref_structure,'pref_centre'=>$pref_centre,'droits'=>$droits,
             'domaine'=>$domaine,'charte_approuve'=>$charte_approuve,'coordonne_structure'=>$coordonne_structure
          ))->execute();
     }

    /**
     * {@iheritdoc}
     */
    public function findNomAndPrenomById($id){
       return $this->connection->select('bdseme_cettia.CT_user_obseurs','bccuo')
              ->fields('bccuo',array('nom','prenom'))
              ->condition('id_user',$id,'=')
              ->execute()->fetchAll();
    }

}
