<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 10/06/2019
 * Time: 18:19
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * user
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */

    public $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="firstname", type="string", length=100, nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $firstname;

    /**
     * @var integer
     *
     * @ORM\Column(name="lastname", type="string",length=100, nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $lastname;

    /**
     * @var integer
     *
     * @ORM\Column(name="email", type="string",length=255, nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="password", type="string",length=225, nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */

    public $password;
    /**
     * @var integer
     *
     * @ORM\Column(name="isadmin", type="boolean", nullable=true)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $is_admin;

    /**
     * User constructor.
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     * @param $is_admin
     */
    public function __construct($firstname, $lastname, $email, $password, $is_admin)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }
}