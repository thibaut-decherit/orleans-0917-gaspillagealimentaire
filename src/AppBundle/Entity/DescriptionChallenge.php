<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescriptionChallenge
 *
 * @ORM\Table(name="description_challenge")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DescriptionChallengeRepository")
 */
class DescriptionChallenge
{
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
     * @ORM\Column(name="title", type="string", length=255)
     *
     * @Assert\Length(
     * min = 3,
     * max = 255,
     * minMessage = "Ce champ doit comporter au moins {{ limit }} caractères.",
     * minMessage = "Ce champ ne doit pas comporter plus de {{ limit }} caractères.",
     * )
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CategoryChallenge")
     */
    private $category;

    /**
     * @var bool
     *
     * @ORM\Column(name="isPicture", type="boolean")
     */
    private $isPicture;

    /**
     * @var bool
     * @ORM\Column(name="isVideo", type="boolean")
     */
    private $isVideo;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AnswerChallenge", mappedBy="description")
     * @ORM\OrderBy({"id" = "DESC"})
     */
    private $answers;


    /**
     * Get id
     *
     * @return integer
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
     * @return DescriptionChallenge
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
     * Set content
     *
     * @param string $content
     *
     * @return DescriptionChallenge
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
     * Set category
     *
     * @param \AppBundle\Entity\CategoryChallenge $category
     *
     * @return DescriptionChallenge
     */
    public function setCategory(\AppBundle\Entity\CategoryChallenge $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\CategoryChallenge
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set isPicture
     *
     * @param boolean $isPicture
     *
     * @return DescriptionChallenge
     */
    public function setIsPicture($isPicture)
    {
        $this->isPicture = $isPicture;

        return $this;
    }

    /**
     * Get isPicture
     *
     * @return boolean
     */
    public function getIsPicture()
    {
        return $this->isPicture;
    }

    /**
     * Set isVideo
     *
     * @param boolean $isVideo
     *
     * @return DescriptionChallenge
     */
    public function setIsVideo($isVideo)
    {
        $this->isVideo = $isVideo;

        return $this;
    }

    /**
     * Get isVideo
     *
     * @return boolean
     */
    public function getIsVideo()
    {
        return $this->isVideo;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answers = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add answer
     *
     * @param \AppBundle\Entity\AnswerChallenge $answer
     *
     * @return DescriptionChallenge
     */
    public function addAnswer(\AppBundle\Entity\AnswerChallenge $answer)
    {
        $this->answers[] = $answer;

        return $this;
    }

    /**
     * Remove answer
     *
     * @param \AppBundle\Entity\AnswerChallenge $answer
     */
    public function removeAnswer(\AppBundle\Entity\AnswerChallenge $answer)
    {
        $this->answers->removeElement($answer);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
