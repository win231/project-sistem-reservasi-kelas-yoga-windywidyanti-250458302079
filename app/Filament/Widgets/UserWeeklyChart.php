<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class UserWeeklyChart extends ChartWidget
{
    protected static ?int $sort = 3;
    
    // buat header
    protected ?string $heading = 'User Mingguan';

    // buat nge full in layar
    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        // [] ini tuh mangkok kosong yg bakal di isi nanti
        $labels = [];
        $data = [];

        // carbon buat ubah bahasa, karna default nya inggris, panggil code negaranya, 'id' buat indo
        Carbon::setLocale('id');

        // for = perulangan (looping) untuk 7 hari terakhir
        for ($i = 6; $i >= 0; $i--) {

            // menghitung tanggal hati ini dikurangi $i
            // ambil tanggal hari ini , terus mundur sehari
            $date = Carbon::today()->subDays($i);

            // tambahkan label hari dalam format singkat (sen, sel, rab..)
            // 'id' itu kode bahasa indo, 'd' itu day 
            $labels[] = $date->locale('id')->translatedFormat('D');

            // hitung jumlah uuser yg terdaftar pada tanggal tersebut
            // kaya cari user yg tanggal daftarnya sama kaya $data, lalu dihitung jumlahnya
            $data[] = User::whereDate('created_at', $date)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'User Registrasi',
                    'data' => $data,
                    'backgroundColor' => '#3b82f6',
                    'borderRadius' => 6,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getHeight(): string
    {
        return 300;
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'maintainAspectRatio' => false,

            'plugins' => [
                'legend' => [
                    'display' => true,
                    'positions' => 'buttom',
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
            ],
        ];
    }
}
