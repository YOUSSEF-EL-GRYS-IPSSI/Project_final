<?php
/**
 * Created by PhpStorm.
 * User: grimm
 * Date: 14/05/2019
 * Time: 18:16
 */

use Doctrine\ORM\Mapping as ORM;

/**
 * Arcticle
 *
 * @ORM\Table(name="articles")
 * @ORM\Entity
 */
class Article
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
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="created_at", type="string", nullable=false)
     */
    public $created_at;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    public $content;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text", nullable=false)
     */
    public $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="is_published", type="integer", nullable=true)
     *
     */
    public $is_published;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     *
     */
    public $image;

    /**
     * Article constructor.
     * @param $title
     * @param $created_at
     * @param $content
     * @param $summary
     * @param $is_published
     */
    public function __construct($title, $created_at, $content, $summary, $is_published, $image)
    {
        $this->title = $title;
        $this->created_at = $created_at;
        $this->content = $content;
        $this->summary = $summary;
        $this->is_published = $is_published;
        $this->image = $image;
    }

}

