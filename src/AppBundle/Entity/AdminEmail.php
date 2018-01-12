<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AdminEmail
 *
 * @ORM\Table(name="admin_email")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdminEmailRepository")
 */
class AdminEmail
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
     * @ORM\Column(name="email", type="string", length=255)
     *
     * @Assert\Length(
     * min = 3,
     * max = 255,
     * minMessage = "Ce champ doit comporter au moins {{ limit }} caractères.",
     * minMessage = "Ce champ ne doit pas comporter plus de {{ limit }} caractères.",
     * )
     *
     * @Assert\NotBlank(
     *    message = "Ce champ ne peut pas être vide.",
     * )
     * @Assert\Email(
     *    message = "L'adresse mail '{{ value }}' n'est pas valide.",
     * )
     */
    private $email;


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
     * Set email
     *
     * @param string $email
     *
     * @return AdminEmail
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}

