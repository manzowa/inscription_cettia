<?php

/**
 * @file 
 *
 * I have implement  one interface ('InscriptionManagerInterface').
 *
 * @package \Drupal\inscription_cettia
 */
namespace Drupal\inscription_cettia;

use Drupal\inscription_cettia\InscriptionManagerInterface;
use Drupal\inscription_cettia\InscriptionStorageInterface;
use Drupal\inscription_cettia\InscriptionStorage;
use Drupal\inscription_cettia\InscriptionCaptchaInterface;
use Drupal\inscription_cettia\InscriptionCaptcha;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class InscriptionManager.
 *
 */
class InscriptionManager implements InscriptionManagerInterface {

  /**
   * The inscription storage service
   *
   * @var \Drupal\inscription_cettia\InscriptionStorageInterface
   */
  protected $inscriptionStorage;

  /**
   * The inscription Captcha service
   *
   * @var \Drupal\inscription_cettia\InscriptionCaptchaInterface
   */
  protected $inscriptionCaptcha;

  /**
   * Constructor  a InscriptionManager object.
   *
   * @param  \Drupal\inscription_cettia\InscriptionStorageInterface 
   */
   
  public function __construct(InscriptionStorageInterface $inscriptionStorage, InscriptionCaptchaInterface $inscriptionCaptcha){
     $this->inscriptionStorage = $inscriptionStorage;
     $this->inscriptionCaptcha = $inscriptionCaptcha;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('inscription.storage'),
      $container->get('inscription.captcha')
    );
  }


  /**
   * Test
   */
  public function test(){
    $lesDonnees =  $this->inscriptionStorage->findAll();
     foreach($lesDonnees as $UneDonnee){
       // debug($UneDonnee);
    }
    $this->inscriptionCaptcha->creerImageCaptcha();
  }

  /**
   * {@inheritdoc}
   */
  public function Add($id, $nom, $prenom, $mail){
     $this->inscriptionStorage->setAdd($id,$nom, $prenom, $mail);
  }

  /**
   * {@inheritdoc}
   */
  public function Update($id_user_account,$nom, $prenom, $mail){
    $this->inscriptionStorage->setUpdate($id_user_account,$nom, $prenom, $mail);
  }

  /**
   * {@inheritdoc}
   */
  public function roles($bundle,$deleted, $entity_id, $revision_id,$langcode, $delta, $roles_target_id){
    $this->inscriptionStorage->setRoles($bundle,$deleted, $entity_id, $revision_id,$langcode, $delta, $roles_target_id);
  }

}
