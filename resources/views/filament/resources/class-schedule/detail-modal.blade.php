<div class="space-y-4">
    {{-- Informasi Jadwal --}}
    <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4">
        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-3">📅 Informasi Jadwal</h3>
        <div class="grid grid-cols-2 gap-3 text-sm">
            <div>
                <span class="text-gray-500 dark:text-gray-400">Kelas:</span>
                <span class="ml-2 font-semibold text-gray-900 dark:text-white">{{ $record->class->name }}</span>
            </div>
            <div>
                <span class="text-gray-500 dark:text-gray-400">Tipe:</span>
                <span class="ml-2 inline-flex px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300">
                    {{ $record->class->type->name }}
                </span>
            </div>
            <div>
                <span class="text-gray-500 dark:text-gray-400">Instruktur:</span>
                <span class="ml-2 font-semibold text-gray-900 dark:text-white">{{ $record->instructor->name }}</span>
            </div>
            <div>
                <span class="text-gray-500 dark:text-gray-400">Lokasi:</span>
                <span class="ml-2 font-semibold text-gray-900 dark:text-white">{{ $record->location }}</span>
            </div>
            <div>
                <span class="text-gray-500 dark:text-gray-400">Waktu:</span>
                <span class="ml-2 font-semibold text-gray-900 dark:text-white">{{ $record->start_time->format('d M Y, H:i') }} - {{ $record->end_time->format('H:i') }}</span>
            </div>
            <div>
                <span class="text-gray-500 dark:text-gray-400">Kapasitas:</span>
                <span class="ml-2 inline-flex px-2 py-0.5 rounded text-xs font-semibold {{ $record->bookings->count() >= $record->max_capacity ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300' }}">
                    {{ $record->bookings->count() }} / {{ $record->max_capacity }}
                </span>
            </div>
        </div>
    </div>

    {{-- Daftar Peserta --}}
    <div>
        <h3 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">👥 Daftar Peserta ({{ $record->bookings->count() }} orang)</h3>
        
        @if($record->bookings->count() > 0)
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <div class="max-h-96 overflow-y-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-800 sticky top-0">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">No</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Nama</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Email</th>
                                <th class="px-4 py-2 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Status</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($record->bookings as $index => $booking)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="px-4 py-2 whitespace-nowrap text-gray-900 dark:text-gray-100">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap font-medium text-gray-900 dark:text-gray-100">{{ $booking->user->name }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-gray-600 dark:text-gray-400">{{ $booking->user->email }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap text-center">
                                        @if($booking->status === 'confirmed')
                                            <span class="inline-flex px-2 py-0.5 rounded text-xs font-semibold bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                                ✓ Confirmed
                                            </span>
                                        @elseif($booking->status === 'cancelled')
                                            <span class="inline-flex px-2 py-0.5 rounded text-xs font-semibold bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                                ✗ Cancelled
                                            </span>
                                        @else
                                            <span class="inline-flex px-2 py-0.5 rounded text-xs font-semibold bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 whitespace-nowrap text-gray-600 dark:text-gray-400">{{ $booking->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="text-center py-8 bg-gray-50 dark:bg-gray-900 rounded-lg">
                <p class="text-sm text-gray-500 dark:text-gray-400">Belum ada peserta yang mendaftar</p>
            </div>
        @endif
    </div>
</div>
