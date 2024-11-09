<?php

namespace AppBundle\Form\Factory;

use AppBundle\Entity\Message;
use AppBundle\Form\Type\Message\MessageCreateType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class MessageFormFactory
{
    public function __construct(
        protected FormFactoryInterface $factory
    )
    {
    }

    public function createCreateForm(Message $message): FormInterface
    {
        return $this->factory->create(MessageCreateType::class, $message, [

        ]);
    }
}
