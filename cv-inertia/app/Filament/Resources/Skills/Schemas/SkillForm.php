<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('category')
                    ->required()
                    ->default('tool'),
                TextInput::make('logo_slug')
                    ->required(),
                TextInput::make('level')
                    ->required()
                    ->numeric()
                    ->default(3),
                TextInput::make('person_id')
                    ->numeric(),
                TextInput::make('mastery_level')
                    ->required()
                    ->default('expert'),
            ]);
    }
}
