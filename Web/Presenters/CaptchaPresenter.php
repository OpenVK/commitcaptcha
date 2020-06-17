<?php declare(strict_types=1);
namespace captcha\Web\Presenters;
use Chandler\MVC\SimplePresenter;
use Nette\Utils\Image;
use captcha\CaptchaManager;

class CaptchaPresenter extends SimplePresenter
{
    function renderCaptcha()
    {
        $manager = CaptchaManager::i();
        $image   = $manager->getImage();
        
        header("Pragma: no-cache");
        header("Expires: Wed, 12 Feb 2003 00:00:00 GMT");
        header("Cache-Control: no-cache, no-store, no-transform, must-revalidate");
        $image->send(Image::WEBP, 32);
        exit;
    }
}