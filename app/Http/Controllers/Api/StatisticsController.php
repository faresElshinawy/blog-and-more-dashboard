<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\StatisticsRepositoryInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{

    use ApiResponse;

    private StatisticsRepositoryInterface $statisticsRepository;

    public function __construct(StatisticsRepositoryInterface $statisticsRepository)
    {
        $this->statisticsRepository = $statisticsRepository;
    }

    public function index($time_starts = null,$time_ends = null)
    {
        return $this->apiResponse('success',$this->statisticsRepository->index($time_starts,$time_ends));
    }
}
