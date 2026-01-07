<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Skill;
use Inertia\Inertia;
use Inertia\Response;

class CVController extends Controller
{
    public function index(): Response
    {
        $person = Person::with(['experiences.skills', 'education'])
            ->first();

        $allSkills = Skill::all();

        if ($person) {
            $person->skills = $allSkills;
        }

        return Inertia::render('CV/Index', [
            'person' => $person,
        ]);
    }
}
