<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::paginate(5);
        return view('admin.projects.index', compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|unique:projects|string',
            'url' => 'required|unique:projects|url:http,https',
            'image' => 'string|nullable',
            'description' => 'string|nullable',
        ], [
            "title.required" => "Il titolo è mancante",
            "title.unique" => "Il titolo esiste già",
            "url.required" => "Il link è mancante",
            "url.unique" => "Il link esiste già",
            "url.url" => "Il link è sbagliato",
        ]);

        $new_project = new Project();
        $new_project->title = $request->title;
        $new_project->url = $request->url;
        $new_project->image = $request->image;
        $new_project->description = $request->description;
        $new_project->save();
        return to_route("admin.projects.index")->with('type', 'create')->with('message', 'Progetto creato con successo')->with('alert', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        return view("admin.projects.edit", compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $request->validate([
            'title' => ["required", "string", Rule::unique("projects")->ignore($project->id)],
            'url' =>  ["required", "url:http,https", Rule::unique("projects")->ignore($project->id)],
            'image' => 'string|nullable',
            'description' => 'string|nullable',
        ], [
            "title.required" => "Il titolo è mancante",
            "title.unique" => "Il titolo esiste già",
            "url.required" => "Il link è mancante",
            "url.unique" => "Il link esiste già",
            "url.url" => "Il link è sbagliato",
        ]);

        $project->title = $request->title;
        $project->image = $request->image;
        $project->url = $request->url;
        $project->description = $request->description;
        $project->save();
        return to_route('admin.projects.index')->with('type', 'update')->with('message', 'Progetto cancellato con successo')->with('alert', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();
        return to_route("admin.projects.index")->with('type', 'delete')->with('message', 'Progetto cancellato con successo')->with('alert', 'success');
    }
}
