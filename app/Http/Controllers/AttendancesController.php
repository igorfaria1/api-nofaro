<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AttendanceService;
use Exception;

class AttendancesController extends Controller
{
    /**
     * @var attendanceService
     */
    private $attendanceService;


    public function __construct(
        AttendanceService $attendanceService
    ) {
        $this->attendanceService = $attendanceService;
    }

    /**
     * Store a new Attendance
     *
     * @author Igor Faria <igorfariasilvajf@gmail.com>
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {

            return $this->attendanceService->save($request);

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 400);

        }
    }
}
