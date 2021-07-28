<?php

namespace ZnSymfony\Sandbox;

use ZnCore\Base\Libs\App\Base\BaseBundle;

class Bundle extends BaseBundle
{

    public function deps(): array
    {
        return [
            //new \ZnCore\Base\Bundle(['all']),
            new \ZnLib\Db\Bundle(['container', 'console']),
            new \ZnCore\Base\Libs\I18Next\Bundle(['all']),
            new \ZnBundle\User\NewBundle(['all']),
            new \ZnSandbox\Sandbox\Casbin\Bundle(['all']),
            new \ZnBundle\Log\Bundle(['all']),
            new \ZnBundle\Notify\Bundle(['all']),
        ];
    }

    public function container(): array
    {
        return [
//            __DIR__ . '/../../../zncore/base/src/Libs/App/container.php',
            __DIR__ . '/Domain/config/container.php',
        ];
    }
}
