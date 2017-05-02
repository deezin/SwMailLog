<?php
/**
 * Shopware 5
 * Copyright (c) shopware AG
 *
 * According to our dual licensing model, this program can be used either
 * under the terms of the GNU Affero General Public License, version 3,
 * or under a proprietary license.
 *
 * The texts of the GNU Affero General Public License with an additional
 * permission and of our proprietary license can be found at and
 * in the LICENSE file you have received along with this program.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * "Shopware" is a registered trademark of shopware AG.
 * The licensing of the program under the AGPLv3 does not imply a
 * trademark license. Therefore any rights, title and interest in
 * our trademarks remain entirely with us.
 */

namespace DznMailLog\Models;

use Doctrine\ORM\Mapping as ORM;
use Shopware\Components\Model\ModelEntity;

/**
 * @ORM\Entity(repositoryClass="Repository")
 * @ORM\Table(name="s_dzn_maillog")
 * @ORM\HasLifecycleCallbacks
 */
class MailLoggable extends ModelEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="frommail", type="string", length=255, nullable=false)
     */
    private $fromMail = '';


    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=false)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content = '';

    /**
     * @var string
     *
     * @ORM\Column(name="recipient", type="string", nullable=false)
     */
    private $recipient = '';

    /**
     * @var time
     *
     * @ORM\Column(name="time", type="datetime", nullable=false)
     */
    private $time = '';

    /**
     * Constructor of Mail
     */
    public function __construct()
    {
        $this->time = new \DateTime();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fromMail
     *
     *
     * @param string $fromMail
     *
     * @return \Shopware\Models\Mail\Mail
     */
    public function setFromMail($fromMail)
    {
        $this->fromMail = $fromMail;

        return $this;
    }

    /**
     * Get fromMail
     *
     * @return string
     */
    public function getFromMail()
    {
        return $this->getTranslated('fromMail');
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return \Shopware\Models\Mail\Mail
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->getTranslated('subject');
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return \Shopware\Models\Mail\Mail
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getTranslated('content');
    }
    /**
     * @param array $context
     *
     * @return \Shopware\Models\Mail\Mail
     */
    public function setContext($context)
    {
        $this->context = $context;

        return $this;
    }

    /**
     * @return array
     */
    public function getContext()
    {
        if (null === $this->context) {
            return [];
        }

        return $this->context;
    }

    public function getTime() {
        return $this->time;
    }

    public function setTime($time) {
        $this->time = $time;
    }

    public function getRecipient() {
        return $this->recipient;
    }

    public function setRecipient($recipient) {
        $this->recipient = $recipient;
    }

    public function getTranslated($fieldName)
    {
        if (isset($this->translation[$fieldName]) && !empty($this->translation[$fieldName])) {
            return $this->translation[$fieldName];
        }

        return $this->$fieldName;
    }
}
