<?php

namespace App\Filament\Instructor\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\ClassSchedule;
use Illuminate\Support\Facades\Auth;

class JadwalAktifWidget extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int|string|array $columnSpan = 'full';
    
    protected static ?string $heading = 'Jadwal Aktif';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                ClassSchedule::query()
                    ->where('instructor_id', Auth::id())
                    ->where('start_time', '>', now())
                    ->with(['class.type', 'bookings'])
                    ->orderBy('start_time', 'asc')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('class.name')
                    ->label('Kelas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Waktu')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('bookings_count')
                    ->label('Peserta')
                    ->counts('bookings')
                    ->formatStateUsing(fn ($state, $record) => $state . '/' . $record->max_capacity)
                    ->badge()
                    ->color(fn ($state, $record) => $state >= $record->max_capacity ? 'success' : 'warning'),
            ])
            ->paginated(false);
    }
}
