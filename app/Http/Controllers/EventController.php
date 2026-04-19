<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\TypeEvenement;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_evenements = TypeEvenement::all();
        return view('calendriers.index', compact('type_evenements'));
    }

    public function listEvent(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));

        $events = Evenement::where(function ($query) use ($start, $end) {
            $query->where('start_date', '>=', $start)
                ->where('end_date', '<=', $end);
        })->get()
            ->filter(function ($item) use ($start, $end) {
                $eventStart = $item->start_date . 'T' . $item->start_time;
                $eventEnd = $item->end_date . 'T' . $item->end_time;

                return $eventStart >= $start && $eventEnd <= $end;
            })
            ->map(function ($item) {
                $type = TypeEvenement::find($item->type_id); // Récupérer le type d'événement correspondant
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'start' => $item->start_date . 'T' . $item->start_time,
                    'end' => $item->end_date . 'T' . $item->end_time,
                    'category' => $item->category,
                    'className' => ['bg-' . $item->category],
                    'type' => $type ? $type->type : null // Ajouter le type d'événement au résultat
                ];
            });

        return response()->json($events);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Event $event)
    {
        $types = TypeEvenement::all();
       // $event->start_time = date("H:i", strtotime($event->start_time));
        return view('calendriers.event-form', ['data' => $event, 'types' => $types, 'action' => route('events.store')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request, Event $event)
    {
        return $this->update($request, $event);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $types = TypeEvenement::all();
      //  $event->start_time = date("H:i", strtotime($event->start_time));
        return view('calendriers.event-form', ['data' => $event, 'types' => $types, 'action' => route('events.update', $event->id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        if ($request->has('delete')) {
            return $this->destroy($event);
        }

        // Récupérer les données du formulaire
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->end_time = $request->end_time;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->category = $request->category; // Récupérer la catégorie du formulaire
        $event->type_evenement_id = $request->type; // Récupérer le type d'événement du formulaire
        $event->user_id = Auth::user()->id;

        $event->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Save data successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Delete data successfully'
        ]);
    }
}
