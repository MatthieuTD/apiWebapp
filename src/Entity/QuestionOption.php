<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\QuestionOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=QuestionOptionRepository::class)
 */
class QuestionOption
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Question::class, inversedBy="questionOptions")
     */
    private $question;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=AnswerOption::class, mappedBy="questionOption")
     */
    private $answerOptions;

    public function __construct()
    {
        $this->question = new ArrayCollection();
        $this->answerOptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->question->contains($question)) {
            $this->question[] = $question;
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        $this->question->removeElement($question);

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

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
            $answerOption->addQuestionOption($this);
        }

        return $this;
    }

    public function removeAnswerOption(AnswerOption $answerOption): self
    {
        if ($this->answerOptions->removeElement($answerOption)) {
            $answerOption->removeQuestionOption($this);
        }

        return $this;
    }
}
