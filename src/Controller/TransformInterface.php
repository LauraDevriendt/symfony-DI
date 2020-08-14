<?php
namespace App\Controller;

interface TransformInterface{
    public function transform(string $string):string;
}