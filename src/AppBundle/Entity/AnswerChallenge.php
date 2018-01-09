<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * AnswerChallenge
 *
 * @ORM\Table(name="answer_challenge")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AnswerChallengeRepository")
 *
 * @Vich\Uploadable
 */
class AnswerChallenge
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
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\Length(
     * min = 3,
     * minMessage = "Ce champ doit comporter au moins {{ limit }} caractères.",
     * )
     * @Assert\NotBlank(
     *    message = "Ce champ ne peut pas être vide.",
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     *
     * @Assert\Length(
     * min = 3,
     * minMessage = "Ce champ doit comporter au moins {{ limit }} caractères.",
     * )
     * @Assert\NotBlank(
     *    message = "Ce champ ne peut pas être vide.",
     * )
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     *
     * @Assert\Length(
     * min = 10,
     * minMessage = "Ce champ doit comporter au moins {{ limit }} caractères.",
     * )
     * @Assert\NotBlank(
     *    message = "Ce champ ne peut pas être vide.",
     * )
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DescriptionChallenge", inversedBy="answers")
     */
    private $description;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="answer_challenge_image", fileNameProperty="imageName")
     * @Assert\Image(
     *     maxSize="2M",
     *     maxSizeMessage="Ce fichier est trop grand, la limite est de 2 Mo.",
     *     uploadIniSizeErrorMessage="Ce fichier est trop grand, la limite est de 2 Mo.",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png"},
     *     mimeTypesMessage="Le fichier envoyé doit être une image.",
     *     notFoundMessage = "Le fichier n'a pas été trouvé sur le disque.",
     *     uploadErrorMessage = "Erreur durant l'envoi du fichier.",
     * )
     * @Assert\Expression("this.getImageFile() or this.getImageName()", message="Vous devez envoyer une image.")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName = 'logo.png';

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    public function __construct()
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return AnswerChallenge
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        return $this;
    }

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
     * @return AnswerChallenge
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
     * Set title
     *
     * @param string $title
     *
     * @return AnswerChallenge
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
     * Set message
     *
     * @param string $message
     *
     * @return AnswerChallenge
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return AnswerChallenge
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return AnswerChallenge
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set description
     *
     * @param \AppBundle\Entity\DescriptionChallenge $description
     *
     * @return AnswerChallenge
     */
    public function setDescription(\AppBundle\Entity\DescriptionChallenge $description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return \AppBundle\Entity\DescriptionChallenge
     */
    public function getDescription()
    {
        return $this->description;
    }
}
