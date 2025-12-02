<?php

namespace App\Filament\Resources\Instructors\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class InstructorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            ImageColumn::make('profile_image_url')
                ->label('Foto')
                ->disk('public')      
                ->visibility('public') 
                ->circular()
                ->width(80),

            // NAMA
            TextColumn::make('name')
                    ->label('Nama Instructor')
                    ->searchable()
                    ->sortable(),

                // JENIS KELAMIN
                TextColumn::make('user.gender')
                    ->label('Jenis Kelamin')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'male' => 'Pria',
                        'female' => 'Wanita',
                        default => $state,
                    })
                    ->sortable(),

                // BIO
                TextColumn::make('bio')
                    ->label('Bio')
                    ->limit(50)
                    ->wrap(),
            ])
            ->filters([])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}