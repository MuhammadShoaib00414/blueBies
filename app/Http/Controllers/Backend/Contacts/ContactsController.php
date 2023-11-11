<?php

namespace App\Http\Controllers\Backend\Contacts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Faqs\CreateFaqsRequest;
use App\Http\Requests\Backend\Faqs\DeleteFaqsRequest;
use App\Http\Requests\Backend\Faqs\ManageFaqsRequest;
use App\Http\Requests\Backend\Faqs\StoreFaqsRequest;
use App\Http\Requests\Backend\Faqs\UpdateContactRequest;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Contacts;
use App\Models\Faq;
use App\Repositories\Backend\FaqsRepository;
use Illuminate\Support\Facades\View;

class ContactsController extends Controller
{
    /**
     * @var \App\Repositories\Backend\FaqsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\FaqsRepository $faq
     */
   
    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return ViewResponse
     */
  

    public function edit(Contacts $contact, ManageFaqsRequest $request)
    {
      
        return new ViewResponse('backend.contacts.edit', ['contact' => $contact]);
    }


    public function update(Contacts $contact, UpdateContactRequest $request)
    {
        // dd($request->all());
        $contact->update($request->all());
        return new RedirectResponse(url('admin/contacts/1/edit'), ['flash_success' => __('Contact Information Updated.')]);
    }

  

}
