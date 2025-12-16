<?php

namespace App\Filament\Instructor\Resources;

use App\Filament\Instructor\Resources\ClassScheduleResource\Pages;
use App\Models\ClassSchedule;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use BackedEnum;

class ClassScheduleResource extends Resource
{
    protected static ?string $model = ClassSchedule::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-calendar';
    
    protected static ?string $navigationLabel = 'Class Schedule';
    
    protected static ?string $modelLabel = 'Class Schedule';
    
    protected static ?int $navigationSort = 1;

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('instructor_id', Auth::id())
            ->with(['class.type', 'bookings']);
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Select::make('class_id')
                    ->relationship('class', 'name')
                    ->required()
                    ->label('Kelas'),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->label('Lokasi')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('start_time')
                    ->required()
                    ->label('Waktu Mulai'),
                Forms\Components\DateTimePicker::make('end_time')
                    ->required()
                    ->label('Waktu Selesai'),
                Forms\Components\TextInput::make('max_capacity')
                    ->required()
                    ->numeric()
                    ->default(10)
                    ->label('Kapasitas Maksimal')
                    ->minValue(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('class.name')
                    ->label('Kelas')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('class.type.name')
                    ->label('Tipe')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->label('Waktu Mulai')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_time')
                    ->label('Waktu Selesai')
                    ->dateTime('H:i')
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
            ->filters([
                Tables\Filters\SelectFilter::make('class_id')
                    ->relationship('class', 'name')
                    ->label('Filter Kelas'),
                Tables\Filters\Filter::make('upcoming')
                    ->label('Jadwal Mendatang')
                    ->query(fn (Builder $query): Builder => $query->where('start_time', '>', now())),
                Tables\Filters\Filter::make('past')
                    ->label('Jadwal Selesai')
                    ->query(fn (Builder $query): Builder => $query->where('start_time', '<', now())),
            ])
            ->recordActions([
                Action::make('view')
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->color('primary')
                    ->modalHeading(fn ($record) => 'Detail Jadwal: ' . $record->class->name)
                    ->modalContent(fn ($record) => view('filament.instructor.modals.schedule-detail', ['record' => $record]))
                    ->modalWidth('5xl')
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false),
                Action::make('export')
                    ->label('Export')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->color('success')
                    ->url(fn ($record) => route('instructor.schedule.export', $record))
                    ->openUrlInNewTab(),
            ])
            ->defaultSort('start_time', 'desc');
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
            'index' => Pages\ListClassSchedules::route('/'),
        ];
    }
    
    public static function canCreate(): bool
    {
        return false;
    }
    
    public static function canEdit($record): bool
    {
        return false;
    }
    
    public static function canDelete($record): bool
    {
        return false;
    }
}
