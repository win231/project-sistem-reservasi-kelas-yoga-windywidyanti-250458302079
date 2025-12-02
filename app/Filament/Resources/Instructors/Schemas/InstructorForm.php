<?php

namespace App\Filament\Resources\Instructors\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class InstructorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            // Pilih User
            Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->required(),

            // Nama Instructor
            TextInput::make('name')
                ->required()
                ->maxLength(255),

            // Foto
            FileUpload::make('profile_image_url')
                ->image()
                ->directory('instructors')
                ->visibility('public'),

            // Bio
            Textarea::make('bio')
                ->columnSpanFull(),
        ]);
    }
}
