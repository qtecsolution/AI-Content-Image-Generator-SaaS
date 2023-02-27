<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;

class ExpansesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;

    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Plan Expanses')
            // ->setSubtitle('Wins during season 2021.')
            ->addData('Plan', [6, 9, 3, 4, 10, 8])
            ->addData('Deduction', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
