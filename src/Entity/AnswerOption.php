<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnswerOptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AnswerOptionRepository::class)
 */
class AnswerOption
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Answer::class, inversedBy="answerOptions")
     */
    private $answer;

    /**
     * @ORM\ManyToMany(targetEntity=Question::class, inversedBy="answerOptions")
     */
    private $question;

    /**
     * @ORM\ManyToMany(targetEntity=QuestionOption::class, inversedBy="answerOptions")
     */
    private $questionOption;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    public function __construct()
    {
        $this->answer = new ArrayCollection();
        $this->question = new ArrayCollection();
        $this->questionOption = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Answer[]
     */
    public function getAnswer(): Collection
    {
        return $this->answer;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answer->contains($answer)) {
            $this->answer[] = $answer;
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        $this->answer->removeElement($answer);

        return $this;
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

    /**
     * @return Collection|QuestionOption[]
     */
    public function getQuestionOption(): Collection
    {
        return $this->questionOption;
    }

    public function addQuestionOption(QuestionOption $questionOption): self
    {
        if (!$this->questionOption->contains($questionOption)) {
            $this->questionOption[] = $questionOption;
        }

        return $this;
    }

    public function removeQuestionOption(QuestionOption $questionOption): self
    {
        $this->questionOption->removeElement($questionOption);

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
