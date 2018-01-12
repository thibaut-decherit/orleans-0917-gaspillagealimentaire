<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizzTitle
 *
 * @ORM\Table(name="quizz_title")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuizzTitleRepository")
 */
class QuizzTitle
{
    /**
     * @var
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\QuestionQuizz", mappedBy="titleQuizz")
     */
    private $quizzQuestions;

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     *
     * @return QuizzTitle
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quizzQuestions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add quizzQuestion
     *
     * @param \AppBundle\Entity\QuestionQuizz $quizzQuestion
     *
     * @return QuizzTitle
     */
    public function addQuizzQuestion(\AppBundle\Entity\QuestionQuizz $quizzQuestion)
    {
        $this->quizzQuestions[] = $quizzQuestion;

        return $this;
    }

    /**
     * Remove quizzQuestion
     *
     * @param \AppBundle\Entity\QuestionQuizz $quizzQuestion
     */
    public function removeQuizzQuestion(\AppBundle\Entity\QuestionQuizz $quizzQuestion)
    {
        $this->quizzQuestions->removeElement($quizzQuestion);
    }

    /**
     * Get quizzQuestions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuizzQuestions()
    {
        return $this->quizzQuestions;
    }
}
