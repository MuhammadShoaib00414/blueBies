<?php

namespace App\Http\Controllers\Backend\Supports;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Faqs\CreateFaqsRequest;
use App\Http\Requests\Backend\Faqs\DeleteFaqsRequest;
use App\Http\Requests\Backend\Faqs\ManageFaqsRequest;
use App\Http\Requests\Backend\Faqs\StoreFaqsRequest;
use App\Http\Requests\Backend\Faqs\UpdateSupportRequest;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\SupportRequest;
use App\Models\Auth\User;
use App\Repositories\Backend\FaqsRepository;
use Illuminate\Support\Facades\View;

class SupportsController extends Controller
{
    /**
     * @var \App\Repositories\Backend\FaqsRepository
     */

    public function index(ManageFaqsRequest $request)
    {
        $supports = SupportRequest::all();
        return view('backend.supports.index')->with('supports',$supports);
    }

    public function edit($id)
    {
        
        $supports = SupportRequest::find($id);
        $users = User::find($id);
        return view('backend.supports.ReplyForm')->with(['supports' => $supports , 'users'=> $users]);
    }


    public function update(SupportRequest $contact, UpdateSupportRequest $request)
    {
        dd($request->all());
        $contact->update($request->all());
        return new RedirectResponse(url('admin/contacts/1/edit'), ['flash_success' => __('Contact Information Updated.')]);
    }

  

}
