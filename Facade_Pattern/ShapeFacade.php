<?php

class ShapeFacade
{
    private Circle $circle;
    private Square $square;
    private Rectangle $rectangle;

    public function __construct()
    {
        $this->circle = new Circle();
        $this->square = new Square();
        $this->rectangle = new Rectangle();
    }
    public function drawCircle(): void
    {
        $this->circle->draw();
    }
    public function drawSquare(): void
    {
        $this->square->draw();
    }
    public function drawRectangle(): void
    {
        $this->rectangle->draw();
    }
}