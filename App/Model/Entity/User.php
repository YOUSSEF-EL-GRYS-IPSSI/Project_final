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
 * @ORM\Table(name="user")
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
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $firstname;

    /**
     * @var integer
     *
     * @ORM\Column(name="lastname", type="string",length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $lastname;

    /**
     * @var integer
     *
     * @ORM\Column(name="email", type="string",length=255, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="password", type="string",length=225, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */

    public $password;
    /**
     * @var integer
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $birthday;
    /**
     * @var integer
     *
     * @ORM\Column(name="address", type="text", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $address;
    /**
     * @var integer
     *
     * @ORM\Column(name="phonenumber", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $phonenumber;
    /**
     * @var integer
     *
     * @ORM\Column(name="is_admin", type="boolean", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $is_admin;
    /**
     * @var integer
     *
     * @ORM\Column(name="bio", type="text", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $bio;
    /**
     * User constructor.
     * @param $id
     * @param $firstname
     * @param $lastname
     * @param $email
     * @param $password
     * @param $birthday
     * @param $address
     * @param $phonenumber
     * @param $is_admin
     * @param $bio
     */
    public function __construct($id, $firstname, $lastname, $email, $password, $birthday, $address, $phonenumber, $is_admin, $bio)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->phonenumber = $phonenumber;
        $this->is_admin = $is_admin;
        $this->bio = $bio;
    }
}