<?php

namespace ZnSymfony\Sandbox\Symfony4\Web\Factories;

use ZnCore\Base\Libs\App\Factories\ApplicationFactory;
use ZnCore\Base\Libs\App\Factories\KernelFactory;
use ZnLib\Web\Symfony4\MicroApp\MicroApp;
use ZnSandbox\Sandbox\Error\Symfony4\Web\Controllers\ErrorController;
use ZnSymfony\Sandbox\Symfony4\Web\Helpers\ModuleHelper;

class SandboxApplicationFactory
{

    public static function createApplication(array $bundles): MicroApp
    {
        $kernel = KernelFactory::createWebKernel($bundles);
        $application = ApplicationFactory::createWeb($kernel);
        $application->setLayout(__DIR__ . '/../views/layouts/main.php');
        $application->setErrorController(ErrorController::class);
        $modules = ModuleHelper::generateModuleConfig();
        $application->addModules($modules);
        return $application;
    }
}
