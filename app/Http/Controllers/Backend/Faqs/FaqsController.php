<?php

namespace App\Http\Controllers\Backend\Faqs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Faqs\CreateFaqsRequest;
use App\Http\Requests\Backend\Faqs\DeleteFaqsRequest;
use App\Http\Requests\Backend\Faqs\ManageFaqsRequest;
use App\Http\Requests\Backend\Faqs\StoreFaqsRequest;
use App\Http\Requests\Backend\Faqs\UpdateFaqsRequest;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Faq;
use App\Repositories\Backend\FaqsRepository;
use Illuminate\Support\Facades\View;

class FaqsController extends Controller
{
    /**
     * @var \App\Repositories\Backend\FaqsRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\FaqsRepository $faq
     */
    public function __construct(FaqsRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['faqs']);
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFaqsRequest $request
     *
     * @return ViewResponse
     */
    public function index(ManageFaqsRequest $request)
    {
        return new ViewResponse('backend.faqs.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\CreateFaqsRequest $request
     *
     * @return ViewResponse
     */
    public function create(CreateFaqsRequest $request)
    {
        return new ViewResponse('backend.faqs.create');
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\StoreFaqsRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreFaqsRequest $request)
    {
        // Get all input data from the request
        $requestData = $request->all();
    
        // Create an empty array to store the localized data
        $localizedData = [];

        // Loop through the provided localization array
        foreach ($requestData['localization'] as $index => $language) {
            // Use language code as key (assuming the language code is available)
            $languageCode = 'ar'; // Replace 'ar' with the actual language code
            $localizedData[$languageCode] = [
                'name' => $requestData['localization'][0],
                'answer' => $requestData['localization'][1],
                // Add other fields as needed
            ];
        }
    
        // Convert the localized data to JSON
        $localizedDataJson = json_encode($localizedData);
    
        // Update the request data with the JSON representation
        $requestData['localization'] = $localizedDataJson;
    
        // Create the FAQ using the updated request data
        $this->repository->create($requestData);
    
        return new RedirectResponse(route('admin.faqs.index'), ['flash_success' => __('alerts.backend.faqs.created')]);
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
        // Get all input data from the request
        $requestData = $request->all();
    
        // Create an empty array to store the localized data
        $localizedData = [];
    
        // Loop through the provided localization array
        foreach ($requestData['localization'] as $index => $language) {
            // Use language code as key (assuming the language code is available)
            $languageCode = 'ar'; // Replace 'ar' with the actual language code
            $localizedData[$languageCode] = [
                'name' => $requestData['localization'][0],
                'answer' => $requestData['localization'][1],
                // Add other fields as needed
            ];
        }
    
        // Convert the localized data to JSON
        $localizedDataJson = json_encode($localizedData);
    
        // Update the request data with the JSON representation
        $requestData['localization'] = $localizedDataJson;
    
        // Update the FAQ using the updated request data
        $this->repository->update($faq, $requestData);
    
        return new RedirectResponse(route('admin.faqs.index'), ['flash_success' => __('alerts.backend.faqs.updated')]);
    }
    

    /**
     * @param \App\Models\Faq $faq
     * @param \App\Http\Requests\Backend\Pages\DeleteFaqRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Faq $faq, DeleteFaqsRequest $request)
    {
        $this->repository->delete($faq);

        return new RedirectResponse(route('admin.faqs.index'), ['flash_success' => __('alerts.backend.faqs.deleted')]);
    }

    public function ContactInfo(ManageFaqsRequest $request)
    {
        dd('test');
        return new ViewResponse('backend.faqs.index');
    }
}
