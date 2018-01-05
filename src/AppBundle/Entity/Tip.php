<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tip
 *
 * @ORM\Table(name="tip")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TipRepository")
 */
class Tip
{
    /**
     * @var
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\QuestionQuizz", inversedBy="quizzTips")
     */
    private $questionQuizz;

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
     * @ORM\Column(name="content", type="text")
     */
    private $content;


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
     * Set content
     *
     * @param string $content
     *
     * @return Tip
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set questionQuizz
     *
     * @param \AppBundle\Entity\QuestionQuizz $questionQuizz
     *
     * @return Tip
     */
    public function setQuestionQuizz(\AppBundle\Entity\QuestionQuizz $questionQuizz = null)
    {
        $this->questionQuizz = $questionQuizz;

        return $this;
    }

    /**
     * Get questionQuizz
     *
     * @return \AppBundle\Entity\QuestionQuizz
     */
    public function getQuestionQuizz()
    {
        return $this->questionQuizz;
    }
}
