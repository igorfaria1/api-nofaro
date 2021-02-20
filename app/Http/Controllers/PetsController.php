<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PetService;
use Exception;

class PetsController extends Controller
{
    /**
     * @var PetService
     */
    private $petService;

    public function __construct(PetService $petService)
    {
        $this->petService = $petService;
    }

    /**
     * List Pets.
     *
     * @author Igor Faria <igorfariasilvajf@gmail.com>
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {

        return $this->petService->all($request);
    }

    /**
     * Store  a new Pet.
     *
     * @author Igor Faria <igorfariasilvajf@gmail.com>
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {

            return $this->petService->save($request->all());

        }  catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Destroy a  Pet.
     *
     * @author Igor Faria <igorfariasilvajf@gmail.com>
     * @param BigInteger $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $this->petService->delete($id);

            return response()->json([
                'message' => 'Pet deleted successfully'
            ]);

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 400);

        }
    }
}
