<?php

namespace AppBundle\Services;

use AppBundle\Entity\Conversation;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\SecurityBundle\Security;

class ConversationManager
{
    public function __construct(
        protected EntityManagerInterface $em,
        protected Security $security,
    )
    {
    }

    public function newInstance(): Conversation
    {
        return new Conversation();
    }

    /**
     * @throws Exception
     */
    public function findOrReject($id): Conversation
    {
        $conversation = $this->em->getRepository(Conversation::class)->findOneBy($id);

        if (!$conversation) {
            throw new Exception('Conversation not found');
        }

        return $conversation;
    }

    public function save(Conversation $conversation): void
    {
        $this->em->persist($conversation);
        $this->em->flush();
    }
}
