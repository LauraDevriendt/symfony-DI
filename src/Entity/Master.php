<?php

namespace App\Entity;

use App\Controller\TransformInterface;
use App\Repository\MasterRepository;
use Doctrine\ORM\Mapping as ORM;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * @ORM\Entity(repositoryClass=MasterRepository::class)
 */
class Master
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
    private $userinput;

    /**
     * Master constructor.
     * @param $userinput
     */
    public function __construct($userinput, TransformInterface $transform, Logger $log)
    {

        $transformedInput=$transform->transform($userinput);
        $log->info($transformedInput);
        $this->userinput = $transformedInput;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserinput(): ?string
    {
        return $this->userinput;
    }

    public function setUserinput(string $userinput): self
    {
        $this->userinput = $userinput;

        return $this;
    }
}
