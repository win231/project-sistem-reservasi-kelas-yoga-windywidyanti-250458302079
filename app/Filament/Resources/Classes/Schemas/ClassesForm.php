<?php

namespace App\Filament\Resources\Classes\Schemas;

use Illuminate\Support\Str;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;

class ClassesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // --- 1. NAMA & AUTO SLUG ---
                TextInput::make('name')
                    ->label('Nama Kelas')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                // 2. DROPDOWN CLASS TYPE (Relasi) 
                Select::make('class_type_id')
                    ->label('Kategori / Tipe')
                // 'type' ngambil dari nama method public function type() di Model Classes
                // 'name' -> kolom yg mau ditampilin di list pilihan
                ->relationship('type', 'name')
                    ->searchable() // Biar bisa diketik cari kategori
                    ->preload() // Biar datanya dimuat duluan
                    ->required(),

                // 3. PILIHAN DIFFICULTY (Manual) 
                Select::make('difficulty_level')
                    ->label('Tingkat Kesulitan')
                    ->options([
                        'intermediate' => 'Menengah (Intermediate)',
                        'beginner' => 'Pemula (Beginner)',
                        'advanced' => 'Lanjutan (Advanced)',
                        'all_levels' => 'Semua Level (All Levels)',
                    ])
                    ->required(),

                // 4. DESKRIPSI 
                Textarea::make('description')
                    ->label('Deskripsi Kelas')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
