<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Animal;
use App\Services\IAnimalService;
use App\Helper\Common;

class AnimalController extends Controller
{
    private $animalService;
    public function __construct( IAnimalService $animalService )
    {
        $this->animalService = $animalService;
    }
    public function index( )
    {
        $animals = $this->animalService->getAnimals();
        return view( 'animals.index', compact( 'animals' ) );
    }
    public function feed( )
    {
        $this->animalService->increase();
        return redirect()->route( 'animals.index' )->with( 'message', 'Animals health is increased'  );
    }
    public function reduceHealth( )
    {
        Common::increaseZooTime();
        $this->animalService->decrease();
        return redirect()->route( 'animals.index' )->with( 'message',  'Animals health is reduced'  );
    }
}