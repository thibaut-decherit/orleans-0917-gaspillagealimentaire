<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionQuizz
 *
 * @ORM\Table(name="question_quizz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionQuizzRepository")
 */
class QuestionQuizz
{
    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\QuizzTitle", inversedBy="quizzQuestions")
     * @ORM\JoinColumn(nullable=false)
     */
    private  $titleQuizz;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AnswerQuizz", mappedBy="quizzQuestion")
     */
    private $quizzAnswers;

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
     * @ORM\Column(name="title", type="text")
     */
    private $title;


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
     * Set title
     *
     * @param string $title
     *
     * @return QuestionQuizz
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set quizzAnswers
     *
     * @param \AppBundle\Entity\AnswerQuizz $quizzAnswers
     *
     * @return QuestionQuizz
     */
    public function setQuizzAnswers(\AppBundle\Entity\AnswerQuizz $quizzAnswers = null)
    {
        $this->quizzAnswers = $quizzAnswers;

        return $this;
    }

    /**
     * Get quizzAnswers
     *
     * @return \AppBundle\Entity\AnswerQuizz
     */
    public function getQuizzAnswers()
    {
        return $this->quizzAnswers;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quizzAnswers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add quizzAnswer
     *
     * @param \AppBundle\Entity\AnswerQuizz $quizzAnswer
     *
     * @return QuestionQuizz
     */
    public function addQuizzAnswer(\AppBundle\Entity\AnswerQuizz $quizzAnswer)
    {
        $this->quizzAnswers[] = $quizzAnswer;

        return $this;
    }

    /**
     * Remove quizzAnswer
     *
     * @param \AppBundle\Entity\AnswerQuizz $quizzAnswer
     */
    public function removeQuizzAnswer(\AppBundle\Entity\AnswerQuizz $quizzAnswer)
    {
        $this->quizzAnswers->removeElement($quizzAnswer);
    }

    /**
     * Set titleQuizz
     *
     * @param \AppBundle\Entity\QuizzTitle $titleQuizz
     *
     * @return QuestionQuizz
     */
    public function setTitleQuizz(\AppBundle\Entity\QuizzTitle $titleQuizz)
    {
        $this->titleQuizz = $titleQuizz;

        return $this;
    }

    /**
     * Get titleQuizz
     *
     * @return \AppBundle\Entity\QuizzTitle
     */
    public function getTitleQuizz()
    {
        return $this->titleQuizz;
    }
}
