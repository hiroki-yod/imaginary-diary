<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DiaryRequest;
use App\Models\Diary;
use App\Events\DiaryWrited;
use Inertia\Inertia;

class DiaryController extends Controller
{
    public function top(Diary $diary, Request $request)
    {
        $page_number = $request->page;
        return Inertia::render('top', [
            'diaries' => $diary->getByDate(),
            'pageNumber' => $page_number,
        ]);
    }

    public function index(Diary $diary)
    {
        return view('index')->with(['diaries' => $diary->getByDate()]);
    }

    // Vue.jsを使おうとした残骸
    // public function index(Diary $diary)
    // {
    //     return Inertia::render('Index',['diaries' => $diary->get()]);
    // }

    public function show(Diary $diary)
    {
        return view('show')->with(['diary' => $diary]);
    }

    public function create()
    {
        return Inertia::render('Create');
    }

    public function store(DiaryRequest $request, Diary $diary)
    {
        $input = $request->all();
        $input += ['user_id' => $request->user()->id];
        $diary->fill($input)->storeImage()->save();
        event(new DiaryWrited($diary));
        $page = Diary::where('year', '<', $diary->year)->count();
        $page += Diary::where('year', $diary->year)->where('month', '<', $diary->month)->count();
        $page += Diary::where('year', $diary->year)->where('month', $diary->month)->where('day', '<', $diary->day)->count();
        return redirect()->route('index', ['page' => $page]);
    }

    public function random()
    {
        $diaries = Diary::all()->pluck('id')->toArray();
        return redirect("/diary/".$diaries[(array_rand($diaries))]);
    }
}
