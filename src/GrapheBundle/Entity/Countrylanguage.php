<?php

namespace GrapheBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Countrylanguage
 *
 * @ORM\Table(name="countrylanguage", indexes={@ORM\Index(name="CountryCode", columns={"CountryCode"})})
 * @ORM\Entity
 */
class Countrylanguage
{
    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $language = '';

    /**
     * @var string
     *
     * @ORM\Column(name="IsOfficial", type="string", nullable=false)
     */
    private $isofficial = 'F';

    /**
     * @var float
     *
     * @ORM\Column(name="Percentage", type="float", precision=4, scale=1, nullable=false)
     */
    private $percentage = '0.0';

    /**
     * @var \Country
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CountryCode", referencedColumnName="Code")
     * })
     */
    private $countrycode;



    /**
     * Set language
     *
     * @param string $language
     *
     * @return Countrylanguage
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set isofficial
     *
     * @param string $isofficial
     *
     * @return Countrylanguage
     */
    public function setIsofficial($isofficial)
    {
        $this->isofficial = $isofficial;

        return $this;
    }

    /**
     * Get isofficial
     *
     * @return string
     */
    public function getIsofficial()
    {
        return $this->isofficial;
    }

    /**
     * Set percentage
     *
     * @param float $percentage
     *
     * @return Countrylanguage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return float
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set countrycode
     *
     * @param \GrapheBundle\Entity\Country $countrycode
     *
     * @return Countrylanguage
     */
    public function setCountrycode(\GrapheBundle\Entity\Country $countrycode)
    {
        $this->countrycode = $countrycode;

        return $this;
    }

    /**
     * Get countrycode
     *
     * @return \GrapheBundle\Entity\Country
     */
    public function getCountrycode()
    {
        return $this->countrycode;
    }
}
