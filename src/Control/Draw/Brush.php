<?php

namespace UI\Control\Draw;

use UI\UIBuild;

/**
 * @property int $type
 * @property float $R
 * @property float $G
 * @property float $B
 * @property float $A
 * @property float $X0
 * @property float $Y0
 * @property float $X1
 * @property float $Y1
 * @property float $outerRadius
 * @property float $stopsPos
 * @property float $stopsR
 * @property float $stopsG
 * @property float $stopsB
 * @property float $stopsA
 * @property int $numStops
 *
 */
class Brush
{
    /**
     * @var int $type   specify of value UI\UI::DRAW_BRUSH_TYPE_*
     */
    public int $type;
    public float $R;
    public float $G;
    public float $B;
    public float $A;
    public float $X0;
    public float $Y0;
    public float $X1;
    public float $Y1;
    public float $outerRadius;
    public float $stopsPos;
    public float $stopsR;
    public float $stopsG;
    public float $stopsB;
    public float $stopsA;
    public int $numStops;
    protected static $ui;
    public function __construct(UIBuild $build)
    {
        self::$ui = $build->getUI();
    }

    public function getBrush()
    {
        $stops = self::$ui->new('uiDrawBrushGradientStop');
        $stops->Pos = $this->stopsPos;
        $stops->R = $this->stopsR;
        $stops->G = $this->stopsG;
        $stops->B = $this->stopsB;
        $stops->A = $this->stopsA;
        $brush = self::$ui->new('uiDrawBrush');
        $brush->Type = $this->type;
        $brush->R = $this->R;
        $brush->G = $this->G;
        $brush->B = $this->B;
        $brush->A = $this->A;
        $brush->X0 = $this->X0;
        $brush->Y0 = $this->Y0;
        $brush->X1 = $this->X1;
        $brush->Y1 = $this->Y1;
        $brush->OuterRadius = $this->outerRadius;
        $brush->Stops = self::$ui->addr($stops);
        $brush->NumStops = $this->numStops;
        return $brush;
    }
}
