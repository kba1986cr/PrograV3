public function resultadosMensuales($mes, $ano)
{
    $resultados = Evento::whereMonth('fecha', $mes)
        ->whereYear('fecha', $ano)
        ->with('puesto')
        ->get()
        ->groupBy('puesto.nombre')
        ->map(function ($eventos) {
            return [
                'cantidad_horarios' => $eventos->count(),
                'tiempo_extra_total' => $eventos->sum(function ($evento) {
                    $tiemposExtras = $evento->tiemposExtras;
                    return $tiemposExtras->sum(function ($tiempoExtra) {
                        return strtotime($tiempoExtra->hora_fin) - strtotime($tiempoExtra->hora_inicio);
                    });
                }),
            ];
        });

    return view('resultados.index', compact('resultados'));
}
