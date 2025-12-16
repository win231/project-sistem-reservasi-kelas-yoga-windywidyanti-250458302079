<?php

namespace App\Filament\Resources\ClassSchedules\Tables;

use App\Models\Instructor;
use App\Models\Classes;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;

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
                SelectFilter::make('class_id')
                    ->label('Kelas')
                    ->relationship('class', 'name')
                    ->searchable()
                    ->preload()
                    ->placeholder('Semua Kelas'),
                    
                SelectFilter::make('location')
                    ->label('Ruangan')
                    ->options(fn() => \App\Models\ClassSchedule::distinct('location')->pluck('location', 'location')->toArray())
                    ->placeholder('Semua Ruangan'),
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
