<?php

namespace App\Filament\Resources\Reviews\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ReviewForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Member')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpan(1),
                Select::make('class_id')
                    ->label('Kelas')
                    ->relationship('class', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpan(1),
                Select::make('booking_id')
                    ->label('Booking')
                    ->relationship('booking', 'id')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpan(1),
                Select::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '⭐ 1 - Sangat Buruk',
                        2 => '⭐⭐ 2 - Buruk',
                        3 => '⭐⭐⭐ 3 - Cukup',
                        4 => '⭐⭐⭐⭐ 4 - Baik',
                        5 => '⭐⭐⭐⭐⭐ 5 - Sangat Baik',
                    ])
                    ->required()
                    ->native(false)
                    ->columnSpan(1),
                Textarea::make('comment')
                    ->label('Komentar')
                    ->rows(4)
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}
