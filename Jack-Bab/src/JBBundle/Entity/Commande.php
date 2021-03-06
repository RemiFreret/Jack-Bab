<?php

namespace JBBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="JBBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="cardNumber", type="string", length=255)
     *
     * @Assert\CardScheme(
     *     schemes={"MASTERCARD"},
     *     message="Your credit card number is invalid."
     * )
     */
    private $cardNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="crypto", type="integer", length=3)
     *
     * @Assert\Range(
     *      min = 000,
     *      max = 999,
     *      minMessage = "Enter a number between 000 and 999",
     *      maxMessage = "Enter a number between 000 and 999"
     * )
     *
     */
    private $crypto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateExp", type="date")
     *
     * @Assert\GreaterThan(
     *      value = "today",
     *      message = "Your card has expired"
     * )
     *
     * @Assert\GreaterThan(
     *      value = "+7 days",
     *      message = "Your card expire too soon, we may not be able to
     *      validate your payment"
     * )
      *
     */
    private $dateExp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetrait", type="datetime")
     *
     * @Assert\GreaterThan(
     *      value = "-1 minute",
     *      message = "We don't yet have a time travel machine"
     * )
     *
     * @Assert\GreaterThan(
     *      value = "+30 minutes",
     *      message = "Let us 30 minutes at least to prepare your command"
     * )

     */
    private $dateRetrait;

    /**
     * @var array
     *
     * @ORM\Column(name="listProduit", type="array")
     */
    private $listProduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="state", type="integer", length=1)
     *
     * @Assert\Range(
     *      min = 0,
     *      max = 2,
     *      minMessage = "Enter a number between 0 and 2",
     *      maxMessage = "Enter a number between 0 and 2"
     * )
     *
     */
    private $state = 0;
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
     * @return Commande
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

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Commande
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Commande
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set cardNumber
     *
     * @param string $cardNumber
     *
     * @return Commande
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * Get cardNumber
     *
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * Set crypto
     *
     * @param integer $crypto
     *
     * @return Commande
     */
    public function setCrypto($crypto)
    {
        $this->crypto = $crypto;

        return $this;
    }

    /**
     * Get crypto
     *
     * @return integer
     */
    public function getCrypto()
    {
        return $this->crypto;
    }

    /**
     * Set dateExp
     *
     * @param \DateTime $dateExp
     *
     * @return Commande
     */
    public function setDateExp($dateExp)
    {
        $this->dateExp = $dateExp;

        return $this;
    }

    /**
     * Get dateExp
     *
     * @return \DateTime
     */
    public function getDateExp()
    {
        return $this->dateExp;
    }

    /**
     * Set dateRetrait
     *
     * @param \DateTime $dateRetrait
     *
     * @return Commande
     */
    public function setDateRetrait($dateRetrait)
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    /**
     * Get dateRetrait
     *
     * @return \DateTime
     */
    public function getDateRetrait()
    {
        return $this->dateRetrait;
    }

    /**
     * Set listProduit
     *
     * @param array $listProduit
     *
     * @return Commande
     */
    public function setListProduit($listProduit)
    {
        $this->listProduit = $listProduit;

        return $this;
    }

    /**
     * Get listProduit
     *
     * @return array
     */
    public function getListProduit()
    {
        return $this->listProduit;
    }

    /**
     * Set state
     *
     * @param integer $state
     *
     * @return Commande
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }


}

