<?php

class Person
{
	public $name;
	public $speciality;
	public $age;

	public function __construct($name, $spec, $age)
	{
		$this->name = $name;
		$this->speciality = $spec;
		$this->age = $age;
	}

	public function greeting()
	{
		echo "Hello! My name is" . $this->name . ". I am " . $this->speciality . " and " . $this->age . " years old.";
	}
}

$person1 = new Person('Sergei', 'Programmer', 38);
$person1->greeting();

echo "<br/>";
echo "<br/>";
echo "<br/>";

$person2 = new Person('Anna', 'web-designer', 36);
$person2->greeting();
