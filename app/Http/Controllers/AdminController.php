<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Diary $diary)
    {
        return view('admin/index')->with(['diaries' => $diary->getByDate()]);
    }
    
    public function delete(Diary $diary)
    {
        $diary->delete();
        return redirect('admin/index');
    }
}
