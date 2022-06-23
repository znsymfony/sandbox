<?php

/**
 * @var View $view
 * @var $formView FormView|AbstractType[]
 */

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormView;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use ZnCore\Base\Container\Helpers\ContainerHelper;
use ZnLib\Web\Symfony4\MicroApp\Libs\FormRender;
use ZnLib\Web\View\View;

/** @var CsrfTokenManagerInterface $tokenManager */
$tokenManager = ContainerHelper::getContainer()->get(CsrfTokenManagerInterface::class);
$formRender = new FormRender($formView, $tokenManager);

$formView = $formRender->getFormView();
$formHtml = '';
foreach ($formView->children as $name => $type) {
    if ($name != 'save') {
        $formHtml .= $formRender->row($name);
    }
}

?>

<?= $formRender->errors() ?>

<?= $formRender->beginFrom() ?>

<?= $formHtml ?>

<div class="form-group">
    <?= $formRender->input('save', 'submit') ?>
</div>

<?= $formRender->endFrom() ?>
