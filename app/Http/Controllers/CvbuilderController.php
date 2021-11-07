<?php

namespace App\Http\Controllers;
use App\Models\Cvdetail;
use Illuminate\Http\Request;
use Auth;
use DB;
use File;
use PDF;
class CvbuilderController extends Controller
{
   
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index(){
        
        $cvs = DB::table('cvdetails')->where('created_by', Auth::user()->id)->first();
        // dd($cvs);
        return view('pdf',compact('cvs'));
       
    }
   
    public function store(Request $request)
    {
        // dd('heelo');
        $this->validate($request, [
            'name'=> 'required',
            'number' =>'required',
            'date' =>'required',
            'email' => 'required',
            'nation'=>'required',
            'file'=>'required',
            'gender' => 'required',
            'address' => 'required',
            'about' => 'required',
            'projects' => 'required',
            'collegeName' => 'required',
            'intermediate' => 'required',
            'intermediatestart' => 'required',
            'intermediateend' => 'required',
            'Universtyname' => 'required',
            'Bachelor' => 'required',
            'Universtystart' => 'required',
            'Universtyend' => 'required',
            'Company' => 'required',
            'Designation' => 'required',
            'Skills' => 'required',
          
        ]);
       


        $filess = $request->file;

      	$file = time() . str_replace(" ", "-", $filess->getClientOriginalName());

      	$filess->move('uploads/images', $file);

        // dd($filess);
        Cvdetail::create([
            'name' => $request->name,
            'number'=> $request->number,
            'date' => $request->date,
            'email' => $request->email,
            'nation' => $request->nation,
            'gender'=> $request->gender,
            'address'=> $request->address,
            'about'=> $request->about,
            'file'=> $file,
            'projects'=> $request->projects,
            'collegeName'=> $request->collegeName,
            'intermediate'=> $request->intermediate,
            'intermediatestart'=> $request->intermediatestart,
            'intermediateend'=> $request->intermediateend,
            'Universtyname'=> $request->Universtyname,
            'Bachelor'=> $request->Bachelor,
            'Universtystart'=> $request->Universtystart,
            'Universtyend'=> $request->Universtyend,
            'Company'=> $request->Company,
            'Designation'=> $request->Designation,
            'Skills'=> $request->Skills,
            'created_by'=> Auth::user()->id,     
        ]);
        return redirect('pdf');
    }

    public function edit(){

        $editcvs = DB::table('cvdetails')->where('created_by', Auth::user()->id)->first();
        // dd($editcvs);
        return view('editcv',compact('editcvs'));
    }

    public function update(Request $request ,$id){
        // dd($request);
        $this->validate($request, [
            'name'=> 'required',
            'number' =>'required',
            'date' =>'required',
            'email' => 'required',
            'nation'=>'required',
            
            'gender' => 'required',
            'address' => 'required',
            'about' => 'required',
            'projects' => 'required',
            'collegeName' => 'required',
            'intermediate' => 'required',
            'intermediatestart' => 'required',
            'intermediateend' => 'required',
            'Universtyname' => 'required',
            'Bachelor' => 'required',
            'Universtystart' => 'required',
            'Universtyend' => 'required',
            'Company' => 'required',
            'Designation' => 'required',
            'Skills' => 'required',
          
        ]);

        $category = Cvdetail::findOrFail($request->id);
        $file = $category->file;
        // dd($file);
        if ($request->has('file')) {
                $filess = $request->file;
                $images = Cvdetail::findOrFail($request->id);   
                $image_path = "uploads/images/$images->file";  
                if(File::exists($image_path)) {
                    File::delete($image_path);
                }
                $file = time() . str_replace(" ", "-", $filess->getClientOriginalName());
                $filess->move('uploads/images', $file);
        }
        $cvsss = Cvdetail::find($id);
        // dd($cvsss);
        $cvsss->update([
            'name' => $request->name,
            'number'=> $request->number,
            'date' => $request->date,
            'email' => $request->email,
            'nation' => $request->nation,
            'gender'=> $request->gender,
            'address'=> $request->address,
            'about'=> $request->about,
            'file'=> $file,
            'projects'=> $request->projects,
            'collegeName'=> $request->collegeName,
            'intermediate'=> $request->intermediate,
            'intermediatestart'=> $request->intermediatestart,
            'intermediateend'=> $request->intermediateend,
            'Universtyname'=> $request->Universtyname,
            'Bachelor'=> $request->Bachelor,
            'Universtystart'=> $request->Universtystart,
            'Universtyend'=> $request->Universtyend,
            'Company'=> $request->Company,
            'Designation'=> $request->Designation,
            'Skills'=> $request->Skills,
            'created_by'=> Auth::user()->id,     
        ]);
        return redirect('pdf');
    }

    public function generatePDF($id){
       
        // $pdf =\App::make('dompdf.wrapper');
        // $cvs = DB::table('cvdetails')->where('created_by', Auth::user()->id)->first();
        $cvs =  Cvdetail::find($id);

        $pdf = PDF::loadView('pdf', compact('cvs'))->setOptions(['defaultFont' => 'sans-serif' ,'isRemoteEnabled'=> true]);
        
        return $pdf->download('cv.pdf');
        // $pdf = PDF::loadView('pdf/personalpdf', compact('user','result'))->setOptions(['defaultFont' => 'sans-serif']);
        // $pdf = PDF::loadView('pdf', compact('cvs'));
    
        // return $pdf->download('cv.pdf');
    }

  


}

