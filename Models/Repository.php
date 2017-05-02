<?php

namespace DznMailLog\Models;

use Shopware\Components\Model\ModelRepository;


class Repository extends ModelRepository {

    public function  getMailQuery($mailId) {
        $builder = $this->getMailQueryBuilder($mailId);

        return $builder->getQuery;
    }

    public function getMailQueryBuilder($mailId) {
        $builder = $this->getEntityManager()->createQueryBuilder()
            ->select(['mails'])
            ->from(Mail::class, 'mails')
            ->where('mails.id = :mailId')
            ->setParameter('mailId', $mailId);

        return $builder;
    }

}