<?php

namespace DznMailLog;

use Shopware\Components\Plugin;
use Doctrine\ORM\Tools\SchemaTool;
use DznMailLog\Models\MailLoggable;
use Shopware\Components\Model\ModelManager;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;


class DznMailLog extends Plugin
{

    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Components_Mail_Send' => 'onMailSend',
            'Enlight_Controller_Action_PreDispatch_Backend' => 'preparePlugin'
        ];
    }

    /**
     * @inheritdoc
     */
    public function install(InstallContext $context)
    {
        $this->updateSchema();
        parent::install($context);
    }


    public function preparePlugin()
    {
        $this->container->get('Template')->addTemplateDir(
            $this->getPath() . '/Resources/Views/'
        );
    }

    /**
     * @inheritdoc
     */
    public function uninstall(UninstallContext $context)
    {
        /** @var ModelManager $entityManager */
        $entityManager = $this->container->get('models');

        $tool = new SchemaTool($entityManager);

        $classMetaData = [
            $entityManager->getClassMetadata(MailLoggable::class)
        ];

        $tool->dropSchema($classMetaData);

        parent::uninstall($context);
    }

    public function updateSchema()
    {
        /** @var ModelManager $entityManager */
        $entityManager = $this->container->get('models');

        $tool = new SchemaTool($entityManager);

        $classMetaData = [
            $entityManager->getClassMetadata(MailLoggable::class)
        ];

        $tool->createSchema($classMetaData);
    }

    public function onMailSend(\Enlight_Event_EventArgs $args)
    {
        /** @var \Enlight_Components_Mail $mail */
        $mail = $args->getMail();

        /** @var ModelManager $entityManager */
        $entityManager = $this->container->get('models');
        /** @var Mail $mailLoggable */
        $mailLoggable = new MailLoggable();

        $mailLoggable->setRecipient($mail->getTo()[0]);
        $mailLoggable->setFromMail($mail->getFrom());
        $mailLoggable->setSubject($mail->getPlainSubject());

        if($mail->getBodyHtml()) {
            $mailLoggable->setContent(str_replace("<div>", "<div style='white-space:initial;'>",$mail->getPlainBody()));
        } else {
            $mailLoggable->setContent($mail->getPlainBodyText());
        }

        $entityManager->persist($mailLoggable);
        $entityManager->flush($mailLoggable);
    }

}