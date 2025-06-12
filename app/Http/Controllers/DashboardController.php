<?php

namespace App\Http\Controllers;

use App\Models\Accounting\AssociatedExpenses;
use App\Models\Accounting\Gasto;
use App\Models\Accounting\Ingreso;
use App\Models\Alerts\Alert;
use App\Models\Alerts\AlertStatus;
use App\Models\Budgets\Budget;
use App\Models\Clients\Client;
use App\Models\HoursMonthly\HoursMonthly;
use App\Models\Invoices\Invoice;
use App\Models\Jornada\Jornada;
use App\Models\Jornada\Pause;
use App\Models\KitDigital;
use App\Models\KitDigitalEstados;
use App\Models\Llamadas\Llamada;
use App\Models\Notes\Note;
use App\Models\ProductividadMensual;
use App\Models\Projects\Project;
use App\Models\Services\Service;
use App\Models\Services\ServiceCategories;
use App\Models\Tasks\LogTasks;
use App\Models\Tasks\Task;
use App\Models\Tpv\Caja;
use App\Models\Tpv\Category;
use App\Models\Tpv\Order;
use App\Models\Tpv\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Users\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $id = Auth::user()->id;
        $acceso = Auth::user()->access_level_id;
        $user = User::find($id);
        $users = User::where('inactive',0)->get();
        $to_dos = $user->todos->where('finalizada',false);
        $to_dos_finalizados = $user->todos->where('finalizada',true);
        $timeWorkedToday = $this->calculateTimeWorkedToday($user);
        $jornadaActiva = $user->activeJornada();
        $llamadaActiva = $user->activeLlamada();
        $events = $user->eventos->map(function ($event) {
            return $event->nonNullAttributes(); // Usa el método que definimos antes
        });
        $pausaActiva = null;
        if ($jornadaActiva) {
            $pausaActiva = $jornadaActiva->pausasActiva();
        }

        switch($acceso){
            case(1):
                 // Obtener las fechas de la solicitud, o asignar fechas predeterminadas si no están presentes
                $fechaInicio = $request->input('fecha_inicio') ?? date('Y-m-01'); // Primer día del mes actual
                $fechaFin = $request->input('fecha_fin') ?? date('Y-m-d'); // Día actual

                // Validar las fechas
                if (!$fechaInicio || !$fechaFin) {
                    return redirect()->back()->with('error', 'Por favor selecciona un rango de fechas válido.');
                }
                // Buscar los ingresos en el rango de fechas
                $ingresos = Invoice::whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
                // Buscar los gastos en el rango de fechas
                $gastos = Gasto::whereBetween('created_at', [$fechaInicio, $fechaFin])->where('transfer_movement', '!=', true)->get();

                // Buscar los gastos asociados en el rango de fechas
                $gastosAsociados = AssociatedExpenses::whereBetween('created_at', [$fechaInicio, $fechaFin])->get();

                // Calcular la cantidad de cada tipo
                $ingresosCount = $ingresos->count();
                $gastosCount = $gastos->count();
                $gastosAsociadosCount = $gastosAsociados->count();

                // Calcular beneficios
                $totalIngresos = $ingresos->sum('total');
                $totalGastosComunes = $gastos->sum('quantity');
                $totalGastosSociados = $gastosAsociados->sum('quantity');
                $totalGastos = $totalGastosComunes + $totalGastosSociados;
                $beneficios = $totalIngresos - $totalGastos;


                $clientes = Client::where('is_client',true)->get();
                $budgets = Budget::where('admin_user_id',$id)->get();
                $projects = Project::where('admin_user_id',$id)->get();
                $tareas = Task::where('gestor_id',$id)->get();
                $ingresos = 0;
                $gastos = 0;
                $gastosAsociados = 0;


                return view('dashboards.dashboard', compact(
                    'user',
                    'tareas',
                    'to_dos',
                    'budgets',
                    'projects',
                    'clientes',
                    'users',
                    'events',
                    'timeWorkedToday',
                    'jornadaActiva',
                    'pausaActiva',
                    'llamadaActiva',
                    'totalIngresos',
                    'totalGastosComunes',
                    'totalGastosSociados',
                    'beneficios',
                    'to_dos_finalizados'
                ));
            case(2):
                $clientes = Client::where('is_client',true)->get();
                $budgets = Budget::where('admin_user_id',$id)->get();
                $projects = Project::where('admin_user_id',$id)->get();
                $tareas = Task::where('gestor_id',$id)->get();
                return view('dashboards.dashboard_gestor', compact(
                    'user',
                    'tareas',
                    'to_dos',
                    'budgets',
                    'projects',
                    'clientes',
                    'users',
                    'events',
                    'timeWorkedToday',
                    'jornadaActiva',
                    'pausaActiva',
                    'llamadaActiva',
                    'to_dos_finalizados'
                ));
            case(3):
                $clientes = Client::where('is_client',true)->get();
                $budgets = Budget::where('admin_user_id',$id)->get();
                $projects = Project::where('admin_user_id',$id)->get();
                $tareas = Task::where('gestor_id',$id)->get();
                return view('dashboards.dashboard_gestor', compact(
                    'user',
                    'tareas',
                    'to_dos',
                    'budgets',
                    'projects',
                    'clientes',
                    'users',
                    'events',
                    'timeWorkedToday',
                    'jornadaActiva',
                    'pausaActiva',
                    'llamadaActiva',
                    'to_dos_finalizados'
                ));
            case(4):
                $clientes = Client::where('is_client',true)->get();
                $budgets = Budget::where('admin_user_id',$id)->get();
                $projects = Project::where('admin_user_id',$id)->get();
                $tareas = Task::where('gestor_id',$id)->get();
                $v1 = count(Budget::where('admin_user_id',2)->whereYear('created_at',2202)->get())/12;

                return view('dashboards.dashboard_gestor', compact(
                    'user',
                    'tareas',
                    'to_dos',
                    'budgets',
                    'projects',
                    'clientes',
                    'users',
                    'events',
                    'timeWorkedToday',
                    'jornadaActiva',
                    'pausaActiva',
                    'llamadaActiva',
                    'to_dos_finalizados'
                ));
            case(5):
                $tareas = $user->tareas->whereIn('task_status_id', [1, 2, 5]);
                $tiempoProducidoHoy = $this->tiempoProducidoHoy();
                $tasks = $this->getTasks($user->id);

                $tareasFinalizadas = Task::where('admin_user_id', $user->id)
                    ->where('task_status_id', 3)
                    ->whereMonth('updated_at', Carbon::now()->month)
                    ->whereYear('updated_at', Carbon::now()->year)
                    ->get();

                $totalProductividad = 0;
                $totalTareas = $tareasFinalizadas->count();
                $totalEstimatedTime = 0;
                $totalRealTime = 0;


                foreach ($tareasFinalizadas as $tarea) {
                    // Parse estimated and real times into total minutes
                    $totalEstimatedTime += $this->parseFlexibleTime($tarea->estimated_time);
                    $totalRealTime += $this->parseFlexibleTime($tarea->real_time);
                }

                // Calculate the total productivity as a percentage
                if ($totalRealTime > 0) {
                    $totalProductividad = ($totalEstimatedTime / $totalRealTime) * 100;
                } else {
                    $totalProductividad = 0; // Set to 0 if no real time to avoid division by zero
                }

                // Set productivity to 0 if no tasks
                $totalProductividad = $totalTareas > 0 ? $totalProductividad : 0;

                // Save or update monthly productivity with month and year
                $currentMonth = Carbon::now()->month;
                $currentYear = Carbon::now()->year;

                $productividadMensual = ProductividadMensual::where('admin_user_id', $user->id)
                    ->where('mes', $currentMonth)
                    ->where('año', $currentYear)
                    ->first();

                if (!$productividadMensual) {
                    ProductividadMensual::create([
                        'admin_user_id' => $user->id,
                        'mes' => $currentMonth,
                        'año' => $currentYear,
                        'productividad' => $totalProductividad,
                    ]);
                }else {
                        // Actualizar el registro existente
                    $productividadMensual->update([
                        'productividad' => $totalProductividad,
                    ]);
                }

                $productividadIndividual = $totalTareas > 0 ? $totalProductividad : 0;
                $horasMes = $this->tiempoProducidoMes($user->id);




                return view('dashboards.dashboard_personal', compact(
                    'user',
                    'tiempoProducidoHoy',
                    'tasks',
                    'tareas',
                    'to_dos',
                    'users',
                    'events',
                    'timeWorkedToday',
                    'jornadaActiva',
                    'pausaActiva',
                    'productividadIndividual',
                    'totalEstimatedTime',
                    'totalRealTime',
                    'horasMes',
                    'to_dos_finalizados'
                ));
            case(6):
                return view('cabinas.create');
            case(7):

                $salonid = auth()->user()->salon_id;
                $caja = Caja::whereNull('cierre')->where('salon_id',$salonid)->get()->first();
                if(!isset($caja)){
                    // Obtener categorías activas
                    $categories = Category::where('inactive', 0)->get();
                    // Obtener productos activos
                    $products = Product::where('inactive', 0)->get();
                    return view('dashboards.dashboard_tpv', compact('categories', 'products','caja'));
                }
                $lastOrder = Order::where('caja_id', $caja->id)->whereNull('mesa_id')->latest()->first();
                if(isset($lastOrder)){
                    if($lastOrder->hasItems()){
                        $nextNumber = Order::where('caja_id', $caja->id)->max('numero') + 1;
                        $order = Order::create([
                            'user_id' => Auth::user()->id,
                            'numero' => $nextNumber, // Número incremental
                            'status' => 1, // Estado inicial
                            'caja_id' => $caja->id ?? null,
                            'total' => 0 // Total inicial
                        ]);
                    }else{
                        $order = $lastOrder;
                    }
                }else{
                    $order = Order::create([
                        'user_id' => Auth::user()->id,
                        'numero' => 1, // Número incremental
                        'status' => 1, // Estado inicial
                        'caja_id' => $caja->id ?? null,
                        'total' => 0 // Total inicial
                    ]);
                }
                return redirect()->route('tpv.edit',$order->id);
            case(8):
                $tareas = $user->tareas->whereIn('task_status_id', [1, 2, 5]);
                $tiempoProducidoHoy = $this->tiempoProducidoHoy();
                $tasks = $this->getTasks($user->id);

                $tareasFinalizadas = Task::where('admin_user_id', $user->id)
                    ->where('task_status_id', 3)
                    ->whereMonth('updated_at', Carbon::now()->month)
                    ->whereYear('updated_at', Carbon::now()->year)
                    ->get();

                $totalProductividad = 0;
                $totalTareas = $tareasFinalizadas->count();
                $totalEstimatedTime = 0;
                $totalRealTime = 0;


                foreach ($tareasFinalizadas as $tarea) {
                    // Parse estimated and real times into total minutes
                    $totalEstimatedTime += $this->parseFlexibleTime($tarea->estimated_time);
                    $totalRealTime += $this->parseFlexibleTime($tarea->real_time);
                }

                // Calculate the total productivity as a percentage
                if ($totalRealTime > 0) {
                    $totalProductividad = ($totalEstimatedTime / $totalRealTime) * 100;
                } else {
                    $totalProductividad = 0; // Set to 0 if no real time to avoid division by zero
                }

                // Set productivity to 0 if no tasks
                $totalProductividad = $totalTareas > 0 ? $totalProductividad : 0;

                // Save or update monthly productivity with month and year
                $currentMonth = Carbon::now()->month;
                $currentYear = Carbon::now()->year;

                $productividadMensual = ProductividadMensual::where('admin_user_id', $user->id)
                    ->where('mes', $currentMonth)
                    ->where('año', $currentYear)
                    ->first();

                if (!$productividadMensual) {
                    ProductividadMensual::create([
                        'admin_user_id' => $user->id,
                        'mes' => $currentMonth,
                        'año' => $currentYear,
                        'productividad' => $totalProductividad,
                    ]);
                }else {
                        // Actualizar el registro existente
                    $productividadMensual->update([
                        'productividad' => $totalProductividad,
                    ]);
                }

                $productividadIndividual = $totalTareas > 0 ? $totalProductividad : 0;
                $horasMes = $this->tiempoProducidoMes($user->id);

                return view('dashboards.dashboard_taller', compact(
                    'user',
                    'tiempoProducidoHoy',
                    'tasks',
                    'tareas',
                    'to_dos',
                    'users',
                    'events',
                    'timeWorkedToday',
                    'jornadaActiva',
                    'pausaActiva',
                    'productividadIndividual',
                    'totalEstimatedTime',
                    'totalRealTime',
                    'horasMes',
                    'to_dos_finalizados'
                ));
        }
    }
    public function parseFlexibleTime($time) {
        list($hours, $minutes, $seconds) = explode(':', $time);
        return ($hours * 60) + $minutes + ($seconds / 60); // Convert to total minutes
    }

    public function tiempoProducidoMes($id)
    {
        $mes = Carbon::now();
        $tiempoTotalMes = 0;

        // Obtener todas las tareas del usuario en el mes actual
        $tareasMes = LogTasks::where('admin_user_id', $id)
            ->whereYear('date_start', $mes->year)
            ->whereMonth('date_start', $mes->month)
            ->get();

        foreach($tareasMes as $tarea) {
            if ($tarea->status == 'Pausada') {
                $tiempoInicio = Carbon::parse($tarea->date_start);
                $tiempoFinal = Carbon::parse($tarea->date_end);
                $tiempoTotalMes += $tiempoFinal->diffInSeconds($tiempoInicio);
            }
        }

        // Formatear el tiempo total en horas, minutos y segundos
        $hours = floor($tiempoTotalMes / 3600);
        $minutes = floor(($tiempoTotalMes % 3600) / 60);
        $seconds = $tiempoTotalMes % 60;

        $result = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

        // Calcular el porcentaje del tiempo trabajado en relación al total
        $totalHorasMensuales = 7 * 20; // Ejemplo de 20 días laborales y 7 horas diarias
        $horas_mes_porcentaje = $hours + ($minutes / 60);
        $porcentaje = ($horas_mes_porcentaje / $totalHorasMensuales) * 100;

        $data = [
            'horas' => $result,
            'porcentaje' => $porcentaje
        ];

        return $result;
    }

    public function tiempoProducidoHoy()
    {

        $hoy = Carbon::today();
        $tiempoTarea = 0;

        if (Auth::check()) {
            $userId = Auth::id();
            $tareasHoy = LogTasks::where('admin_user_id', $userId)
                ->whereDate('date_start', '=', $hoy)
                ->get();

            foreach ($tareasHoy as $tarea) {
                if ($tarea->status == 'Pausada') {
                    $tiempoInicio = Carbon::parse($tarea->date_start);
                    $tiempoFinal = Carbon::parse($tarea->date_end);
                    $tiempoTarea += $tiempoFinal->diffInSeconds($tiempoInicio);
                }
            }
        } else {
            $result = '00:00:00';
        }

        // Formatear el tiempo total en horas, minutos y segundos
        $hours = floor($tiempoTarea / 3600);
        $minutes = floor(($tiempoTarea % 3600) / 60);
        $seconds = $tiempoTarea % 60;

        $result = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);

        // Calcular el porcentaje de tiempo trabajado en relación con el total
        $horas_dia_porcentaje = $hours + ($minutes / 60);
        $totalHoras = 7;
        $porcentaje = ($horas_dia_porcentaje / $totalHoras) * 100;

        $data = [
            'horas' => $result,
            'porcentaje' => $porcentaje
        ];

        return $data;
    }

    public function timeworked(){
        $user = Auth::user();
        $timeWorkedToday = $this->calculateTimeWorkedToday($user);
        return response()->json(['success' => true ,'time' => $timeWorkedToday]);
    }

    public function llamada(Request $request){
        $user = Auth::user();
        $data = $request->validate([
            'client_id' => 'nullable|required_without:phone',
            'phone' => 'nullable|required_without:client_id',
            'comentario'=> 'nullable'
        ], [
            'client_id.required_without' => 'El campo cliente es obligatorio si el teléfono no está presente.',
            'phone.required_without' => 'El campo teléfono es obligatorio si el cliente no está presente.',
        ]);
        $llamada =  Llamada::create([
            'admin_user_id' => $user->id,
            'start_time' => Carbon::now(),
            'is_active' => true,
            'client_id' => $data['client_id'] ?? null,
            'phone'=> $data['phone'] ?? null,
            'comentario' => $data['comentario'] ?? null
        ]);
        return redirect()->back()->with('toast', [
            'icon' => 'success',
            'mensaje' => 'Llamada iniciada'
        ]);

    }

    public function finalizar()
    {
        $user = Auth::user();
        $llamada = Llamada::where('admin_user_id', $user->id)->where('is_active', true)->first();
        if ($llamada) {
            $finllamada = $llamada->update([
                'end_time' => Carbon::now(),
                'is_active' => false,
            ]);
            return response()->json(['success' => true ,'mensaje' => 'Llamada Finalizada']);
        }

    }

    public function startJornada()
    {
        $user = User::find(Auth::user()->id);

        $activeJornada = $user->activeJornada();

        if ($activeJornada) {
            // Si ya hay una jornada activa, retornar un mensaje indicando que no se puede iniciar otra
            return response()->json([
                'success' => false,
                'message' => 'Ya existe una jornada activa.'
            ]);
        }

        $jornada =  Jornada::create([
            'admin_user_id' => $user->id,
            'start_time' => Carbon::now(),
            'is_active' => true,
        ]);

        $todayJornada = Jornada::where('admin_user_id', $user->id)
        ->whereDate('start_time', Carbon::today())
        ->get();

        //Alertas de puntualidad
        if(count($todayJornada) == 1 ){

            $horaLimiteEntrada = Carbon::createFromTime(9, 30, 0, 'Europe/Madrid');
            $horaLimiteEntradaUTC = $horaLimiteEntrada->setTimezone('UTC');
            $mesActual = Carbon::now()->month;
            $añoActual = Carbon::now()->year;
            $fechaActual = Carbon::now();

            $tardehoy = Jornada::where('admin_user_id', $user->id)
            ->whereDate('start_time', $fechaActual->toDateString())
            ->whereTime('start_time', '>', $horaLimiteEntradaUTC->format('H:i:s'))
            ->get();


            $hourlyAverage = Jornada::where('admin_user_id', $user->id)
                ->whereMonth('start_time', $mesActual)
                ->whereYear('start_time', $añoActual)
                ->whereRaw("TIME(start_time) > ?", [$horaLimiteEntradaUTC->format('H:i:s')])
                ->get();

            $fechaNow = Carbon::now();

            if(count($tardehoy) > 0){

                //Si hay mas de 3 veces
                if (count($hourlyAverage) > 2) {
                    $alertados = [1,8];
                    foreach($alertados as $alertar){
                        $data = [
                            "admin_user_id" =>  $alertar,
                            "stage_id" => 23,
                            "description" => $user->name . " ha llegado tarde 3 veces o mas este mes",
                            "status_id" => 1,
                            "reference_id" => $user->id,
                            "activation_datetime" => Carbon::now()->format('Y-m-d H:i:s')
                        ];

                        $alert = Alert::create($data);
                        $alertSaved = $alert->save();
                    }
                }

                switch (count($hourlyAverage)) {
                    case 1:
                        $text = 'Hemos notado que hoy llegaste después de la hora límite de entrada (09:30). Entendemos que a veces pueden surgir imprevistos, pero te recordamos la importancia de respetar el horario para mantener la eficiencia en el equipo.';
                        break;
                    case 2:
                        $text = 'Nuevamente has llegado después de la hora límite de entrada (09:30). Reforzamos la importancia de cumplir con el horario para asegurar un buen rendimiento y organización en el equipo.';
                        break;
                    case 3:
                        $text = 'Se ha registrado tu llegada tarde tres veces. Esta información se compartirá con la Dirección. Es importante respetar los horarios para mantener el rendimiento y la organización del equipo.';
                        break;
                    default:
                        $text = 'Se ha registrado tu llegada tarde mas de  tres veces. Esta información se compartirá con la Dirección. Es importante respetar los horarios para mantener el rendimiento y la organización del equipo.';
                        break;
                }

                $data = [
                    "admin_user_id" =>  $user->id,
                    "stage_id" => 23,
                    "description" => $text,
                    "status_id" => 1,
                    "reference_id" => $user->id,
                    "activation_datetime" => $fechaNow->format('Y-m-d H:i:s')
                ];

                $alert = Alert::create($data);
                $alertSaved = $alert->save();
            }
        }


        if($jornada){
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false,'mensaje' => 'Error al iniciar jornada']);
        }
    }

    public function endJornada()
    {
        $user = Auth::user();
        $jornada = Jornada::where('admin_user_id', $user->id)->where('is_active', true)->first();
        if ($jornada) {
            $finJornada = $jornada->update([
                'end_time' => Carbon::now(),
                'is_active' => false,
            ]);

            if($finJornada){
                return response()->json(['success' => true]);
            }else{
                return response()->json(['success' => false,'mensaje' => 'Error al iniciar jornada']);
            }
        }else{
            return response()->json(['success' => false,'mensaje' => 'Error al iniciar jornada']);
        }

    }

    public function startPause()
    {

        $user = Auth::user();
        $jornada = Jornada::where('admin_user_id', $user->id)->where('is_active', true)->first();
        if ($jornada) {
            $pause =  Pause::create([
                'jornada_id' =>$jornada->id,
                'start_time' => Carbon::now(),
            ]);

            if($pause){
                return response()->json(['success' => true]);
            }else{
                return response()->json(['success' => false,'mensaje' => 'Error al iniciar jornada']);
            }
        }else{
            return response()->json(['success' => false,'mensaje' => 'Error al iniciar jornada']);
        }
    }

    public function endPause()
    {
        $user = Auth::user();
        $jornada = Jornada::where('admin_user_id', $user->id)->where('is_active', true)->first();
        if ($jornada) {
            $pause = Pause::where('jornada_id', $jornada->id)->whereNull('end_time')->first();
            if ($pause){
                $finPause = $pause->update([
                    'end_time' => Carbon::now(),
                    'is_active' => false,
                ]);

                if($finPause){
                    return response()->json(['success' => true]);
                }else{
                    return response()->json(['success' => false,'mensaje' => 'Error al iniciar jornada']);
                }
            }else{
                return response()->json(['success' => false,'mensaje' => 'Error al iniciar jornada']);
            }
        }else{
            return response()->json(['success' => false,'mensaje' => 'Error al iniciar jornada']);
        }
    }

    private function calculateTimeWorkedToday($user)
    {


        $todayJornadas = $user->jornadas()->whereDate('start_time', Carbon::today())->orWhere('is_active',true)->get();

        $totalWorkedSeconds = 0;

        foreach ($todayJornadas as $jornada) {
            $workedSeconds = Carbon::parse($jornada->start_time)->diffInSeconds($jornada->end_time ?? Carbon::now());
            $totalPauseSeconds = $jornada->pauses->sum(function ($pause) {
                return Carbon::parse($pause->start_time)->diffInSeconds($pause->end_time ?? Carbon::now());
            });
            $totalWorkedSeconds += $workedSeconds - $totalPauseSeconds;
        }
        return $totalWorkedSeconds;
    }

    public function getTasks($id)
    {
        $tasks = array();
        $tasksPause = Task::where("admin_user_id", $id)->where("task_status_id", 2)->get();
        $tasks["tasksPause"] = $tasksPause;
        $tasksRevision = Task::where("admin_user_id", $id)->where("task_status_id", 5)->get();
        $tasks["tasksRevision"] = $tasksRevision;
        $taskPlay = Task::where("admin_user_id", $id)->where("task_status_id", 1)->get()->first();
        $tasks["taskPlay"] = $taskPlay;

        return $tasks;
    }

    public function getDataTask(Request $request)
    {

        $tarea = Task::find($request->id);
        //$metas = DB::table('meta')->where("tasks_id", $request->id)->get();
        $autor = $tarea->usuario;
        if ($tarea) {
            $data = array();
            $data["id"] = $tarea->id;
            $data["user"] = $tarea->admin_user_id;
            $data["titulo"] = $tarea->title;
            $data["cliente"] = Optional(Optional($tarea->presupuesto)->cliente)->name ?? 'Cliente no encontrado';
            $data["descripcion"] = $tarea->description;
            $data["estimado"] = $tarea->estimated_time;
            $data["real"] = $tarea->real_time;
            $data["proyecto"] = Optional($tarea->proyecto)->name ?? 'Proyecto no encontrado';
            $data["prioridad"] = Optional($tarea->prioridad)->name ?? 'Prioridad no encontrada';
            $data["gestor"] = $tarea->gestor->name;
            $data["gestorid"] = Optional($tarea->gestor)->id ?? 'Gestor no encontrado';
            $data["estado"] = $tarea->estado->name;
            $data["metas"] = '';
            $data["userName"] = $autor;



            $response = json_encode($data);

            return $response;
        } else {
            $response = json_encode(array(
                "estado" => "ERROR"
            ));

            return $response;
        }
    }

    public function getTasksRefresh()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $usuario = User::find($userId);
            $tareas = $this->getTasks($usuario->id);

            return $tareas;
        }
    }

    public function setStatusTask(Request $request)
    {



        $tarea = Task::find($request->id);
        $date = Carbon::now();
        $userId = Auth::id();
        $usuario = User::find($userId);

        $formatEstimated = strtotime($tarea->estimated_time);
        $formatReal = strtotime($tarea->real_time);


        $clientIP = request()->ip();

        $error = false;


        //if($clientIP == "81.45.82.225" || $usuario->access_level_id == 4 || $usuario->access_level_id == 3){

        if ($tarea) {
            switch ($request->estado) {
                case "Reanudar":
                    $tareaActiva = Task::where("admin_user_id", $usuario->id)->where("task_status_id", 1)->get()->first();

                    if (!$tareaActiva) {
                        $tarea->task_status_id = 1;
                    }

                    $logTaskC = DB::select("SELECT id FROM `log_tasks` WHERE `status` = 'Reanudada' AND `admin_user_id` = $usuario->id");
                    if (count($logTaskC) == 1) {
                        $error = true;
                    } else {


                        $createLog = LogTasks::create([
                            'admin_user_id' => $usuario->id,
                            'task_id' => $tarea->id,
                            'date_start' => $date,
                            'date_end' => null,
                            'status' => 'Reanudada'
                        ]);

                        if ($tarea->real_time > $tarea->estimated_time) {
                            // Calcular el porcentaje de exceso

                            list($realHours, $realMinutes, $realSeconds) = explode(':', $tarea->real_time);
                            $realTimeInSeconds = ($realHours * 3600) + ($realMinutes * 60) + $realSeconds;

                            list($estimatedHours, $estimatedMinutes, $estimatedSeconds) = explode(':', $tarea->estimated_time);
                            $estimatedTimeInSeconds = ($estimatedHours * 3600) + ($estimatedMinutes * 60) + $estimatedSeconds;

                            // Calcular el porcentaje de exceso basado en segundos
                            $exceedPercentage = ($realTimeInSeconds / $estimatedTimeInSeconds) * 100;

                            // Inicializar datos comunes de la alerta
                            $data = [
                                "admin_user_id" => $tarea->gestor_id,
                                "status_id" => 1,
                                "reference_id" => $tarea->id,
                                "activation_datetime" => Carbon::now()
                            ];

                            // Definir el mensaje y el stage_id según el porcentaje de exceso
                            if ($exceedPercentage >= 100) {
                                $data["stage_id"] = 40; // Stage para el 100% de sobrepaso
                                $data["description"] = 'Tarea ' . $tarea->id.' '.$tarea->title .' ha sobrepasado las horas estimadas en un 100% o más (pérdidas)';
                            } elseif ($exceedPercentage >= 50) {
                                $data["stage_id"] = 40; // Stage para el 50% de sobrepaso
                                $data["description"] = 'Tarea ' . $tarea->id.' '.$tarea->title .' está sobrepasando las horas estimadas en un 50%';
                            } else {
                                $data["stage_id"] = 40; // Stage para sobrepaso menor al 50%
                                $data["description"] = 'Aviso de Tarea - Se está sobrepasando las horas estimadas en la tarea ' . $tarea->title;
                            }

                            $existe = Alert::where('stage_id', $data["stage_id"]) ->where('reference_id', $tarea->id)->where('description', $data["description"])->exists();
                            // Crear y guardar la alerta
                            if (!$existe) {
                                $alert = Alert::create($data);
                                $alertSaved = $alert->save();
                            }
                        }


                        $logTask = DB::select("SELECT id FROM `log_tasks` WHERE date_start BETWEEN DATE_SUB(now(), interval 6 hour) AND DATE_ADD(NOW(), INTERVAL 7 hour) AND `admin_user_id` = $usuario->id");
                        if (count(value: $logTask) == 1) {

                            $activeJornada = $usuario->activeJornada();

                            if (!$activeJornada) {
                                $jornada =  Jornada::create([
                                    'admin_user_id' => $usuario->id,
                                    'start_time' => Carbon::now(),
                                    'is_active' => true,
                                ]);
                            }

                            $horaLimiteEntrada = Carbon::createFromTime(9, 30, 0, 'Europe/Madrid');
                            $horaLimiteEntradaUTC = $horaLimiteEntrada->setTimezone('UTC');
                            $mesActual = Carbon::now()->month;
                            $añoActual = Carbon::now()->year;
                            $fechaActual = Carbon::now();

                            $todayJornada = Jornada::where('admin_user_id', $usuario->id)
                            ->whereDate('start_time', $fechaActual->toDateString())
                            ->whereTime('start_time', '>', $horaLimiteEntradaUTC->format('H:i:s'))
                            ->get();


                            $hourlyAverage = Jornada::where('admin_user_id', $usuario->id)
                                ->whereMonth('start_time', $mesActual)
                                ->whereYear('start_time', $añoActual)
                                ->whereRaw("TIME(start_time) > ?", [$horaLimiteEntradaUTC->format('H:i:s')])
                                ->get();




                            $fechaNow = Carbon::now();

                            if(count($todayJornada) > 0){

                                if (count($hourlyAverage) > 2) {
                                    $alertados = [1,8];
                                    foreach($alertados as $alertar){
                                        $data = [
                                            "admin_user_id" =>  $alertar,
                                            "stage_id" => 23,
                                            "description" => $usuario->name . " ha llegado tarde 3 veces o mas este mes",
                                            "status_id" => 1,
                                            "reference_id" => $usuario->id,
                                            "activation_datetime" => Carbon::now()->format('Y-m-d H:i:s')
                                        ];

                                        $alert = Alert::create($data);
                                        $alertSaved = $alert->save();
                                    }
                                }

                                switch (count($hourlyAverage)) {
                                    case 1:
                                        $text = 'Hemos notado que hoy llegaste después de la hora límite de entrada (09:30). Entendemos que a veces pueden surgir imprevistos, pero te recordamos la importancia de respetar el horario para mantener la eficiencia en el equipo.';
                                        break;
                                    case 2:
                                        $text = 'Nuevamente has llegado después de la hora límite de entrada (09:30). Reforzamos la importancia de cumplir con el horario para asegurar un buen rendimiento y organización en el equipo.';
                                        break;
                                    case 3:
                                        $text = 'Se ha registrado tu llegada tarde tres veces. Esta información se compartirá con la Dirección. Es importante respetar los horarios para mantener el rendimiento y la organización del equipo.';
                                        break;
                                    default:
                                        $text = 'Se ha registrado tu llegada tarde mas de  tres veces. Esta información se compartirá con la Dirección. Es importante respetar los horarios para mantener el rendimiento y la organización del equipo.';
                                        break;
                                }

                                $data = [
                                    "admin_user_id" =>  $usuario->id,
                                    "stage_id" => 23,
                                    "description" => $text,
                                    "status_id" => 1,
                                    "reference_id" => $usuario->id,
                                    "activation_datetime" => $fechaNow->format('Y-m-d H:i:s')
                                ];

                                $alert = Alert::create($data);
                                $alertSaved = $alert->save();
                            }

                        }
                    }
                    break;
                case "Pausada":
                    if ($tarea->task_status_id == 1) {
                        if ($tarea->real_time == "00:00:00") {
                            $start = $tarea->updated_at;
                            $end   = new \DateTime("NOW");
                            $interval = $end->diff($start);

                            $time = sprintf(
                                '%02d:%02d:%02d',
                                ($interval->d * 24) + $interval->h,
                                $interval->i,
                                $interval->s
                            );
                        } else {
                            $start = $tarea->updated_at;
                            $end   = new \DateTime("NOW");
                            $interval = $end->diff($start);

                            $time = sprintf(
                                '%02d:%02d:%02d',
                                ($interval->d * 24) + $interval->h,
                                $interval->i,
                                $interval->s
                            );

                            $time = $this->sum_the_time($tarea->real_time, $time);
                        }
                        $tarea->real_time = $time;
                    }

                    $last = LogTasks::where("admin_user_id", $usuario->id)->get()->last();
                    if ($last) {
                        $last->date_end = $date;
                        $last->status = "Pausada";
                        $last->save();
                    }

                    $tarea->task_status_id = 2;
                    break;
                case "Revision":

                    //Crear Alerta tarea terminada antes de tiempo
                    // if ($formatEstimated > $formatReal) {
                    //     $dataAlert = [
                    //         'admin_user_id' => $usuario->id,
                    //         'stage_id' => 14,
                    //         'activation_datetime' => $date->format('Y-m-d H:i:s'),
                    //         'status_id' => 1,
                    //         'reference_id' => $tarea->id,
                    //     ];

                    //     $alert = Alert::create($dataAlert);
                    //     $alertSaved = $alert->save();
                    // }

                    $dataAlert = [
                        'admin_user_id' => $tarea->gestor_id,
                        'stage_id' => 41,
                        'activation_datetime' => $date->format('Y-m-d H:i:s'),
                        'status_id' => 1,
                        'reference_id' => $tarea->id,
                    ];

                    $alert = Alert::create($dataAlert);
                    $alertSaved = $alert->save();


                    $tarea->task_status_id = 5;
                    break;
            }

            $taskSaved = $tarea->save();

            if (($taskSaved || $tareaActiva == null) && !$error) {
                $response = json_encode(array(
                    "estado" => "OK"
                ));
            } else {
                $response = json_encode(array(
                    "estado" => "ERROR; TIENES OTRA TAREA ACTIVA. HABLA CON EL CREADOR .`,"
                ));
            }
        } else {
            $response = json_encode(array(
                "estado" => "ERROR"
            ));
        }
        //}

        return $response;
    }

    function sum_the_time($time1, $time2)
    {
        $times = array($time1, $time2);
        $seconds = 0;
        foreach ($times as $time) {
            list($hour, $minute, $second) = explode(':', $time);
            $seconds += $hour * 3600;
            $seconds += $minute * 60;
            $seconds += $second;
        }
        $hours = floor($seconds / 3600);
        $seconds -= $hours * 3600;
        $minutes  = floor($seconds / 60);
        $seconds -= $minutes * 60;
        // return "{$hours}:{$minutes}:{$seconds}";
        return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
    }
    function convertToNumber($importe) {
        // Elimina los puntos de separación de miles
        $importe = str_replace('.', '', $importe);
        // Reemplaza la coma decimal por un punto decimal
        $importe = str_replace(',', '.', $importe);
        // Convierte a número flotante
        return (float)$importe;
    }

    public function updateStatusAlertAndAcceptHours(Request $request)
    {
        $alert = Alert::find($request->id);
        $hoursMonthly = HoursMonthly::find($alert->reference_id);
        $hoursMonthly->acceptance_hours    = "CONFORME";
        $hoursMonthly->save();
        $alert->status_id = $request->status;
        $alertSaved = $alert->save();

        if ($alertSaved) {
            $response = json_encode(array(
                "estado" => "200"
            ));
        } else {
            $response = 503;
        }

        return $response;
    }

    public function responseAlert(Request $request)
    {
        $alert = Alert::find($request->id);
        if ($alert->stage_id == 22) {
            $alert->description = $request->texto;
            $alert->save();
        }
        $note = Note::find($alert->reference_id);
        if ($note) {
            $user = $note->admin_user_id;
        } else {
            $user = 1;
        }
        $text = $request->texto;
        Carbon::setLocale("es");
        $fechaNow = Carbon::now();
        $data = [
            "admin_user_id" =>  $user,
            "stage_id" => 19,
            "description" => $text,
            "status_id" => AlertStatus::ALERT_STATUS_PENDING,
            "reference_id" => Auth::user()->id,
            "activation_datetime" => $fechaNow->format('Y-m-d H:i:s')
        ];

        $alertCreate = Alert::create($data);
        $alertSaved = $alertCreate->save();

        if ($alertSaved) {
            if ($note) {
                $note->content = $note->content . " \nRespuesta: " . $text;
                $note->save();
            }
            return 200;
        } else {
            return 503;
        }
    }
}
