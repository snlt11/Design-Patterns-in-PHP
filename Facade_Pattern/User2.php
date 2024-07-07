<?php

require_once("Shape.php");
require_once("Square.php");
require_once("Circle.php");
require_once("Rectangle.php");
require_once("ShapeFacade.php");

class User2{
    public function __construct(){
        $shapeFacade = new ShapeFacade();
        $shapeFacade->drawCircle();
        echo "<br>";
        $shapeFacade->drawRectangle();
        echo "<br>";
        $shapeFacade->drawSquare();
        echo "<br>";
    }
}
new User2();