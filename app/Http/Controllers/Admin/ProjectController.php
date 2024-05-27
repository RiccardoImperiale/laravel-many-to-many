<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();

        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        $img_path = Storage::put('uploads', $request->image);
        $val_data['image'] = $img_path;


        Project::create($val_data);

        return to_route('admin.projects.index')->with('message', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // $type = Type::find($project->id);

        // $project['type_id'] = $project->type->id;

        // dd($project);


        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();

        $slug = Str::slug($request->title, '-');
        $val_data['slug'] = $slug;

        if ($request->has('image')) {
            if ($project->image) {
                Storage::delete($project->image);
            }

            $img_path = Storage::put('uploads', $request->image);
            $val_data['image'] = $img_path;
        }

        $project->update($val_data);

        return to_route('admin.projects.index', $project)->with('message', "Project $project->title updated successfully");
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }

        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project deleted successfully');
    }
}
