<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\department;

class deperCon extends Controller
{
	
  public function index() {
    		 $deperdatas = department::latest()->paginate(5);
    		 return view('depdata.index', compact('deperdatas'))
                      ->with('i', (request()->input('page',1) -1)*5);
	}
	
	
	public function create() {
        return view('depdata.create');
  }
	
	public function store(Request $request)
  {

        $request->validate([
		        'name' => 'required'
        ]);

        department::create($request->all());
        return redirect()->route('deper.index')
                        ->with('success', 'new department created successfully');
  }
	
	public function destroy($id)
  {
        $deperdata = department::find($id);
        $deperdata->delete();
        return redirect()->route('deper.index')
                        ->with('success', 'Department deleted successfully');
  }
	
	
	public function edit($id)
  {
        $deperdata = department::find($id);
        return view('depdata.edit', compact('deperdata'));
  }
	
	public function update(Request $request, $id)
  {
      $request->validate([
        'name' => 'required'
      ]);
      $deperdata = department::find($id);
      $deperdata->name = $request->get('name');
      $deperdata->save();
      return redirect()->route('deper.index')
                      ->with('success', 'Department updated successfully');
  }



}


