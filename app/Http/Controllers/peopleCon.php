<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\people;
use App\department;
use App\otdel;

class peopleCon extends Controller
{
	
    public function index()
    {
        $peodatas = people::latest()->paginate(5);
        return view('peopledate.index', compact('peodatas'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    public function create()
    {
        $deperdatas = department::latest()->paginate(5);
        $otdeldates = otdel::latest()->paginate(5);
        return view('peopledate.create', compact('deperdatas'), compact('otdeldates'));
    }

    public function store(Request $request)
    {
        $request->validate([
    		'name' => 'required',
    		'phone_number' => 'required',
    		'email' => 'required',
    		'address' => 'required',
    		'Dep_name' => 'required',
    		'otd_name' => 'required'
        ]);

        people::create($request->all());
        return redirect()->route('people.index')
                        ->with('success', 'new people created successfully');
    }

  
    public function edit($id)
    {
        $peodata = people::find($id);
        $deperdatas = department::latest()->paginate(5);
        $otdeldates = otdel::latest()->paginate(5);
        return view('peopledate.edit', compact('peodata', 'deperdatas', 'otdeldates'));
    }


    public function update(Request $request, $id)
    {
          $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'address' => 'required',
            'Dep_name' => 'required',
            'otd_name' => 'required'
          ]);

          $peopledate = people::find($id);
          $peopledate->name = $request->get('name');
          $peopledate->phone_number = $request->get('phone_number');
          $peopledate->email = $request->get('email');
          $peopledate->address = $request->get('address');
          $peopledate->Dep_name = $request->get('Dep_name');
          $peopledate->otd_name = $request->get('otd_name');
          $peopledate->save();
          return redirect()->route('people.index')
                          ->with('success', 'Department updated successfully');
    }


    public function destroy($id)
    {
        $peodatas = people::find($id);
        $peodatas->delete();
        return redirect()->route('people.index')
                        ->with('success', 'Biodata siswa deleted successfully');
    }
}
