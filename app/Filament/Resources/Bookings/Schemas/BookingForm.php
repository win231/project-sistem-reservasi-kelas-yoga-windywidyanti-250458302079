<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Fieldset;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Fieldset::make('Data Booking')
                ->schema([
                    Select::make('user_id')
                        ->label('Member')
                        ->relationship('user', 'name') // Pilih member berdasarkan nama
                        ->searchable()
                        ->preload()
                        ->required(),

                    Select::make('class_schedule_id')
                        ->label('Kelas yang Dibooking')
                        ->relationship('classSchedule', 'id') // Pilih jadwal berdasarkan ID
                        // Catatan: Jika ingin menampilkan "Yoga - Senin 08:00", perlu custom label di sini
                        ->required(),

                    Select::make('status')
                        ->label('Status Konfirmasi')
                        ->options([
                            'confirmed' => 'Diterima',
                            'cancelled' => 'dibatalkan',
                            'completed' => 'Selesai',
                        ])
                        ->default('confirmed')
                        ->required(),
                ])->columns(1),
        ]);
            
    }
}
