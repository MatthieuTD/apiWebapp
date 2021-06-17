<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=QuestionRepository::class)
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="questions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=QuestionOption::class, mappedBy="question")
     */
    private $questionOptions;

    /**
     * @ORM\OneToMany(targetEntity=AnswerOption::class, mappedBy="question")
     */
    private $answerOptions;

    public function __construct()
    {
        $this->questionOptions = new ArrayCollection();
        $this->answerOptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|QuestionOption[]
     */
    public function getQuestionOptions(): Collection
    {
        return $this->questionOptions;
    }

    public function addQuestionOption(QuestionOption $questionOption): self
    {
        if (!$this->questionOptions->contains($questionOption)) {
            $this->questionOptions[] = $questionOption;
            $questionOption->setQuestion($this);
        }

        return $this;
    }

    public function removeQuestionOption(QuestionOption $questionOption): self
    {
        if ($this->questionOptions->removeElement($questionOption)) {
            // set the owning side to null (unless already changed)
            if ($questionOption->getQuestion() === $this) {
                $questionOption->setQuestion(null);
            }
        }

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
            $answerOption->setQuestion($this);
        }

        return $this;
    }

    public function removeAnswerOption(AnswerOption $answerOption): self
    {
        if ($this->answerOptions->removeElement($answerOption)) {
            // set the owning side to null (unless already changed)
            if ($answerOption->getQuestion() === $this) {
                $answerOption->setQuestion(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->name;
    }
}
