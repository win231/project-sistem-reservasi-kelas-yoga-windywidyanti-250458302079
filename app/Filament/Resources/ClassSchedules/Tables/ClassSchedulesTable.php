<?php

namespace App\Filament\Resources\ClassSchedules\Tables;

use App\Models\Instructor;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class ClassScheduleTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Nama Kelas
                TextColumn::make('class.name')
                    ->label('Kelas')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

            // Nama Instruktur
            TextColumn::make('instructor_id')
                ->label('Instruktur')
                ->formatStateUsing(function ($state) {
                    // Cari data di tabel Instructor
                    $coach = Instructor::where('user_id', $state)->first();
                    // Tampilin namanya
                    return $coach ? $coach->name : '-';
                }),

                // Lokasi
                TextColumn::make('location')
                    ->label('Ruangan')
                    ->searchable(),

                // Foto Ruangan
                ImageColumn::make('location_image')
                    ->label('Foto')
                    ->disk('public')
                    ->visibility('public')
                    ->circular(),

                // Waktu
                TextColumn::make('start_time')
                    ->label('Jadwal')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),

                // Kapasitas
                TextColumn::make('max_capacity')
                    ->label('Kuota')
                    ->badge()
                    ->color('info'),
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
