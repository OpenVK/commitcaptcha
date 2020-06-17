<?php declare(strict_types=1);
use captcha\CaptchaManager;

function captcha_template(): string
{
    $html = <<<'HTML'
    <div class="captcha">
        <img src="/captcha/captcha.webp" alt="Captcha" style="margin-bottom: 8px; width: 130px;" />
        <br/>
        <input type="text" name="captcha" placeholder="Enter 8 characters" />
    </div>
HTML;
    
    return CAPTCHA_ROOT_CONF["captcha"]["enable"] ? $html : "You have already verified that you are not a robot.";
}

function check_captcha(?string $input): bool
{
    return CaptchaManager::i()->verifyCaptcha((string) $input);
}

return (function() {});