<?php

namespace AppBundle\Services;

use AppBundle\Entity\Conversation;
use AppBundle\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;

class MessageManager
{
    public function __construct(
        protected EntityManagerInterface $em,
    )
    {
    }

    public function newInstance(Conversation $conversation): Message
    {
        $message = new Message();
        $message->setConversation($conversation);

        return $message;
    }
}
