<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // prendere i tipi di progetto per la select
        $types = Type::all();
        // prendere le tecnologie per la checkbox
        $technologies = Technology::all();
        return view('projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newProject = new Project();

        $newProject->name = $data['name'];
        $newProject->client = $data['client'];
        $newProject->period = $data['period'];
        $newProject->description = $data['description'];
        $newProject->type_id = $data['type_id'];

        // controllo se l'utente ha chiesto l'upload di un'immagine
        if (array_key_exists("img", $data)) {
            // caricare l'immagine nello storage
            // assegnare il percorso e il nome dell'immagine ad un a variabile
            $img_url = Storage::putFile('projects', $data['img']);

            $newProject->img = $img_url;
        }

        // dd($data);

        $newProject->save();

        // verifichiamo se stiamo ricevendo le technologies
        if ($request->has('technologies')) {

            $newProject->technologies()->attach($data['technologies']);
        }

        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->technologies);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->name = $data['name'];
        $project->client = $data['client'];
        $project->period = $data['period'];
        $project->description = $data['description'];
        $project->type_id = $data['type_id'];

        if ($request->hasFile('img')) {
            // cancella solo se c'è una immagine precedente
            if ($project->img) {
                Storage::delete($project->img);
            }

            // caricare la nuova
            $img_url = Storage::putFile('projects', $data['img']);

            // aggiornare il db
            $project->img = $img_url;
        }

        $project->update();

        // verifichiamo se stiamo ricevendo le technologies
        if ($request->has('technologies')) {

            // sincronizzare i checkbox con i valori della tabella pivot
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->img) {
            Storage::delete($project->img);
        }

        $project->delete();

        return redirect()->route('projects.index');
    }
}
