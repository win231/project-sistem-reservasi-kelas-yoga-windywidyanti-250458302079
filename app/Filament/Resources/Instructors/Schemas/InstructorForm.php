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
                ->label('User')
                ->relationship('user', 'name', function ($query) {
                    $query->where('role', 'instructor');
                })
                ->searchable()
                ->preload()
                ->required()
                ->columnSpanFull(),

            // Nama Instructor
            TextInput::make('name')
                ->label('Name')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            // Foto
            FileUpload::make('profile_image_url')
                ->label('Profile Image Url')
                ->image()
                ->disk('public')
                ->directory('instructors')
                ->visibility('public')
                ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg'])
                ->maxSize(2048)
                ->columnSpanFull(),

            // Bio
            Textarea::make('bio')
                ->label('Bio')
                ->rows(4)
                ->columnSpanFull(),
        ]);
    }
}
