<?php

namespace App\Filament\Widgets;

use App\Models\Mascota;
use Filament\Widgets\ChartWidget;

class MascotasPorEstadoChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $heading = 'Mascotas por estado';

    protected function getData(): array
    {
        $estados = ['Disponible', 'En proceso', 'Adoptada', 'No disponible'];

        $conteos = Mascota::query()
            ->selectRaw('estado, count(*) as total')
            ->groupBy('estado')
            ->pluck('total', 'estado');

        return [
            'datasets' => [
                [
                    'label' => 'Mascotas',
                    'data' => array_map(fn (string $estado) => (int) $conteos->get($estado, 0), $estados),
                    'backgroundColor' => ['#22c55e', '#f59e0b', '#3b82f6', '#9ca3af'],
                ],
            ],
            'labels' => $estados,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => ['legend' => ['display' => false]],
            'scales' => ['y' => ['ticks' => ['precision' => 0]]],
        ];
    }
}