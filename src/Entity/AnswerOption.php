<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AnswerOptionRepository;
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
     * @ORM\Column(type="text")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Answer::class, inversedBy="answerOptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $answer;

    /**
     * @ORM\ManyToOne(targetEntity=Question::class, inversedBy="answerOptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity=QuestionOption::class, inversedBy="answerOptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $questionOption;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAnswer(): ?Answer
    {
        return $this->answer;
    }

    public function setAnswer(?Answer $answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getQuestionOption(): ?QuestionOption
    {
        return $this->questionOption;
    }

    public function setQuestionOption(?QuestionOption $questionOption): self
    {
        $this->questionOption = $questionOption;

        return $this;
    }
}
