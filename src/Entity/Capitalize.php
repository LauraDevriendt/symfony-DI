<?php

namespace App\Entity;

use App\Controller\TransformInterface;
use App\Repository\CapitalizeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CapitalizeRepository::class)
 */
class Capitalize implements TransformInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $string;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getString(): ?string
    {
        return $this->string;
    }

    public function setString(string $string): self
    {
        $this->string = $string;

        return $this;
    }

    public function transform(string $string): string
    {
        return  preg_replace_callback('/(\w)(.?)/', function($string){return strtoupper($string[1]).$string[2];}, $string);
    }


}
