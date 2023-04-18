<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     */
    public function index(Request $request)
    {
      $sort = (!empty($sort_request = $request->get('sort'))) ? $sort_request : "updated_at";
      $order = (!empty($order_request = $request->get('order'))) ? $order_request : "DESC";
      $projects = Project::orderBy($sort, $order)->paginate(10)->withQueryString();

      return view('admin.projects.index', compact('projects','sort', 'order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $data = $this->validation($request->all());
        // dd($data);
        if(Arr::exists($data, 'link')) {
          Storage::put('', $data['link']);
        }

        $project = new Project;        
        $project->fill($data);
        $project->save();

        return to_route('admin.projects.show', $project)
                ->with('message_type', 'alert-success')
                ->with('message_content', 'Progetto aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
      return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
      
      return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
      $data = $this->validation($request->all());
      $project->update($data);

      return redirect()->route('admin.projects.show', $project)
      ->with('message_type', 'alert-success')
      ->with('message_content', 'Progetto modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

      
      $project->delete();

      return to_route('admin.projects.index')
      ->with('message_type', 'alert-danger')
      ->with('message_content', 'Progetto eliminato correttamente');
    }
    
    private function validation($data) {
     $validator = Validator::make(
        $data,
        [
          'title' =>'required|string',
          'description' =>'required|string',
          'link' =>'required|image|mimes: jpg,png, jpeg',
        ],
        [
          'title.required' => 'Il nome del progetto è obbligatorio',
          'title.string' => 'Il nome del progetto deve essere una stringa',

          'description.required' => 'La descrizione del progetto è obbligatoria',
          'description.string' => 'La descrizione del progetto deve essere una stringa',

          'link.required' => 'Il link del progetto è obbligatorio',
          'link.image' => 'Il file caricato deve essere un immagine',
          'link.mimes' => 'le estenzioni dei file accettate sono: jpg, png, jpeg.',
        ]
        )->validate();
        return $validator;
    }
}