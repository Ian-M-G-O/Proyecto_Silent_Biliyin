<?php

namespace App\Filament\Widgets;

use App\Models\Mascota;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class MascotasStats extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected ?string $heading = 'Resumen de mascotas';

    protected function getStats(): array
    {
        $porEstado = Mascota::query()
            ->selectRaw('estado, count(*) as total')
            ->groupBy('estado')
            ->pluck('total', 'estado');

        $noDisponibles = (int) $porEstado->get('No disponible', 0);

        return [
            Stat::make('Total de mascotas', (int) $porEstado->sum())
                ->description("No disponibles: {$noDisponibles}")
                ->descriptionIcon('heroicon-m-heart')
                ->color('gray'),

            Stat::make('Disponibles', (int) $porEstado->get('Disponible', 0))
                ->description('Listas para adopción')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('En proceso', (int) $porEstado->get('En proceso', 0))
                ->description('Con solicitud en revisión')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Adoptadas', (int) $porEstado->get('Adoptada', 0))
                ->description('Ya tienen hogar')
                ->descriptionIcon('heroicon-m-home')
                ->color('info'),
        ];
    }
}