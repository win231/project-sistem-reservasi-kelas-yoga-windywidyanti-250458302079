@php
    $participants = $record->bookings()->with('user')->get();
    $confirmedCount = $participants->where('status', 'confirmed')->count();
@endphp

<div style="margin-bottom: 1.5rem;">
    {{-- Informasi Jadwal --}}
    <div style="border: 1px solid #4B5563; border-radius: 0.5rem; overflow: hidden; background-color: #1F2937;">
        <div style="background-color: #111827; padding: 0.75rem 1rem; border-bottom: 1px solid #4B5563;">
            <h3 style="font-size: 0.875rem; font-weight: 600; color: #FFFFFF; margin: 0;">
                Informasi Jadwal
            </h3>
        </div>
        <div style="background-color: #1F2937;">
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Nama Kelas</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; font-weight: 600; margin: 0;">{{ $record->class->name }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Tipe Kelas</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ $record->class->type->name }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Tanggal</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ \Carbon\Carbon::parse($record->date)->translatedFormat('d F Y') }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Waktu</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ \Carbon\Carbon::parse($record->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($record->end_time)->format('H:i') }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Lokasi</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ $record->location }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Kapasitas</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ $confirmedCount }}/{{ $record->max_capacity }} peserta</dd>
            </div>
        </div>
    </div>
</div>

<div>
    {{-- Daftar Peserta --}}
    <div style="border: 1px solid #4B5563; border-radius: 0.5rem; overflow: hidden; background-color: #1F2937;">
        <div style="background-color: #111827; padding: 0.75rem 1rem; border-bottom: 1px solid #4B5563;">
            <h3 style="font-size: 0.875rem; font-weight: 600; color: #FFFFFF; margin: 0;">
                Daftar Peserta ({{ $participants->count() }})
            </h3>
        </div>
        
        @if($participants->count() > 0)
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead style="background-color: #111827;">
                        <tr>
                            <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #9CA3AF; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid #374151;">
                                No
                            </th>
                            <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #9CA3AF; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid #374151;">
                                Nama
                            </th>
                            <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #9CA3AF; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid #374151;">
                                Email
                            </th>
                            <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #9CA3AF; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid #374151;">
                                No. HP
                            </th>
                            <th style="padding: 0.75rem 1rem; text-align: left; font-size: 0.75rem; font-weight: 600; color: #9CA3AF; text-transform: uppercase; letter-spacing: 0.05em; border-bottom: 1px solid #374151;">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody style="background-color: #1F2937;">
                        @foreach($participants as $index => $participant)
                            <tr style="border-bottom: 1px solid #374151;">
                                <td style="padding: 0.75rem 1rem; white-space: nowrap; font-size: 0.875rem; color: #D1D5DB;">
                                    {{ $index + 1 }}
                                </td>
                                <td style="padding: 0.75rem 1rem; white-space: nowrap;">
                                    <div style="display: flex; align-items: center;">
                                        <div style="flex-shrink: 0; width: 32px; height: 32px;">
                                            <div style="width: 32px; height: 32px; border-radius: 50%; background-color: #2563EB; display: flex; align-items: center; justify-content: center;">
                                                <span style="font-size: 0.75rem; font-weight: 600; color: #FFFFFF;">
                                                    {{ strtoupper(substr($participant->user->name, 0, 1)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div style="margin-left: 0.75rem;">
                                            <div style="font-size: 0.875rem; font-weight: 500; color: #FFFFFF;">
                                                {{ $participant->user->name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="padding: 0.75rem 1rem; white-space: nowrap; font-size: 0.875rem; color: #D1D5DB;">
                                    {{ $participant->user->email }}
                                </td>
                                <td style="padding: 0.75rem 1rem; white-space: nowrap; font-size: 0.875rem; color: #D1D5DB;">
                                    {{ $participant->user->phone ?? '-' }}
                                </td>
                                <td style="padding: 0.75rem 1rem; white-space: nowrap;">
                                    @if($participant->status === 'confirmed')
                                        <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.625rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 500; background-color: rgba(5, 150, 105, 0.2); color: #6EE7B7; border: 1px solid #059669;">
                                            <span style="width: 6px; height: 6px; background-color: #10B981; border-radius: 50%; margin-right: 0.375rem;"></span>
                                            Confirmed
                                        </span>
                                    @elseif($participant->status === 'cancelled')
                                        <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.625rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 500; background-color: rgba(220, 38, 38, 0.2); color: #FCA5A5; border: 1px solid #DC2626;">
                                            <span style="width: 6px; height: 6px; background-color: #EF4444; border-radius: 50%; margin-right: 0.375rem;"></span>
                                            Cancelled
                                        </span>
                                    @else
                                        <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.625rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 500; background-color: rgba(217, 119, 6, 0.2); color: #FCD34D; border: 1px solid #D97706;">
                                            <span style="width: 6px; height: 6px; background-color: #F59E0B; border-radius: 50%; margin-right: 0.375rem;"></span>
                                            {{ ucfirst($participant->status) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div style="text-align: center; padding: 3rem 1rem; background-color: #1F2937;">
                <svg style="margin: 0 auto 0.5rem; width: 48px; height: 48px; color: #6B7280;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h3 style="margin-top: 0.75rem; font-size: 0.875rem; font-weight: 500; color: #FFFFFF;">Belum ada peserta</h3>
                <p style="margin-top: 0.25rem; font-size: 0.875rem; color: #9CA3AF;">Belum ada yang mendaftar untuk jadwal ini.</p>
            </div>
        @endif
    </div>
</div>
