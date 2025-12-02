<?php

namespace App\Filament\Resources\Users\Schemas;


use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

use Filament\Schemas\Components\Fieldset;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            Fieldset::make('Data Diri')
                ->schema([
                    TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('Email Address')
                        ->email()
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255),

                    Select::make('gender')
                        ->label('Jenis Kelamin')
                        ->options([
                            'male' => 'Laki-laki',
                            'female' => 'Perempuan',
                        ])
                        ->required(),

                    Select::make('role')
                        ->label('Role (Peran)')
                        ->options([
                            'member' => 'Member Biasa',
                            'instructor' => 'Instruktur',
                            'admin' => 'Administrator',
                        ])
                        ->default('member')
                        ->required(),
                ])->columns(2),

            Fieldset::make('Keamanan')
                ->schema([
                    TextInput::make('password')
                        ->label('Password')
                        ->password()
                        ->dehydrateStateUsing(fn($state) => Hash::make($state))
                        ->dehydrated(fn($state) => filled($state))
                        ->required(fn(string $context): bool => $context === 'create'),
                ])->columns(1),
        ]);
    }
}
