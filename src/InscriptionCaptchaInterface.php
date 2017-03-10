<?php

namespace Drupal\inscription_cettia;

/**
 * Interface InscriptionCaptchaInterface.
 *
 * @package Drupal\inscription_cettia
 */
interface InscriptionCaptchaInterface {

    /**
     * Return image create pour captcha
     *
     * @return image create
     */
    public function creerImageCaptcha($id = null);

    /**
     * Return route
     *
     * @return path 
     */
    public function pathCaptcha($path = null, $valeur= null, $format =null);

}
