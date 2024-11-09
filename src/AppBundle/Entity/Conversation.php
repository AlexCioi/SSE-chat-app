<?php

namespace AppBundle\Entity;

use AppBundle\Repository\ConversationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConversationRepository::class)]
#[ORM\Table(name: "app__conversation")]
class Conversation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\OneToMany(targetEntity: Message::class, mappedBy: 'conversation')]
    protected ?Collection $messages;

    #[ORM\OneToMany(targetEntity: ConversationMember::class, mappedBy: 'conversation')]
    protected ?Collection $members;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
        $this->members = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessages(): ?Collection
    {
        return $this->messages;
    }

    public function setMessages(?Collection $messages): Conversation
    {
        $this->messages = $messages;

        return $this;
    }

    public function getMembers(): ?Collection
    {
        return $this->members;
    }

    public function setMembers(?Collection $members): Conversation
    {
        $this->members = $members;

        return $this;
    }
}
