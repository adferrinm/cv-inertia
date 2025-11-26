<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Education;

class CVSeeder extends Seeder
{
    public function run(): void
    {

        if (Person::count() > 0) {
            $this->command->info('Data already exists, skipping seed.');
            return;
        }

        $person = Person::create([
            'name' => 'Adrian Ferrin Moreno',
            'headline' => 'Senior Backend Developer',
            'summary' => 'Full-Stack con foco actual en Backend (Django); BI (PowerBI), interés en IA aplicada a desarrollo. Orientado a excelencia y mejora continua.',
            'email' => 'adferrinm@gmail.com',
            'phone' => '+34 600 36 21 19',
            'location' => 'Madrid, España',
            'pdf_url' => 'https://mnf.red/848ee128-88be-4ead-aae1-1cb1d15f6c2a',
            'github_url' => 'https://github.com/adferrinm',
            'linkedin_url' => 'https://www.linkedin.com/in/adrian-ferrin-moreno-695014243',
            'portfolio_url' => 'https://mnf.red/848ee128-88be-4ead-aae1-1cb1d15f6c2a',
        ]);

        $skills = [
            ['name' => 'Python', 'category' => 'language', 'logo_slug' => 'python', 'level' => 5],
            ['name' => 'Django', 'category' => 'framework', 'logo_slug' => 'django', 'level' => 5],
            ['name' => 'Vue.js', 'category' => 'framework', 'logo_slug' => 'vuedotjs', 'level' => 4],
            ['name' => 'Docker', 'category' => 'devops', 'logo_slug' => 'docker', 'level' => 4],
            ['name' => 'MySQL', 'category' => 'database', 'logo_slug' => 'mysql', 'level' => 4],
            ['name' => 'PostgreSQL', 'category' => 'database', 'logo_slug' => 'postgresql', 'level' => 4],
            ['name' => 'Elasticsearch', 'category' => 'database', 'logo_slug' => 'elasticsearch', 'level' => 3],
            ['name' => 'Celery', 'category' => 'framework', 'logo_slug' => 'celery', 'level' => 4],
            ['name' => 'Redis', 'category' => 'database', 'logo_slug' => 'redis', 'level' => 3],
            ['name' => 'RabbitMQ', 'category' => 'tool', 'logo_slug' => 'rabbitmq', 'level' => 3],
            ['name' => 'AWS', 'category' => 'devops', 'logo_slug' => 'amazonwebservices', 'level' => 3],
            ['name' => 'Git', 'category' => 'tool', 'logo_slug' => 'git', 'level' => 5],
            ['name' => 'JavaScript', 'category' => 'language', 'logo_slug' => 'javascript', 'level' => 4],
            ['name' => 'TypeScript', 'category' => 'language', 'logo_slug' => 'typescript', 'level' => 4],
            ['name' => 'Node.js', 'category' => 'framework', 'logo_slug' => 'nodejs', 'level' => 3],
            ['name' => 'React', 'category' => 'framework', 'logo_slug' => 'react', 'level' => 3],
            ['name' => 'Java', 'category' => 'language', 'logo_slug' => 'java', 'level' => 3],
            ['name' => 'Spring', 'category' => 'framework', 'logo_slug' => 'spring', 'level' => 3],
            ['name' => 'MongoDB', 'category' => 'database', 'logo_slug' => 'mongodb', 'level' => 3],
            ['name' => 'Nginx', 'category' => 'devops', 'logo_slug' => 'nginx', 'level' => 3],
        ];

        foreach ($skills as $skillData) {
            Skill::create($skillData);
        }

        $exp1 = Experience::create([
            'person_id' => $person->id,
            'company' => 'WOCU-Monitoring',
            'position' => 'Senior Backend Developer',
            'description' => 'Desarrollo backend con Django, gestión de eventos con Celery, optimización de búsquedas con Elasticsearch, arquitectura con RabbitMQ y Redis.',
            'start_date' => '2024-07-01',
            'end_date' => null,
        ]);

        $exp1->skills()->attach(Skill::whereIn('name', ['Python', 'Django', 'MySQL', 'Docker', 'Elasticsearch', 'Celery', 'Redis', 'RabbitMQ'])->pluck('id'));

        $exp2 = Experience::create([
            'person_id' => $person->id,
            'company' => 'Divine Solutions LLC',
            'position' => 'Full-Stack Developer',
            'description' => 'Desarrollo full-stack con enfoque en backend. Integración de servicios, APIs REST y gestión de bases de datos.',
            'start_date' => '2022-02-01',
            'end_date' => '2024-06-30',
        ]);

        $exp2->skills()->attach(Skill::whereIn('name', ['Python', 'Django', 'Vue.js', 'PostgreSQL'])->pluck('id'));

        $exp3 = Experience::create([
            'person_id' => $person->id,
            'company' => 'CALISOFT',
            'position' => 'Full-Stack Developer',
            'description' => 'Desarrollo con Java Spring, React frontend, gestión de bases de datos MySQL/MongoDB, interfaces con Primefaces.',
            'start_date' => '2020-10-01',
            'end_date' => '2022-01-31',
        ]);

        $exp3->skills()->attach(Skill::whereIn('name', ['Java', 'Spring', 'React', 'MySQL', 'MongoDB'])->pluck('id'));

        Education::create([
            'person_id' => $person->id,
            'institution' => 'CUJAE',
            'degree' => 'Licenciado en Ingeniería Informática',
            'field' => 'Computer Science',
            'start_year' => 2015,
            'end_year' => 2020,
            'description' => 'Formación completa en ingeniería de software, sistemas y bases de datos.',
        ]);

        $this->command->info('✅ CV data seeded successfully!');
    }
}
