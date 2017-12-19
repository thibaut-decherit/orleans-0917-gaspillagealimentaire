<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnswerQuizz
 *
 * @ORM\Table(name="answer_quizz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnswerQuizzRepository")
 */
class AnswerQuizz
{

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\questionQuizz", inversedBy="quizzAnswers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $quizzQuestion;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="choice", type="text")
     */
    private $choice;

    /**
     * @var bool
     *
     * @ORM\Column(name="isTrue", type="boolean")
     */
    private $isTrue;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set choice
     *
     * @param string $choice
     *
     * @return AnswerQuizz
     */
    public function setChoice($choice)
    {
        $this->choice = $choice;

        return $this;
    }

    /**
     * Get choice
     *
     * @return string
     */
    public function getChoice()
    {
        return $this->choice;
    }

    /**
     * Set isTrue
     *
     * @param boolean $isTrue
     *
     * @return AnswerQuizz
     */
    public function setIsTrue($isTrue)
    {
        $this->isTrue = $isTrue;

        return $this;
    }

    /**
     * Get isTrue
     *
     * @return bool
     */
    public function getIsTrue()
    {
        return $this->isTrue;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quizzQuestion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add quizzQuestion
     *
     * @param \AppBundle\Entity\questionQuizz $quizzQuestion
     *
     * @return AnswerQuizz
     */
    public function addQuizzQuestion(\AppBundle\Entity\questionQuizz $quizzQuestion)
    {
        $this->quizzQuestion[] = $quizzQuestion;

        return $this;
    }

    /**
     * Remove quizzQuestion
     *
     * @param \AppBundle\Entity\questionQuizz $quizzQuestion
     */
    public function removeQuizzQuestion(\AppBundle\Entity\questionQuizz $quizzQuestion)
    {
        $this->quizzQuestion->removeElement($quizzQuestion);
    }

    /**
     * Get quizzQuestion
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuizzQuestion()
    {
        return $this->quizzQuestion;
    }

    /**
     * Set quizzQuestion
     *
     * @param \AppBundle\Entity\questionQuizz $quizzQuestion
     *
     * @return AnswerQuizz
     */
    public function setQuizzQuestion(\AppBundle\Entity\questionQuizz $quizzQuestion = null)
    {
        $this->quizzQuestion = $quizzQuestion;

        return $this;
    }
}
