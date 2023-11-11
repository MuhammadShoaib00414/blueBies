<?php

namespace App\Http\Controllers\Backend\Partners;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Pages\CreatePageRequest;
use App\Http\Requests\Backend\Pages\DeletePageRequest;
use App\Http\Requests\Backend\Pages\EditPageRequest;
use App\Http\Requests\Backend\Pages\ManagePageRequest;
use App\Http\Requests\Backend\Pages\StorePartneRequest;
use App\Http\Requests\Backend\Pages\UpdatePageRequest;
use App\Http\Responses\Backend\Page\EditResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\Partners;
use App\Repositories\Backend\PartnersRepository;
use Illuminate\Support\Facades\View;
use Request;

class PartnersController extends Controller
{
    /**
     * @var \App\Repositories\Backend\PartnersRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PagesRepository $repository
     */
    public function __construct(PartnersRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['partners']);
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\ManagePageRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index()
    {
        $partner = Partners::first(); // Assuming "Partners" is your Eloquent model for partners


        return new ViewResponse('backend.partners.create', compact('partner'));
    }


    /**
     * @param \App\Http\Requests\Backend\Pages\CreatePageRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(CreatePageRequest $request)
    {
        return new ViewResponse('backend.partners.create');
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\StorePartneRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(StorePartneRequest $request)
    {
       
        $id = $request->input('id');
       
        // Ensure the "partners" directory exists for image uploads.
        $partnerDirectory = public_path('uploads/partners');
        if (!is_dir($partnerDirectory)) {
            mkdir($partnerDirectory, 0777, true);
        }

        $uploadedFiles = $request->file('images');
        $imagePaths = []; // Define $imagePaths before the if block
    
        if ($uploadedFiles != null) {
            foreach ($uploadedFiles as $uploadedFile) {
                $fileName = $uploadedFile->getClientOriginalName();
                $uploadedFile->move($partnerDirectory, $fileName);
                $imagePaths[] = 'uploads/partners/' . $fileName;
            }
        }
        // Process and move the uploaded images to the "partners" directory.
        
        // Load the existing Partners model.
        $data = Partners::find($id);

        // Update attributes based on the request.
        $data->user_id = 1;
        $data->title = $request->input('title');
        $data->heading = $request->input('heading');
        $data->status = 0;

        // Combine the new and previous image paths.
        $existingImagePaths = json_decode($data->images, true);
        $combinedImagePaths = array_merge($existingImagePaths ?? [], $imagePaths);

        $data->images = json_encode($combinedImagePaths);
        $data->localization = json_encode([
            'ar' => [
                'title' => isset($request->input('localization')['ar']['title']) ? $request->input('localization')['ar']['title'] : null,
                'heading' => isset($request->input('localization')['ar']['heading']) ? $request->input('localization')['ar']['heading'] : null,
            ]
        ,],JSON_UNESCAPED_UNICODE);

        // $data->localization  = json_encode(, JSON_UNESCAPED_UNICODE);; 

        // Save the updated record.
        $data->save();

    // You can return a success response or redirect to a success page.
        return redirect()->route('admin.partners.index')->with('flash_success', __('alerts.backend.pages.updated'));
    }

    
    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\EditPageRequest $request
     *
     * @return \App\Http\Responses\Backend\Blog\EditResponse
     */
    public function edit(Page $page, EditPageRequest $request)
    {
        return new EditResponse($page);
    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\UpdatePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    // public function update(Page $page, UpdatePageRequest $request)
    // {
    //     $this->repository->update($page, $request->except(['_token', '_method']));

    //     return new RedirectResponse(route('admin.pages.index'), ['flash_success' => __('alerts.backend.pages.updated')]);
    // }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\DeletePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Page $page, DeletePageRequest $request)
    {
        $this->repository->delete($page);

        return new RedirectResponse(route('admin.pages.index'), ['flash_success' => __('alerts.backend.pages.deleted')]);
    }
}
