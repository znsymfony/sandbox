<?php

use App\I18Next\Domain\Services\TranslateService;
use Psr\Container\ContainerInterface;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormRegistry;
use Symfony\Component\Form\FormRegistryInterface;
use Symfony\Component\Form\ResolvedFormTypeFactory;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Twig\RuntimeLoader\FactoryRuntimeLoader;
use Twig\RuntimeLoader\RuntimeLoaderInterface;

return [
    'definitions' => [
        'ZnBundle\Notify\Domain\Interfaces\Repositories\ToastrRepositoryInterface' => 'ZnBundle\Notify\Domain\Repositories\Symfony\ToastrRepository',
    ],
    'singletons' => [
        RuntimeLoaderInterface::class => FactoryRuntimeLoader::class,
        CsrfTokenManagerInterface::class => CsrfTokenManager::class,
        FormFactoryInterface::class => FormFactory::class,
        FormRegistryInterface::class => function(ContainerInterface $container) {
            $registry = new FormRegistry(
                [$container->get(HttpFoundationExtension::class)],
                $container->get(ResolvedFormTypeFactory::class)
            );
            return $registry;
        },
        SessionInterface::class => Session::class,
        TranslateService::class => function () {
            $translateService = new TranslateService();
            $translateService->setLanguageList([
                'ru',
                'kz',
            ]);
            $translateService->setMainLanguage('ru');
            return $translateService;
        }
    ],
];
