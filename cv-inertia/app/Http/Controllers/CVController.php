<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Inertia\Inertia;
use Inertia\Response;

class CVController extends Controller
{
    public function index(): Response
    {
        $person = Person::with(['experiences.skills', 'education'])
            ->first();

        return Inertia::render('CV/Index', [
            'person' => $person,
        ]);
    }
}
