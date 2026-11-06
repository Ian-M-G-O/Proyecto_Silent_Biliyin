<?php

namespace App\Filament\Widgets;

use App\Models\Mascota;
use Filament\Widgets\ChartWidget;

class MascotasPorEspecieChart extends ChartWidget
{
    protected static ?int $sort = 3;

    protected ?string $heading = 'Mascotas por especie';

    protected function getData(): array
    {
        $conteos = Mascota::query()
            ->selectRaw('especie, count(*) as total')
            ->groupBy('especie')
            ->pluck('total', 'especie');

        return [
            'datasets' => [
                [
                    'label' => 'Mascotas',
                    'data' => $conteos->map(fn ($total) => (int) $total)->values()->all(),
                    'backgroundColor' => ['#f6863b', '#5cacf6', '#91e949', '#b548ec'],
                ],
            ],
            'labels' => $conteos->keys()->all(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}