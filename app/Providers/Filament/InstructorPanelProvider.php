<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use App\Http\Middleware\IsInstructor;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

class InstructorPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            // ->sidebarCollapsibleOnDesktop()
            ->sidebarFullyCollapsibleOnDesktop()
            ->sidebarWidth('14rem')
            ->brandName('Gymora Studio')
            ->id('instructor')
            ->path('instructor')
            ->authGuard('web')
            ->profile()
            // ->registration()
            ->colors([
                'primary' => Color::Cyan,
            ])
            ->discoverResources(in: app_path('Filament/Instructor/Resources'), for: 'App\Filament\Instructor\Resources')
            ->discoverPages(in: app_path('Filament/Instructor/Pages'), for: 'App\Filament\Instructor\Pages')
            ->pages([
                \App\Filament\Instructor\Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Instructor/Widgets'), for: 'App\Filament\Instructor\Widgets')
            ->widgets([
                \App\Filament\Instructor\Widgets\InstructorStatsWidget::class,
                \App\Filament\Instructor\Widgets\InstructorAccountWidget::class,
                // \App\Filament\Instructor\Widgets\InstructorInfoWidget::class, // Removed
                \App\Filament\Instructor\Widgets\JadwalAktifWidget::class,
                \App\Filament\Instructor\Widgets\UlasanWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                IsInstructor::class,
            ]);
    }
}
