<?php

namespace AppBundle\Form\Factory;

use AppBundle\Entity\Conversation;
use AppBundle\Form\Type\Conversation\ConversationCreateType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class ConversationFormFactory
{
    public function __construct(
        protected FormFactoryInterface $factory
    )
    {
    }

    public function createCreateForm(Conversation $conversation): FormInterface
    {
        return $this->factory->create(ConversationCreateType::class, $conversation, [

        ]);
    }
}
