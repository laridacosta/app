<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TimezoneController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function getTime(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
        ]);

        $location = $request->input('location');
        $apiKey = env('TIMEZONEDB_API_KEY');

        Log::info('Obtendo hora para a localização: ' . $location);

        $response = Http::get("http://api.timezonedb.com/v2.1/list-time-zone", [
            'key' => $apiKey,
            'format' => 'json',
        ]);

        Log::info('Resposta da API: ' . $response->body());

        if ($response->successful()) {
            $data = $response->json();
            // Verificar se $data possui os dados esperados
        } else {
            Log::error('Erro ao obter a hora: ' . $response->body());
            return redirect('/')->with('error', 'Não foi possível obter a hora para o local especificado.');
        }
        

        // Buscar pela localização exata ou país
        foreach ($data['zones'] as $zone) {
            if (stripos($zone['zoneName'], $location) !== false || stripos($zone['countryName'], $location) !== false) {
                $timeZone = $zone;
                break;
            }
        }

        if ($timeZone) {
            return view('welcome', ['data' => $timeZone]);
        } else {
            Log::error('Erro ao obter a hora: Localização não encontrada');
            return redirect('/')->with('error', 'Não foi possível obter a hora para o local especificado: Localização não encontrada');
        }
    }
}




