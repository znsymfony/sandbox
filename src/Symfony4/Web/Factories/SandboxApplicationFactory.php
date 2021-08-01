<?php

namespace ZnSymfony\Sandbox\Symfony4\Web\Factories;

use ZnCore\Base\Libs\App\Factories\ApplicationFactory;
use ZnCore\Base\Libs\App\Factories\KernelFactory;
use ZnCore\Base\Libs\App\Interfaces\ConfigManagerInterface;
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
        /** @var ConfigManagerInterface $configManager */
        /*$configManager = $kernel->getContainer()->get(ConfigManagerInterface::class);
        $bundles = $configManager->get('bundles');
        foreach ($bundles as $bundle) {
            if(method_exists($bundle, 'symfonyWeb')) {
                //dd($bundle);
            }
        }*/
        //dd();
        $modules = ModuleHelper::generateModuleConfig();
        //dd($modules);
        $application->addModules($modules);
        return $application;
    }
}
