<?php

namespace NPCore\Captcha;

use ReCaptcha\ReCaptcha;

class CaptchaManager
{
    /**
     * @var string
     */
    private $public;
    /**
     * @var string
     */
    private $secret;

    public function __construct()
    {
        $this->public = env('RECAPTCHA_PUBLIC');
        $this->secret = env('RECAPTCHA_SECRET');
    }

    /**
     * @param bool $withScript
     * @return string
     */
    public function generateView($withScript = true)
    {
        $str = '';
        if($withScript) {
            $str .= "<script src=\"https://www.google.com/recaptcha/api.js\"></script>\n";
        }
        $str .= "<div class=\"g-recaptcha\" data-sitekey=\"{$this->public}\"></div>";
        return $str;
    }

    /**
     * @return bool
     */
    public function validate()
    {
        $reCaptcha = new ReCaptcha($this->secret);
        $ip = $_SERVER['REMOTE_ADDR'];
        $postToken = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';

        return $reCaptcha->verify($postToken, $ip)->isSuccess();
    }
}