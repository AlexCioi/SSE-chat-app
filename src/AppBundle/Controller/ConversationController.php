<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Conversation;
use AppBundle\Form\Factory\ConversationFormFactory;
use AppBundle\Services\ConversationManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ConversationController extends AbstractController
{
    public function __construct(
        protected EntityManagerInterface $em,
        protected ConversationManager $conversationManager,
        protected ConversationFormFactory $formFactory,
    )
    {
    }

    public function indexAction(): Response
    {

    }

    public function newAction(Request $request): Response
    {
        $conversation = $this->conversationManager->newInstance();

        $form = $this->formFactory->createCreateForm($conversation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->conversationManager->save($conversation);
        }

        return $this->render('@App/Conversation/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function showAction($id): Response
    {
        return $this->render('@App/Conversation/show.html.twig', [
            'id' => $id
        ]);
    }

    public function editAction(): Response
    {

    }

    public function deleteAction(): Response
    {

    }
}
