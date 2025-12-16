@php
    $booking = $record->booking;
    $user = $booking->user;
    $schedule = $booking->classSchedule;
    $class = $schedule->class;
@endphp

<div style="margin-bottom: 1.5rem;">
    {{-- Informasi Member --}}
    <div style="border: 1px solid #4B5563; border-radius: 0.5rem; overflow: hidden; background-color: #1F2937;">
        <div style="background-color: #111827; padding: 0.75rem 1rem; border-bottom: 1px solid #4B5563;">
            <h3 style="font-size: 0.875rem; font-weight: 600; color: #FFFFFF; margin: 0;">
                Informasi Member
            </h3>
        </div>
        <div style="background-color: #1F2937;">
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Nama Member</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; font-weight: 600; margin: 0;">{{ $user->name }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Email</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ $user->email }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">No. HP</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ $user->phone ?? '-' }}</dd>
            </div>
        </div>
    </div>
</div>

<div style="margin-bottom: 1.5rem;">
    {{-- Informasi Kelas --}}
    <div style="border: 1px solid #4B5563; border-radius: 0.5rem; overflow: hidden; background-color: #1F2937;">
        <div style="background-color: #111827; padding: 0.75rem 1rem; border-bottom: 1px solid #4B5563;">
            <h3 style="font-size: 0.875rem; font-weight: 600; color: #FFFFFF; margin: 0;">
                Informasi Kelas
            </h3>
        </div>
        <div style="background-color: #1F2937;">
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Nama Kelas</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; font-weight: 600; margin: 0;">{{ $class->name }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Tipe Kelas</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ $class->type->name }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Tanggal Kelas</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ \Carbon\Carbon::parse($schedule->date)->translatedFormat('d F Y') }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Waktu</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</dd>
            </div>
            <div style="padding: 0.75rem 1rem; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Lokasi</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ $schedule->location }}</dd>
            </div>
        </div>
    </div>
</div>

<div>
    {{-- Detail Ulasan --}}
    <div style="border: 1px solid #4B5563; border-radius: 0.5rem; overflow: hidden; background-color: #1F2937;">
        <div style="background-color: #111827; padding: 0.75rem 1rem; border-bottom: 1px solid #4B5563;">
            <h3 style="font-size: 0.875rem; font-weight: 600; color: #FFFFFF; margin: 0;">
                Detail Ulasan
            </h3>
        </div>
        <div style="background-color: #1F2937;">
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Rating</dt>
                <dd style="font-size: 1.25rem; color: #FFFFFF; margin: 0;">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $record->rating)
                            <span style="color: #FBBF24;">⭐</span>
                        @else
                            <span style="color: #4B5563;">⭐</span>
                        @endif
                    @endfor
                    <span style="font-size: 0.875rem; color: #9CA3AF; margin-left: 0.5rem;">({{ $record->rating }}/5)</span>
                </dd>
            </div>
            <div style="padding: 0.75rem 1rem; border-bottom: 1px solid #374151; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Komentar</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0; line-height: 1.6;">
                    {{ $record->comment ?? '-' }}
                </dd>
            </div>
            <div style="padding: 0.75rem 1rem; display: grid; grid-template-columns: 200px 1fr; gap: 1rem;">
                <dt style="font-size: 0.875rem; font-weight: 500; color: #9CA3AF;">Tanggal Review</dt>
                <dd style="font-size: 0.875rem; color: #FFFFFF; margin: 0;">{{ \Carbon\Carbon::parse($record->created_at)->translatedFormat('d F Y, H:i') }} WIB</dd>
            </div>
        </div>
    </div>
</div>
