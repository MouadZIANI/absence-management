<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;
use Session;
use Auth;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $authUser = Auth::user();

        if($authUser->is_admin) {
            $absences = Absence::paginate(20);
        } else {
            $teacher = Teacher::where('user_id', $authUser->id)->get();
            $absences = Absence::paginate(20);
        }


        return view('absences.index', compact('absences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes = Group::all();
        $branches = Branch::all();
        return view('students.create', compact('groupes', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* validate the data */
        $this->validate($request , array(
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:students',
            'tel' => 'required|nullable|regex:/[0-9]{9}/',
            'group_id' => 'required',
            'branch_id' => 'required',
        ));

        Student::create($request->all());
        Session::flash('success', 'L\'etudiant a été enregistré avec succès!');
        
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $absences = $student->absenceDetails()->get();
        return view('students.show', compact('student', 'absences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $groupes = Group::all();
        $branches = Branch::all();
        return view('students.edit', compact('groupes', 'branches', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        /* validate the data */
        $this->validate($request , array(
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => "required|string|email|max:255|unique:students,email,$student->id,id",
            'tel' => 'required|nullable|regex:/[0-9]{9}/',
            'group_id' => 'required',
            'branch_id' => 'required',
        ));

        $student->first_name = $request->first_name;        
        $student->last_name = $request->last_name;        
        $student->email = $request->email;        
        $student->tel = $request->tel;        
        $student->group_id = $request->group_id;        
        $student->branch_id = $request->branch_id;        
        $student->save();        

        Session::flash('success', 'L\'etudiant a été modifier avec succès!');
        
        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absence $absence)
    {
        $absence->delete();
        Session::flash('success', 'L\'absence a été supprimé avec succès!');
        
        return redirect()->route('absence.index');
    }

    /**
     * Display a listing result of searche.
     *
     * @return \Illuminate\Http\Response
     */
    public function searche(Request $request)
    {
        $students = Student::where('first_name', $request->searched_query)
                            ->orWhere('last_name', $request->searched_query)
                            ->orWhere('email', $request->searched_query)
                            ->orWhere('tel', $request->searched_query)
                            ->get();
        return view('students.searche', compact('students'));
    }
}
