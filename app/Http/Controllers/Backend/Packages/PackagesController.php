<?php

namespace App\Http\Controllers\Backend\Packages;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Faqs\CreateFaqsRequest;
use App\Http\Requests\Backend\Faqs\DeleteFaqsRequest;
use App\Http\Requests\Backend\Faqs\ManageFaqsRequest;
use App\Http\Requests\Backend\Faqs\StorePackagesRequest;
use App\Http\Requests\Backend\Faqs\UpdateSupportRequest;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Packages;
use App\Models\Auth\User;
use App\Repositories\Backend\PackagesRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
class PackagesController extends Controller
{
    protected $repository;

    public function __construct(PackagesRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['packages']);
    }
    
    /**
     * @var \App\Repositories\Backend\PackagesRepository
     */

    public function index(ManageFaqsRequest $request)
    {
       
        $packages = Packages::all();
        return view('backend.packages.index')->with('packages',$packages);
    }

    public function create(CreateFaqsRequest $request)
    {
        return new ViewResponse('backend.packages.create');
    }

    public function store(StorePackagesRequest $request)
    {
       
        
        $this->repository->create($request->except('_token'));

        return new RedirectResponse(route('admin.packages.index'), ['flash_success' => __('Packages Created Sucessfully')]);
    }

    // public function edit($id)
    // {
        
    //     $supports = SupportRequest::find($id);
    //     $users = User::find($id);
    //     return view('backend.supports.ReplyForm')->with(['supports' => $supports , 'users'=> $users]);
    // }


    // public function update(SupportRequest $contact, UpdateSupportRequest $request)
    // {
    //     dd($request->all());
    //     $contact->update($request->all());
    //     return new RedirectResponse(url('admin/contacts/1/edit'), ['flash_success' => __('Contact Information Updated.')]);
    // }

    public function destroy($id)
    {
        // Find the package by ID
        $package = Packages::find($id);
    
        if (!$package) {
            // Handle the case where the package is not found
            return new RedirectResponse(route('admin.packages.index'), ['flash_error' => __('Packages not found')]);
        }
    
        // Soft delete the package (update the deleted_at field)
        // $package->delete();
        DB::update("UPDATE packages SET deleted_at = NOW() WHERE id = ?", [$id]);

    
        // Redirect with a success message
        return new RedirectResponse(route('admin.packages.index'), ['flash_success' => __('Packages deleted Sucessfully')]);
    }
    

}
