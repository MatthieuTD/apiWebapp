<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\OneToMany(targetEntity=AnswerOption::class, mappedBy="answer")
     */
    private $answerOptions;

    public function __construct()
    {
        $this->answerOptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * @return Collection|AnswerOption[]
     */
    public function getAnswerOptions(): Collection
    {
        return $this->answerOptions;
    }

    public function addAnswerOption(AnswerOption $answerOption): self
    {
        if (!$this->answerOptions->contains($answerOption)) {
            $this->answerOptions[] = $answerOption;
            $answerOption->setAnswer($this);
        }

        return $this;
    }

    public function removeAnswerOption(AnswerOption $answerOption): self
    {
        if ($this->answerOptions->removeElement($answerOption)) {
            // set the owning side to null (unless already changed)
            if ($answerOption->getAnswer() === $this) {
                $answerOption->setAnswer(null);
            }
        }

        return $this;
    }
}
