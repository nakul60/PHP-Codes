<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shape Area Calculator</title>
</head>
<body>
    <h2>Shape Area Calculator</h2>
    <form method = "post">

    <input type="radio" name="shape" id="triangle" value = "triangle">Triangle<br>
    <input type="radio" name="shape" id="square" value = "square">Square<br>
    <input type="radio" name="shape" id="circle" value = "circle">Circle<br>

    <div id="input">
        <!-- here we will display the input fields using javascript! -->
    </div>

    <!-- type of submit button -->
    <input type="submit" name = "submit" value = "Calculate Area">

    </form>

    <script>
        const inputfield = document.getElementById("input");
        const shapevalues = {
            triangle : `Base: <input type = "number" name = "base" required><br>
            Height: <input type = "number" name = "height" required><br>`,
            square : `Side: <input type = "number" name = "side" required><br>`,
            circle : `Radius: <input type = "number" name = "radius" required><br>`
        }
        document.querySelectorAll("input[name = 'shape']").forEach(ele => {
            ele.addEventListener('change', ()=>{
                inputfield.innerHTML = shapevalues[ele.value] || '';
            });
        });
    </script>

<?php

class shape
{
    public function cal_area(): float
    {
        return 0;
    }
}

class Triangle extends Shape
{
    private $base;
    private $height;

    public function __construct($base, $height)
    {
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

    public function __construct($side)
    {
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

    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function cal_area() : float
    {
        return 3.14 * $this->radius * $this->radius;
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $shape = $_POST['shape'];
    if($shape == "triangle" && isset($_POST['base']) && isset($_POST['height']))
    {
        $base = $_POST['base'];
        $height = $_POST['height'];
        $shape = new Triangle($base,$height);
        $area = $shape->cal_area();
        echo "<h2>The Area of Triangle is: $area</h2>";
    }
    elseif($shape == "square" && isset($_POST['side']))
    {
        $side = $_POST['side'];
        $shape = new Square($side);
        $area = $shape->cal_area();
        echo "<h2>The Area of Square is: $area</h2>";
    }
    elseif($shape == "circle" && isset($_POST['radius']))
    {
        $radius = $_POST['radius'];
        $shape = new Circle($radius);
        $area = $shape->cal_area();
        echo "<h2>The Area of Circle is: $area</h2>";
    }
}

?>



</body>
</html>
