<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 10/06/2019
 * Time: 18:19
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * FactureRepository
 *
 * @ORM\Table(name="facture")
 * @ORM\Entity
 */

class Facture
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;
    /**
     * @var string
     *
     * @ORM\Column(name="ammount", type="double", nullable=false)
     */
    private $ammount;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=100, nullable=false)
     */
    private $file;

    /**
     * FactureRepository constructor.
     * @param $id
     * @param $title
     * @param $date
     * @param $ammount
     * @param $file
     */
    public function __construct($id, $title, $date, $ammount, $file)
    {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->ammount = $ammount;
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getAmmount()
    {
        return $this->ammount;
    }

    /**
     * @param mixed $ammount
     */
    public function setAmmount($ammount)
    {
        $this->ammount = $ammount;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }


}