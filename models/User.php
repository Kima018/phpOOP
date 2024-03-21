<?php

namespace models;

class User
{
    public string $ime;
    public string $prezime;
    public string $email;
    private string $password;


    public function setIme($ime)
    {

    }

    public function setPrezime($prezime)
    {

    }

    public function getIme()
    {
        return $this->ime . " " . $this->prezime;
    }
}

//$maki = new User();
//$maki->ime = "Maki";
//$maki->prezime = "Jakovljevic";
//$maki->knjigeProcitane = ["Pragmaticni programer"];
////var_dump($maki);
//
//
//$marko = new User();
//$marko->setIme("Marko");
//$marko->setPrezime("Markovic");
//
//echo $marko->getIme();

//\\

class Animal
{
    const ANIMAL_TYPES = ["dog", "cat"];
    public $type;
    public $weight;

    public function setType($type)
    {
        if (!in_array($type, ["dog", "cat"])) {
            throw new \Error("type must be dog or cat");
        }

        $this->type = $type;
    }

    public function setWeight($weight)
    {
        if ($weight <= 0.2) {
            throw new \Error("type must be dog or cat");

        }
        $this->weight = $weight;
    }

    public function getAnimal()
    {
        return "Animal is " . $this->type . " and that weight is " . $this->weight . " kg";
    }


}
//
//$dog = new Animal();
//$dog->setType("dog");
//$dog->setWeight(2);
//echo $dog->getAnimal();
//
//var_dump( Animal::ANIMAL_TYPES);
//
//
