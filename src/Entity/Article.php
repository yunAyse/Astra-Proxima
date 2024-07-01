<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?User $authorId = null;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'articles')]
    private Collection $tagId;

    /**
     * @var Collection<int, Files>
     */
    #[ORM\ManyToMany(targetEntity: Files::class, inversedBy: 'articles')]
    private Collection $fileId;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    public function __construct()
    {
        $this->tagId = new ArrayCollection();
        $this->fileId = new ArrayCollection();
        $this->publishedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeImmutable $publishedAt): static
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

   
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getAuthorId(): ?User
    {
        return $this->authorId;
    }

    public function setAuthorId(?User $authorId): static
    {
        $this->authorId = $authorId;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTagId(): Collection
    {
        return $this->tagId;
    }

    public function addTagId(Tag $tagId): static
    {
        if (!$this->tagId->contains($tagId)) {
            $this->tagId->add($tagId);
        }

        return $this;
    }

    public function removeTagId(Tag $tagId): static
    {
        $this->tagId->removeElement($tagId);

        return $this;
    }

    /**
     * @return Collection<int, Files>
     */
    public function getFileId(): Collection
    {
        return $this->fileId;
    }

    public function addFileId(Files $fileId): static
    {
        if (!$this->fileId->contains($fileId)) {
            $this->fileId->add($fileId);
        }

        return $this;
    }

    public function removeFileId(Files $fileId): static
    {
        $this->fileId->removeElement($fileId);

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

  
}
