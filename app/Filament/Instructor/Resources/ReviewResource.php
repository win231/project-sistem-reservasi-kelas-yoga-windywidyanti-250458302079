<?php

namespace App\Filament\Instructor\Resources;

use App\Filament\Instructor\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use BackedEnum;
use Filament\Actions\Action;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-star';
    
    protected static ?string $navigationLabel = 'Review';
    
    protected static ?string $modelLabel = 'Ulasan';
    
    protected static ?string $pluralModelLabel = 'Ulasan';
    
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Select::make('booking_id')
                    ->relationship('booking', 'id')
                    ->label('Booking')
                    ->required()
                    ->disabled(),
                Forms\Components\TextInput::make('rating')
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->required()
                    ->disabled(),
                Forms\Components\Textarea::make('comment')
                    ->label('Komentar')
                    ->rows(4)
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('booking.user.name')
                    ->label('Member')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking.classSchedule.class.name')
                    ->label('Kelas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking.classSchedule.start_time')
                    ->label('Tanggal Kelas')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->formatStateUsing(fn (string $state): string => str_repeat('⭐', (int) $state))
                    ->sortable(),
                Tables\Columns\TextColumn::make('comment')
                    ->label('Komentar')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Review')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('rating')
                    ->label('Rating')
                    ->options([
                        1 => '⭐',
                        2 => '⭐⭐',
                        3 => '⭐⭐⭐',
                        4 => '⭐⭐⭐⭐',
                        5 => '⭐⭐⭐⭐⭐',
                    ]),
                Tables\Filters\SelectFilter::make('class_id')
                    ->label('Kelas')
                    ->relationship('booking.classSchedule.class', 'name'),
            ])
            ->recordActions([
                Action::make('view')
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->color('primary')
                    ->modalHeading(fn ($record) => 'Detail Ulasan dari ' . $record->booking->user->name)
                    ->modalContent(fn ($record) => view('filament.instructor.modals.review-detail', ['record' => $record]))
                    ->modalWidth('3xl')
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
        ];
    }
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('booking.classSchedule', function (Builder $query) {
                $query->where('instructor_id', Auth::id());
            });
    }
    
    public static function canCreate(): bool
    {
        return false;
    }
}
