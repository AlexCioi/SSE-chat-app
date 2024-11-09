<?php

namespace AppBundle\Entity;

use AppBundle\Repository\ConversationMemberRepository;
use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;

#[ORM\Entity(repositoryClass: ConversationMemberRepository::class)]
#[ORM\Table(name: "app__conversation_member")]
class ConversationMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(name: "conversation_name", length: 255, nullable: false)]
    protected ?string $conversationName = null;

    #[ORM\ManyToOne(targetEntity: Conversation::class, inversedBy: 'members')]
    #[ORM\JoinColumn(nullable: false)]
    protected ?Conversation $conversation = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'conversations')]
    #[ORM\JoinColumn(nullable: false)]
    protected ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $nickname = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConversation(): ?Conversation
    {
        return $this->conversation;
    }

    public function setConversation(?Conversation $conversation): ConversationMember
    {
        $this->conversation = $conversation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): ConversationMember
    {
        $this->user = $user;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): ConversationMember
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getConversationName(): ?string
    {
        return $this->conversationName;
    }

    public function setConversationName(?string $conversationName): ConversationMember
    {
        $this->conversationName = $conversationName;

        return $this;
    }
}
