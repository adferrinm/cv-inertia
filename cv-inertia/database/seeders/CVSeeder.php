<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CVSeeder extends Seeder
{
    public function run(): void
    {
        $hasPeopleTable = Schema::hasTable('people');
        $hasPersonId = Schema::hasColumn('skills', 'person_id');

        $person = null;

        if ($hasPeopleTable) {
            $person = Person::firstOrCreate(
                ['email' => 'adferrinm@gmail.com'],
                [
                    'name' => 'Adrian Ferrin Moreno',
                    'headline' => 'Senior Backend Developer',
                    'summary' => 'Full-Stack con foco actual en Backend (Django); BI (PowerBI), interés en IA aplicada a desarrollo. Orientado a excelencia y mejora continua.',
                    'phone' => '+34 600 36 21 19',
                    'location' => 'Madrid, Spain',
                    'github_url' => 'https://github.com/adferrinm',
                    'linkedin_url' => 'https://www.linkedin.com/in/adrian-ferrin-moreno-695014243',
                    'pdf_url' => 'https://mnf.red/848ee128-88be-4ead-aae1-1cb1d15f6c2a',
                ]
            );
        }

        $skillsData = [
            ['name' => 'Python', 'category' => 'Languages', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'python'],
            ['name' => 'Django', 'category' => 'Backend', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'django'],
            ['name' => 'PostgreSQL', 'category' => 'Databases', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'postgresql'],
            ['name' => 'Docker', 'category' => 'DevOps', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'docker'],
            ['name' => 'Git', 'category' => 'Tools', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'git'],
            ['name' => 'REST API', 'category' => 'Backend', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'fastapi'],
            ['name' => 'MySQL', 'category' => 'Databases', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'mysql'],
            ['name' => 'Celery', 'category' => 'Backend', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'celery'],
            ['name' => 'Redis', 'category' => 'Databases', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'redis'],
            ['name' => 'Elasticsearch', 'category' => 'Databases', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'elasticsearch'],
            ['name' => 'RabbitMQ', 'category' => 'Backend', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'rabbitmq'],
            ['name' => 'Linux', 'category' => 'Tools', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'linux'],

            ['name' => 'Vue.js', 'category' => 'Frontend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'vuedotjs'],
            ['name' => 'React', 'category' => 'Frontend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'react'],
            ['name' => 'TypeScript', 'category' => 'Languages', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'typescript'],
            ['name' => 'Kubernetes', 'category' => 'DevOps', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'kubernetes'],
            ['name' => 'AWS', 'category' => 'Cloud', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'icloud'],
            ['name' => 'Go', 'category' => 'Languages', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'go'],
            ['name' => 'GraphQL', 'category' => 'Backend', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'graphql'],
            ['name' => 'MongoDB', 'category' => 'Databases', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'mongodb'],
            ['name' => 'Next.js', 'category' => 'Frontend', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'nextdotjs'],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'tailwindcss'],
            ['name' => 'Laravel', 'category' => 'Backend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'laravel'],
            ['name' => 'Inertia.js', 'category' => 'Frontend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'inertia'],

            ['name' => 'Java', 'category' => 'Languages', 'level' => 1, 'mastery_level' => 'avoid', 'logo_slug' => 'openjdk'],
            ['name' => 'C++', 'category' => 'Languages', 'level' => 1, 'mastery_level' => 'avoid', 'logo_slug' => 'cplusplus'],
        ];

        foreach ($skillsData as $skillData) {
            Skill::updateOrCreate(
                ['name' => $skillData['name']],
                $skillData
            );
        }

        if ($hasPeopleTable && $person) {
            $experiencesData = [
                [
                    'company' => 'WOCU-Monitoring',
                    'position' => 'Senior Backend Developer',
                    'start_date' => '2024-06-01',
                    'end_date' => null,
                    'description' => 'Desarrollo backend con Django, gestión de eventos con Celery, optimización de búsquedas con Elasticsearch, arquitectura con RabbitMQ y Redis.',
                    'skills' => ['Django', 'Celery', 'Elasticsearch', 'PostgreSQL', 'Redis', 'Docker', 'RabbitMQ'],
                ],
                [
                    'company' => 'Divine Solutions LLC',
                    'position' => 'Full-Stack Developer',
                    'start_date' => '2022-01-01',
                    'end_date' => '2024-06-01',
                    'description' => 'Desarrollo full-stack con enfoque en backend. Integración de servicios, APIs REST y gestión de bases de datos.',
                    'skills' => ['Django', 'PostgreSQL', 'React', 'Docker'],
                ],
                [
                    'company' => 'CALISOFT',
                    'position' => 'Full-Stack Developer',
                    'start_date' => '2020-10-01',
                    'end_date' => '2022-01-01',
                    'description' => 'Desarrollo con Java Spring, React frontend, gestión de bases de datos MySQL/MongoDB, interfaces con Primefaces.',
                    'skills' => ['React', 'MySQL', 'MongoDB'],
                ],
            ];

            foreach ($experiencesData as $expData) {
                $skillNames = $expData['skills'];
                unset($expData['skills']);
                $expData['person_id'] = $person->id;

                $experience = Experience::updateOrCreate(
                    ['company' => $expData['company'], 'position' => $expData['position'], 'person_id' => $person->id],
                    $expData
                );

                $skillQuery = Skill::whereIn('name', $skillNames);
                if ($hasPersonId) {
                    $skillQuery->where('person_id', $person->id);
                }
                $skills = $skillQuery->get();

                $experience->skills()->sync($skills->pluck('id'));
            }

            Education::firstOrCreate(
                ['institution' => 'CUJAE', 'person_id' => $person->id],
                [
                    'person_id' => $person->id,
                    'degree' => 'Licenciado en Ingeniería Informática',
                    'field' => 'Computer Science',
                    'start_year' => 2015,
                    'end_year' => 2020,
                    'description' => 'Formación completa en ingeniería de software, sistemas y bases de datos.',
                ]
            );
        }
    }
}
