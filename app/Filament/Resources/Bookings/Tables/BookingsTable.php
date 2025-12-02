<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // 1. user_id (Menampilkan Nama Member)
                TextColumn::make('user.name')
                    ->label('Member')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                // 2. class_schedule_id (Menampilkan Nama Kelas dan Lokasi)
                TextColumn::make('classSchedule.class.name')
                    ->label('Kelas')
                    // Lokasi ditampilkan sebagai deskripsi kolom Kelas
                    ->description(fn($record) => $record->classSchedule->location ?? '-')
                    ->searchable(),

                // 3. Waktu Jadwal Kelas
                TextColumn::make('classSchedule.start_time')
                    ->label('Jadwal Kelas')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->color('gray'),

                // 4. status (Menampilkan Badge Warna-Warni)
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',   // Kuning untuk Menunggu
                        'confirmed' => 'success', // Hijau untuk Diterima
                        'rejected' => 'danger',   // Merah untuk Ditolak
                        default => 'gray',
                    }),

                // 5. created_at (Berfungsi sebagai booked_at)
                TextColumn::make('created_at')
                    ->label('Waktu Booking')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
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
