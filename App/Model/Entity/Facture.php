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
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100, nullable=false)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    public $date;
    /**
     * @var string
     *
     * @ORM\Column(name="ammount", type="double", nullable=false)
     */
    public $ammount;

    /**
     * @var string
     *
     * @ORM\Column(name="file", type="string", length=100, nullable=false)
     */
    public $file;

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
}