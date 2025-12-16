<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    No
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Nama Peserta
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Email
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Nomor Telepon
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Status
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                    Tanggal Booking
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($getRecord()->bookings as $index => $booking)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                        {{ $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                        {{ $booking->user->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $booking->user->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $booking->user->phone_number ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($booking->status === 'confirmed')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                Confirmed
                            </span>
                        @elseif($booking->status === 'cancelled')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300">
                                Cancelled
                            </span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300">
                                {{ ucfirst($booking->status) }}
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $booking->created_at->format('d M Y, H:i') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                        Belum ada peserta yang mendaftar
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Peserta</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $getRecord()->bookings->count() }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Kapasitas Maksimal</p>
            <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $getRecord()->max_capacity }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Sisa Kuota</p>
            <p class="text-2xl font-bold {{ $getRecord()->max_capacity - $getRecord()->bookings->count() > 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }}">
                {{ max(0, $getRecord()->max_capacity - $getRecord()->bookings->count()) }}
            </p>
        </div>
    </div>
</div>
