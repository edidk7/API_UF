<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\UF;
use Illuminate\Support\Facades\Http;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Lógica para consultar la API y guardar los datos en la base de datos
            $response = Http::get('https://mindicador.cl/api/uf');
            $data = $response->json();

            // Imprimir la respuesta de la API en los logs
            info($data);            

            foreach ($data['serie'] as $value) {
                // Verificar si ya existe un registro para esta fecha
                $uf = UF::where('fecha', $value['fecha'])->first();

                if ($uf) {
                    // Si existe, actualiza el valor
                    $uf->update(['valor' => $value['valor']]);
                } else {
                    // Si no existe, crea un nuevo registro
                    UF::create([
                        'fecha' => $value['fecha'],
                        'valor' => $value['valor']
                    ]);
                }
            }
        })->everyMinute(); // Ejecutar la tarea cada minuto para poder ejecutarla manualmente        
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
