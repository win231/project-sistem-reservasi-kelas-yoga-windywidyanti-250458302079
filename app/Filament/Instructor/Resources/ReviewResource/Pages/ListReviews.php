<?php

namespace App\Filament\Instructor\Resources\ReviewResource\Pages;

use App\Filament\Instructor\Resources\ReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListReviews extends ListRecords
{
    protected static string $resource = ReviewResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\Action::make('export_excel')
    //             ->label('Export Excel')
    //             ->icon('heroicon-o-arrow-down-tray')
    //             ->color('success')
    //             ->action(function () {
    //                 return $this->exportAllReviews();
    //             }),
    //     ];
    // }

    // protected function exportAllReviews()
    // {
    //     $reviews = ReviewResource::getEloquentQuery()->get();

    //     $fileName = 'ulasan_' . Auth::user()->name . '_' . now()->format('Y-m-d') . '.csv';

    //     $headers = [
    //         'Content-Type' => 'text/csv',
    //         'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
    //     ];

    //     $callback = function () use ($reviews) {
    //         $file = fopen('php://output', 'w');

    //         // Header
    //         fputcsv($file, ['DAFTAR ULASAN KELAS']);
    //         fputcsv($file, ['Instruktur', Auth::user()->name]);
    //         fputcsv($file, ['Tanggal Export', now()->format('d M Y, H:i')]);
    //         fputcsv($file, []);

    //         // Header tabel
    //         fputcsv($file, ['No', 'Member', 'Email', 'Kelas', 'Tanggal Kelas', 'Rating', 'Komentar', 'Tanggal Review']);

    //         // Data
    //         foreach ($reviews as $index => $review) {
    //             fputcsv($file, [
    //                 $index + 1,
    //                 $review->booking->user->name,
    //                 $review->booking->user->email,
    //                 $review->booking->classSchedule->class->name,
    //                 $review->booking->classSchedule->start_time->format('d M Y, H:i'),
    //                 $review->rating . ' / 5',
    //                 $review->comment,
    //                 $review->created_at->format('d M Y, H:i')
    //             ]);
    //         }

    //         fclose($file);
    //     };

    //     return response()->stream($callback, 200, $headers);
    // }
}
