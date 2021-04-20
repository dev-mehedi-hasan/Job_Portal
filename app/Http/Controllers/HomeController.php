<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\job;

class HomeController extends Controller
{

    public function index()
    {
        $url='http://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=4dd41a97cf324a6388bfcc7a6e77c6d8';
        $response= file_get_contents($url);
        $newsdata=json_decode($response);
        $newsdata= $newsdata->articles;

        $recent_job = Job::orderBy('id', 'desc')->paginate(2);
        $full_time_job = Job::where('employment_status', 'Full Time')->orderBy('id', 'desc')->paginate(2);
        $part_time_job = Job::where('employment_status', 'Part Time')->orderBy('id', 'desc')->paginate(2);
        $internship = Job::where('employment_status', 'Internship')->orderBy('id', 'desc')->paginate(2);

        return view('index', compact('newsdata','recent_job','full_time_job','part_time_job','internship'));
    }

    public function search(Request $request)
    {
        if ($request->search_keyword !== null)
        {
            $search_job=Job::where('office_name', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('position', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('description', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('vacancy', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('responsibilities', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('skill_name', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('required_education', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('employment_status', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('salary', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('other_benifits', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('location', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('dead_line', 'LIKE', '%' . $request->search_keyword . '%')
                            ->orWhere('created_at', 'LIKE', '%' . $request->search_keyword . '%')
                            ->paginate(5);
        }
        return view('pages.circular.search-result', compact('search_job'));
    }

    public function graphics_design()
    {
        return view('pages.training.graphics-design');
    }

    public function digital_marketing()
    {
        return view('pages.training.digital-marketing');
    }

    public function contact()
    {
        return view('pages.contact');
    }

}
