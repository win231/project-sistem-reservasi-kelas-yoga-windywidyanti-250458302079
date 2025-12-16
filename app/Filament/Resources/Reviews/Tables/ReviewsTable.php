<?php

namespace App\Filament\Resources\Reviews\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ReviewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Member')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('class.name')
                    ->label('Kelas')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('rating')
                    ->label('Rating')
                    ->badge()
                    ->formatStateUsing(fn (int $state): string => str_repeat('⭐', $state))
                    ->color(fn (int $state): string => match ($state) {
                        5 => 'success',
                        4 => 'info',
                        3 => 'warning',
                        default => 'danger',
                    })
                    ->sortable(),
                TextColumn::make('comment')
                    ->label('Komentar')
                    ->limit(50)
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Review')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '⭐ 1',
                        2 => '⭐⭐ 2',
                        3 => '⭐⭐⭐ 3',
                        4 => '⭐⭐⭐⭐ 4',
                        5 => '⭐⭐⭐⭐⭐ 5',
                    ]),
                SelectFilter::make('class_id')
                    ->label('Kelas')
                    ->relationship('class', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                ViewAction::make(),
            ]);
    }
}
