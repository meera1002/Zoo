<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Services\IAnimalService;

class AnimalController extends Controller
{
    private $animalService;
    public function __construct(IAnimalService $animalService)
    {
        $this->animalService = $animalService;
    }
    public function index()
    {
        $animals = $this->animalService->getAnimals();

        return view('animals.index', compact('animals'));
    }
    public function feed()
    {
        $this->animalService->increase();

        return redirect()->route('animals.index')->with('message', trans('animals.health.increased.message'));
    }
    public function reduceHealth()
    {
        $this->animalService->decrease();

        return redirect()->route('animals.index')->with('message', trans('animals.health.increased.message'));
    }
}
