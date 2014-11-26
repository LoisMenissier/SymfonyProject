<?php
/**
 * Created by PhpStorm.
 * User: lmeni
 * Date: 26/11/2014
 * Time: 13:56
 */

namespace Cergy\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Behavior;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Cergy\NewsBundle\Entity\News", mappedBy="author")
     */
    protected $news;
}