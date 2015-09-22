<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Traits\AuthoreditorEntity;

/**
 * Project
 *
 * @ORM\Entity(repositoryClass="ProjectRepository")
 */
class Project
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Site", mappedBy="project", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $sites;

    use AuthoreditorEntity;

    public function __construct($id)
    {
        $this->id = $id;
        $this->sites = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param integer $id
     * @return Project
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param Site $sites
     * @return Project
     */
    public function addSite(Site $sites)
    {
        $this->sites[] = $sites;

        return $this;
    }

    /**
     * @param Site $sites
     */
    public function removeSite(Site $sites)
    {
        $this->sites->removeElement($sites);
    }

    /**
     * @return Collection
     */
    public function getSites()
    {
        return $this->sites;
    }
}
