<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 1. Nama Member
                TextColumn::make('name')
                    ->label('Member')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                // 2. gender
                TextColumn::make('gender')
                    ->label('Jenis Kelamin')
                    ->searchable(),

                // 3. email
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                // 4. Waktu user dibuat
                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y, H:i'),
            ])
            ->filters([
                //
            ])
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
