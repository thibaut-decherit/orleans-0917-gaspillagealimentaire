<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * InformMenu
 *
 * @ORM\Table(name="inform_menu")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InformMenuRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class InformMenu
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
     * @ORM\Column(name="title", type="string", length=100)
     *
     * @Assert\Length(
     * min = 3,
     * max = 100,
     * minMessage = "Ce champ doit comporter au moins {{ limit }} caractères.",
     * minMessage = "Ce champ ne doit pas comporter plus de {{ limit }} caractères.",
     * )
     * @Assert\NotBlank(
     *    message = "Ce champ ne peut pas être vide.",
     * )
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100)
     *
     * @Assert\Length(
     * min = 3,
     * max = 100,
     * minMessage = "Ce champ doit comporter au moins {{ limit }} caractères.",
     * minMessage = "Ce champ ne doit pas comporter plus de {{ limit }} caractères.",
     * )
     * @Assert\NotBlank(
     *    message = "Ce champ ne peut pas être vide.",
     * )
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text")
     *
     * @Assert\Length(
     * min = 3,
     * minMessage = "Ce champ doit comporter au moins {{ limit }} caractères.",
     * )
     * @Assert\NotBlank(
     *    message = "Ce champ ne peut pas être vide.",
     * )
     */
    private $summary;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="uploaded_at", type="date")
     *
     */
    private $uploadedAt;

    /**
     * @ORM\PrePersist
     */
    public function uploadDate()
    {
        $this->setUploadedAt(new \Datetime());
    }

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     *
     * @Assert\Length(
     * min = 3,
     * max = 255,
     * minMessage = "Ce champ doit comporter au moins {{ limit }} caractères.",
     * minMessage = "Ce champ ne doit pas comporter plus de {{ limit }} caractères.",
     * )
     * @Assert\NotBlank(
     *    message = "Ce champ ne peut pas être vide.",
     * )
     * @Assert\Url(
     *    message = "L'url '{{ value }}' n'est pas valide.",
     * )
     */
    private $link;

    /**
     * @var bool
     * @ORM\Column(name="is_menu", type="boolean")
     */
    private $isMenu = false;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="inform_menu_image", fileNameProperty="imageName")
     * @Assert\Image(
     *     maxSize="2M",
     *     maxSizeMessage="Ce fichier est trop grand, la limite est de 2 Mo.",
     *     uploadIniSizeErrorMessage="Ce fichier est trop grand, la limite est de 2 Mo.",
     *     mimeTypes = {"image/jpeg", "image/gif", "image/png"},
     *     mimeTypesMessage="Le fichier envoyé doit être une image.",
     *     notFoundMessage = "Le fichier n'a pas été trouvé sur le disque.",
     *     uploadErrorMessage = "Erreur durant l'envoi du fichier.",
     * )
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $imageName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return InformMenu
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

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
     * @return InformMenu
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
     * Set type
     *
     * @param string $type
     *
     * @return InformMenu
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return InformMenu
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set uploadedAt
     *
     * @param \DateTime $uploadedAt
     *
     * @return InformMenu
     */
    public function setUploadedAt($uploadedAt)
    {
        $this->uploadedAt = $uploadedAt;

        return $this;
    }

    /**
     * Get uploadedAt
     *
     * @return \DateTime
     */
    public function getUploadedAt()
    {
        return $this->uploadedAt;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return InformMenu
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set isMenu
     *
     * @param boolean $isMenu
     *
     * @return InformMenu
     */
    public function setIsMenu($isMenu)
    {
        $this->isMenu = $isMenu;

        return $this;
    }

    /**
     * Get isMenu
     *
     * @return boolean
     */
    public function getIsMenu()
    {
        return $this->isMenu;
    }

    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return InformMenu
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
     * @return InformMenu
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
}
