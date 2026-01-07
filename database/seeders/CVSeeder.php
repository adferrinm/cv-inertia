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
                    'headline' => [
                        'en' => 'Senior Backend Developer',
                        'es' => 'Desarrollador Backend Senior'
                    ],
                    'summary' => [
                        'en' => 'Full-Stack developer with current focus on Backend (Django); BI (PowerBI), interest in AI applied to development. Excellence and continuous improvement oriented.',
                        'es' => 'Full-Stack con foco actual en Backend (Django); BI (PowerBI), interés en IA aplicada a desarrollo. Orientado a excelencia y mejora continua.'
                    ],
                    'phone' => '+34 600 36 21 19',
                    'location' => 'Madrid, Spain',
                    'github_url' => 'https://github.com/adferrinm',
                    'linkedin_url' => 'https://www.linkedin.com/in/adrian-ferrin-moreno-695014243',
                    'pdf_url' => 'https://mnf.red/848ee128-88be-4ead-aae1-1cb1d15f6c2a',
                ]
            );
        }

        $skillsData = [
            // Languages
            ['name' => 'Python', 'category' => 'Languages', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'python'],
            ['name' => 'JavaScript', 'category' => 'Languages', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'javascript'],
            ['name' => 'PHP', 'category' => 'Languages', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'php'],
            ['name' => 'TypeScript', 'category' => 'Languages', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'typescript'],
            ['name' => 'Java', 'category' => 'Languages', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'openjdk'],
            ['name' => 'C++', 'category' => 'Languages', 'level' => 1, 'mastery_level' => 'avoid', 'logo_slug' => 'cplusplus'],
            ['name' => 'C#', 'category' => 'Languages', 'level' => 1, 'mastery_level' => 'avoid', 'logo_slug' => 'sharp'],

            // Backend
            ['name' => 'Django', 'category' => 'Backend', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'django'],
            ['name' => 'Celery', 'category' => 'Backend', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'celery'],
            ['name' => 'RabbitMQ', 'category' => 'Backend', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'rabbitmq'],
            ['name' => 'Laravel', 'category' => 'Backend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'laravel'],
            ['name' => 'NestJS', 'category' => 'Backend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'nestjs'],
            ['name' => 'FastAPI', 'category' => 'Backend', 'level' => 3, 'mastery_level' => 'expert', 'logo_slug' => 'fastapi'],
            ['name' => 'Node.js', 'category' => 'Backend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'nodedotjs'],
            ['name' => 'GraphQL', 'category' => 'Backend', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'graphql'],
            ['name' => 'Spring Boot', 'category' => 'Backend', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'springboot'],

            // Databases
            ['name' => 'PostgreSQL', 'category' => 'Databases', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'postgresql'],
            ['name' => 'MySQL', 'category' => 'Databases', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'mysql'],
            ['name' => 'Redis', 'category' => 'Databases', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'redis'],
            ['name' => 'Elasticsearch', 'category' => 'Databases', 'level' => 4, 'mastery_level' => 'working', 'logo_slug' => 'elasticsearch'],
            ['name' => 'MongoDB', 'category' => 'Databases', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'mongodb'],
            ['name' => 'Prisma', 'category' => 'Databases', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'prisma'],

            // Frontend
            ['name' => 'Vue.js', 'category' => 'Frontend', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'vuedotjs'],
            ['name' => 'Bootstrap', 'category' => 'Frontend', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'bootstrap'],
            ['name' => 'Inertia.js', 'category' => 'Frontend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'inertia'],
            ['name' => 'Tailwind CSS', 'category' => 'Frontend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'tailwindcss'],
            ['name' => 'Nuxt.js', 'category' => 'Frontend', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'nuxt'],
            ['name' => 'Bulma CSS', 'category' => 'Frontend', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'bulma'],
            ['name' => 'React.js', 'category' => 'Frontend', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'react'],
            ['name' => 'Next.js', 'category' => 'Frontend', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'nextdotjs'],

            // Cloud
            ['name' => 'AWS', 'category' => 'Cloud', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'icloud'],
            ['name' => 'Azure', 'category' => 'Cloud', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'icloud'],

            // DevOps
            ['name' => 'Docker', 'category' => 'DevOps', 'level' => 4, 'mastery_level' => 'expert', 'logo_slug' => 'docker'],
            ['name' => 'Kubernetes', 'category' => 'DevOps', 'level' => 2, 'mastery_level' => 'working', 'logo_slug' => 'kubernetes'],

            // Tools
            ['name' => 'Git', 'category' => 'Tools', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'git'],
            ['name' => 'Pandas', 'category' => 'Tools', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'pandas'],
            ['name' => 'Pinia', 'category' => 'Tools', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'pinia'],
            ['name' => 'Postman', 'category' => 'Tools', 'level' => 5, 'mastery_level' => 'expert', 'logo_slug' => 'postman'],
            ['name' => 'Supabase', 'category' => 'Tools', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'supabase'],
            ['name' => 'Swagger', 'category' => 'Tools', 'level' => 3, 'mastery_level' => 'working', 'logo_slug' => 'swagger'],

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
                    'position' => [
                        'en' => 'Senior Backend Developer',
                        'es' => 'Desarrollador Backend Senior'
                    ],
                    'start_date' => '2024-06-01',
                    'end_date' => '2025-07-24',
                    'description' => [
                        'en' => 'Backend development with Django, event management with Celery, search optimization with Elasticsearch, architecture with RabbitMQ and Redis.',
                        'es' => 'Desarrollo backend con Django, gestión de eventos con Celery, optimización de búsquedas con Elasticsearch, arquitectura con RabbitMQ y Redis.'
                    ],
                    'skills' => ['Django', 'Celery', 'Elasticsearch', 'PostgreSQL', 'Redis', 'Docker', 'RabbitMQ'],
                ],
                [
                    'company' => 'Divine Solutions LLC',
                    'position' => [
                        'en' => 'Full-Stack Developer',
                        'es' => 'Desarrollador Full-Stack'
                    ],
                    'start_date' => '2022-01-01',
                    'end_date' => null,
                    'description' => [
                        'en' => 'Full-stack development with backend focus. Service integration, REST APIs and database management.',
                        'es' => 'Desarrollo full-stack con enfoque en backend. Integración de servicios, APIs REST y gestión de bases de datos.'
                    ],
                    'skills' => ['Django', 'PostgreSQL', 'React', 'Docker'],
                ],
                [
                    'company' => 'CALISOFT',
                    'position' => [
                        'en' => 'Full-Stack Developer',
                        'es' => 'Desarrollador Full-Stack'
                    ],
                    'start_date' => '2020-10-01',
                    'end_date' => '2022-01-01',
                    'description' => [
                        'en' => 'Development with Java Spring, React frontend, MySQL/MongoDB database management, interfaces with Primefaces.',
                        'es' => 'Desarrollo con Java Spring, React frontend, gestión de bases de datos MySQL/MongoDB, interfaces con Primefaces.'
                    ],
                    'skills' => ['React', 'MySQL', 'MongoDB'],
                ],
            ];

            foreach ($experiencesData as $expData) {
                $skillNames = $expData['skills'];
                unset($expData['skills']);
                $expData['person_id'] = $person->id;

                $experience = Experience::updateOrCreate(
                    [
                        'company' => $expData['company'],
                        'person_id' => $person->id
                    ],
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
                    'degree' => [
                        'en' => 'Bachelor of Computer Engineering',
                        'es' => 'Licenciado en Ingeniería Informática'
                    ],
                    'field' => [
                        'en' => 'Computer Science',
                        'es' => 'Ciencias de la Computación'
                    ],
                    'start_date' => '2015-09-01',
                    'end_date' => '2020-07-01',
                    'description' => [
                        'en' => 'Comprehensive training in software engineering, systems and databases.',
                        'es' => 'Formación completa en ingeniería de software, sistemas y bases de datos.'
                    ],
                ]
            );
        }
    }
}
