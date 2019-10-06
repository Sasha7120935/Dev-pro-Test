<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
interface IMotion
{
    public function forward();
    public function backward();
    public function left();
    public function right();
}
interface ISpeed
{
    public function up();
    public function down();

}
interface IDriver
{
    public function isDrivingLicense();
}
interface IAddDriverVehicle
{
    public function getDriver();

    public function setDriver(Human $driver);
}
interface IAddPassengerVehicle
{
    public function addPassenger();
}

class AbstractTransport implements IMotion,ISpeed,IAddDriverVehicle
{
    protected $driver = false;

    public function getDriver()
    {
        return $this->driver;
    }

    public function setDriver(Human $driver)
    {
        if ($this->driver !== false) {
            echo "ADD Driver" . "<br>";
            $this->driver = $driver;
        }

    }

    public function forward()
    {
        return "forward" . "<br>";
    }

    public function backward()
    {
        return "backward" . "<br>";
    }

    public function left()
    {
        return "left" . "<br>";
    }

    public function right()
    {
        return "right" . "<br>";
    }

    public function up()
    {
        return "up" . "<br>";
    }

    public function down()
    {
        return "down" . "<br>";
    }
}
class AbstractWithPassenger extends AbstractTransport
{
    protected $passenger = null;

    public function getPassenger()
    {
        return $this->passenger;
    }

    public function setPassenger(Human $passenger)
    {
        if ($this->passenger !== false) {
            echo "ADD Passenger" . "<br>";
            $this->passenger = $passenger;
        }

    }
}

class Bicycle extends AbstractTransport
{

    public function __construct()
    {
        echo "Bicycle" . "<br>";
    }
}
class Car extends AbstractWithPassenger
{
    public function __construct()
    {
        echo "Car" . "<br>";
    }
}
class Truck extends AbstractWithPassenger
{

    public function __construct()
    {
        echo "Truck" . "<br>";
    }
}
class MotorCycle extends AbstractTransport
{


    public function __construct()
    {
        echo "MotorCycle" . "<br>";
    }
}
class Human implements IMotion
{
    private $name;

    public function __construct()
    {
        echo "Create Human" . "<br>";
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function forward()
    {
        return "forward"."<br>";
    }

    public function backward()
    {
        return "backward"."<br>";
    }

    public function left()
    {
        return "left"."<br>";
    }

    public function right()
    {
        return "right"."<br>";
    }

}
class Driver extends Human implements IDriver
{


    public function __construct()
    {
        echo "Create Driver" . "<br>";
    }

    public function isDrivingLicense()
    {
        return true;
    }
}





$human = new Human();
$human->setName('Avatar');
echo $human->left();
echo $human->right();


$driver = new Driver();
$driver->setName('Master');
echo $driver->forward();
echo $driver->right();


$car = new Car();
$car->setDriver($driver);
$car->setPassenger($human);
echo $car->backward();

$motorCycles = new MotorCycle();
$motorCycles->setDriver($driver);
echo $motorCycles->left();
echo $motorCycles->right();

$truck = new Truck();
$truck->setDriver($driver);
$truck->setPassenger($human);
echo $truck->up();

$bicycle = new Bicycle();
$bicycle->setDriver($driver);
echo $bicycle->up();


