<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('person_id')
                    ->relationship('person', 'name')
                    ->required(),
                TextInput::make('institution')
                    ->required(),
                TextInput::make('degree')
                    ->required(),
                TextInput::make('field')
                    ->required(),
                TextInput::make('start_date')
                    ->required()
                    ->numeric(),
                TextInput::make('end_date')
                    ->required()
                    ->numeric(),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
