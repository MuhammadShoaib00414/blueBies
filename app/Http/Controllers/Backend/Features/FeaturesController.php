<?php

namespace App\Http\Controllers\Backend\Features;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Faqs\CreateFaqsRequest;
use App\Http\Requests\Backend\Faqs\DeleteFaqsRequest;
use App\Http\Requests\Backend\Faqs\ManageFeaturesRequest;
use App\Http\Requests\Backend\Faqs\StoreFaqsRequest;
use App\Http\Requests\Backend\Faqs\UpdateFaqsRequest;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Faq;
use App\Models\Features;
use App\Models\Packages;
use App\Repositories\Backend\FeaturesRepository;
use App\Repositories\Backend\FaqsRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeaturesController extends Controller
{
    /**
     * @var \App\Repositories\Backend\FaqsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\FaqsRepository $faq
     */
    public function __construct(FeaturesRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['features']);
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFeaturesRequest $request
     *
     * @return ViewResponse
     */
   
    public function index()
    {
       
        $features = Features::all();
        return view('backend.features.index')->with('features',$features);
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\CreateFaqsRequest $request
     *
     * @return ViewResponse
     */
    public function create(CreateFaqsRequest $request)
    {
        $package = Packages::get();
      
        return new ViewResponse('backend.features.create', ['packages' => $package]);
   
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\StoreFaqsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(Request $request)
    {
      
        $feature = new Features; // Replace 'YourModel' with your actual model name

        // Set the attributes on the model instance
        $feature->name = $request->name;
        $feature->localization = $request->localization;
        $feature->selectedpackage = json_encode($request->selectedpackage);

        // Save the model instance to the database
        $feature->save();
        

        $selectedPackages = $request->selectedpackage; // Get the selected package IDs from the request

         $feature->packages()->attach($selectedPackages); // Use 'attach' to add the packages

         return redirect()->route('admin.features.index')->with('flash_success', __('Package of Feature is created successfully.'));

        // return redirect (route('admin.features.index'), ['flash_success' => __('Package of Feature is created successfully.')]);
    }

    /**
     * @param \App\Models\Faq $faq
     * @param \App\Http\Requests\Backend\Faqs\ManagePageRequest $request
     *
     * @return ViewResponse
     */
    public function edit(Faq $faq, ManageFaqsRequest $request)
    {
        return new ViewResponse('backend.faqs.edit', ['faq' => $faq]);
    }

    /**
     * @param \App\Models\Faq $faq
     * @param \App\Http\Requests\Backend\Faqs\UpdateFaqsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Faq $faq, UpdateFaqsRequest $request)
    {
        $this->repository->update($faq, $request->except(['_token', '_method']));

        return new RedirectResponse(route('admin.faqs.index'), ['flash_success' => __('alerts.backend.faqs.updated')]);
    }

    /**
     * @param \App\Models\Faq $faq
     * @param \App\Http\Requests\Backend\Pages\DeleteFaqRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the package by ID
        $package = Features::find($id);
    
        if (!$package) {
            // Handle the case where the package is not found
            return new RedirectResponse(route('admin.features.index'), ['flash_error' => __('Feature not found')]);
        }
    
        // Soft delete the package (update the deleted_at field)
        // $package->delete();
        DB::update("UPDATE features SET deleted_at = NOW() WHERE id = ?", [$id]);

    
        // Redirect with a success message
        return new RedirectResponse(route('admin.features.index'), ['flash_success' => __('Package Feature deleted Sucessfully')]);
    }

    public function ContactInfo(ManageFaqsRequest $request)
    {
        dd('test');
        return new ViewResponse('backend.faqs.index');
    }
}
