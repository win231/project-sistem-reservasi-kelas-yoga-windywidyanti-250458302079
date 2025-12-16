<?php

namespace App\Filament\Instructor\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class UlasanWidget extends BaseWidget
{
    protected static ?int $sort = 5;
    protected int|string|array $columnSpan = 'full';
    
    protected static ?string $heading = 'Ulasan Terbaru';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Review::query()
                    ->whereHas('booking.classSchedule', function($query) {
                        $query->where('instructor_id', Auth::id());
                    })
                    ->with(['user', 'booking.classSchedule.class'])
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Member')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking.classSchedule.class.name')
                    ->label('Kelas')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn ($state) => str_repeat('⭐', $state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment')
                    ->label('Komentar')
                    ->limit(30)
                    ->searchable()
                    ->wrap(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
