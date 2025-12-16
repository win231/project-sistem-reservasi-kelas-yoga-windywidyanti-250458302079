<?php

namespace App\Filament\Resources\Instructors\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Filters\SelectFilter;

class InstructorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
            ImageColumn::make('profile_image_url')
                ->label('Foto')
                ->disk('public')
                ->circular()
                ->width(80)
                ->state(function ($record) {
                    if ($record->profile_image_url) {
                        return $record->profile_image_url;
                    }
                    return 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&color=7F9CF5&background=EBF4FF&size=200';
                })
                ->disk(function ($record) {
                    return $record->profile_image_url ? 'public' : null;
                }),

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
            ->filters([
                SelectFilter::make('user.gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'male' => 'Pria',
                        'female' => 'Wanita',
                    ])
                    ->placeholder('Semua Gender'),
            ])
            ->recordActions([
                EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->color('warning'),
                DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}