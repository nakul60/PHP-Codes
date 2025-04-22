<?php

class Shape
{
    public function cal_area() : float
    {
        return 0;
    }
}

class Triangle extends Shape
{
    private $base;
    private $height;

    public function __construct($base,$height) {
        $this->base = $base;
        $this->height = $height;
    }

    public function cal_area() : float
    {
        return 0.5 * $this->base * $this->height;
    }
}

class Square extends Shape
{
    private $side;

    public function __construct($side) {
        $this->side = $side;
    }

    public function cal_area() : float
    {
        return $this->side * $this->side;
    }
}

class Circle extends Shape
{
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function cal_area() : float
    {
        return 3.14 * $this->radius * $this->radius;
    }
}

//now we are handling the form request:
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $shapetype = $_POST['shape'];//jiskan name = shape
    if($shapetype == "triangle" && isset($_POST['base']) && isset($_POST['height']))
    {
        $base = $_POST['base'];
        $height = $_POST['height'];

        $shape = new Triangle($base,$height);
        $area = $shape->cal_area();
        echo "<h2>The Area of Triangle is: $area</h2>";
    }
    elseif($shapetype == "square" && isset($_POST['side']))
    {
        $side = $_POST['side'];

        $shape = new Square($side);
        $area = $shape->cal_area();
        echo "<h2>The Area of Square is: $area</h2>";
    }
    elseif($shapetype == "circle" && isset($_POST['radius']))
    {
        $radius = $_POST['radius'];

        $shape = new Circle($radius);
        $area = $shape->cal_area();
        echo "<h2>The Area of Circle is: $area</h2>";
    }
}

?>
