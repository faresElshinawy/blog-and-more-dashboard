<?php

namespace App\Interfaces;


interface StatisticsRepositoryInterface
{

    public function index($time_starts = null,$time_ends = null);
}
