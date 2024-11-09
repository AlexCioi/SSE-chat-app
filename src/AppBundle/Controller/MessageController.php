<?php

namespace AppBundle\Controller;

use AppBundle\Form\Factory\MessageFormFactory;
use AppBundle\Services\ConversationManager;
use AppBundle\Services\MessageManager;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends AbstractController
{
    public function __construct(
        protected MessageManager $messageManager,
        protected MessageFormFactory $formFactory,
    )
    {
    }

    public function indexAction(): Response
    {

    }

    /**
     * @throws Exception
     */
    public function newAction($conversationId, Request $request, ConversationManager $conversationManager): Response
    {
        $targetConversation = $conversationManager->findOrReject($conversationId);

        $message = $this->messageManager->newInstance($targetConversation);

        $form = $this->formFactory->createCreateForm($message);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        }
    }

    public function showAction(): Response
    {

    }

    public function editAction(): Response
    {

    }

    public function deleteAction(): Response
    {

    }
}
