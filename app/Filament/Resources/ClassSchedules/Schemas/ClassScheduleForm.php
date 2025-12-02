<?php

namespace App\Filament\Resources\ClassSchedules\Schemas;

use App\Models\Instructor;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\DateTimePicker;

class ClassScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->schema([

            Fieldset::make('Informasi Kelas')
                ->schema([
                    Select::make('class_id')
                        ->label('Nama Kelas')
                        ->relationship('class', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                Select::make('instructor_id')
                    ->label('Instruktur')
                    ->options(Instructor::all()->pluck('name', 'user_id'))
                    ->searchable()
                    ->required(),
                ])->columns(2),

            Fieldset::make('Detail Lokasi & Waktu')
                ->schema([
                    TextInput::make('location')
                        ->label('Lokasi / Ruangan')
                        ->placeholder('Contoh: Ruang Yoga A')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('max_capacity')
                        ->label('Kapasitas Maksimal')
                        ->numeric()
                        ->default(20)
                        ->required(),

                    DateTimePicker::make('start_time')
                        ->label('Waktu Mulai')
                        ->required(),

                    DateTimePicker::make('end_time')
                        ->label('Waktu Selesai')
                        ->required()
                        ->after('start_time'),

                    FileUpload::make('location_image')
                        ->label('Foto Ruangan')
                        ->image()
                        ->directory('class-locations')
                        ->visibility('public')
                        ->columnSpanFull(),
                ])->columns(2),
        ]); 
    }
}