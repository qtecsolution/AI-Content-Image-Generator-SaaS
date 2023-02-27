<?php

namespace App\Charts;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Auth;

class CategoryPostsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $auth = Auth::user();
        $categories = BlogCategory::Published()->get();
        $cats = array();
        $posts = array();
        if($auth->type == 'admin'){
           
            foreach ($categories as $cat) {
                array_push($cats, $cat->name);
                $id = '%' . '"' . $cat->id . '"' . '%';
                $p = BlogPost::Published()
                    ->where('category_id', 'like', $id)->count();
                array_push($posts, $p);
            }
        }else{
           
            foreach ($categories as $cat) {
                array_push($cats, $cat->name);
                $id = '%' . '"' . $cat->id . '"' . '%';
                $p = BlogPost::Published()
                    ->where('category_id', 'like', $id)->where('author_id',$auth->id)->count();
                array_push($posts, $p);
            }
        }
       

        return $this->chart->lineChart()
            ->setTitle('Category Ways Posts')
            ->addData('Posts ', $posts)
            ->setXAxis($cats);
    }
}
