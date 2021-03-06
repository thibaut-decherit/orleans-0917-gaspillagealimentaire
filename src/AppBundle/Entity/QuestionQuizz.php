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
     * @var text
     *
     * @ORM\Column(name="img_quizz", type="text")
     */
    private $imgQuizz;

    /**
     * @var
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Tip", mappedBy="questionQuizz")
     */
    private $quizzTips;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\QuizzTitle", inversedBy="quizzQuestions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $titleQuizz;

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
     * @var int
     *
     * @ORM\Column(name="questionNbr", type="integer")
     */
    private $questionNbr;

    /**
     * @var text
     *
     * @ORM\Column(name="tip", type="text")
     */
    private $tip;


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

    /**
     * Set quizzTips
     *
     * @param \AppBundle\Entity\Tip $quizzTips
     *
     * @return QuestionQuizz
     */
    public function setQuizzTips(\AppBundle\Entity\Tip $quizzTips = null)
    {
        $this->quizzTips = $quizzTips;

        return $this;
    }

    /**
     * Get quizzTips
     *
     * @return \AppBundle\Entity\Tip
     */
    public function getQuizzTips()
    {
        return $this->quizzTips;
    }

    /**
     * Set questionNbr
     *
     * @param integer $questionNbr
     *
     * @return QuestionQuizz
     */
    public function setQuestionNbr($questionNbr)
    {
        $this->questionNbr = $questionNbr;

        return $this;
    }

    /**
     * Get questionNbr
     *
     * @return integer
     */
    public function getQuestionNbr()
    {
        return $this->questionNbr;
    }

    /**
     * @return text
     */
    public function getTip()
    {
        return $this->tip;
    }

    /**
     * @param text $tip
     * @return QuestionQuizz
     */
    public function setTip($tip)
    {
        $this->tip = $tip;
        return $this;
    }



    /**
     * Set imgQuizz
     *
     * @param string $imgQuizz
     *
     * @return QuestionQuizz
     */
    public function setImgQuizz($imgQuizz)
    {
        $this->imgQuizz = $imgQuizz;

        return $this;
    }

    /**
     * Get imgQuizz
     *
     * @return string
     */
    public function getImgQuizz()
    {
        return $this->imgQuizz;
    }
}
