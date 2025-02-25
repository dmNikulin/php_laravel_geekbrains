<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DataLogger
{
    private $start_time;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next): Response
    {
        $this->start_time = microtime(true);
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if (env('API_DATALOGGER', true)) {
            if(env('API_DATALOGGER_USE_DB', true)){
                $endTime = microtime(true);
                $log = new Log();
                $log->time = gmdate("Y-m-d M:i:s");
                $log->duration = number_format($endTime - LARAVEL_START, 3);
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save();
            }
        } else {
            $endTime = microtime(true);
            $filename = 'api_datalogger' . date('d-m-y') . '.log';
            
            $dataToLog = 'Time: ' . gmdate("Y-m-d M:i:s") . "\n";
            $dataToLog .= 'Duration: ' . number_format($endTime - LARAVEL_START, 3) . "\n";
            $dataToLog .= 'IP address: ' . $request->ip() . "\n";
            $dataToLog .= 'URL: ' . $request->fullUrl() . "\n";
            $dataToLog .= 'Method: ' . $request->method() . "\n";
            $dataToLog .= 'Input: ' . $request->getContent() . "\n";

            File::append(storage_path('logs' . DIRECTORY_SEPARATOR . $filename), $dataToLog . '\n' . str_repeat("*", 20) . "\n");
        }
    }
}
