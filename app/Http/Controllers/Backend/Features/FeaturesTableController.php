<?php

namespace App\Http\Controllers\Backend\Features;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Faqs\ManageFeaturesRequest;
use App\Repositories\Backend\FeaturesRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class FeaturesTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\FeaturesRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\FeaturesRepository $faqs
     */
    public function __construct(FeaturesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Faqs\ManageFeaturesRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageFeaturesRequest $request)
    {
        // dd(';sa');
        return Datatables::of($this->repository->getForDataTable())
            ->escapeColumns(['name'])
           
            ->editColumn('localization', function ($features) {
                return $features->localization;
            })
            ->editColumn('created_at', function ($features) {
                return Carbon::parse($features->created_at)->toDateString();
            })
            ->addColumn('actions', function ($features) {
                return $features->action_buttons;
            })
            ->make(true);
    }
}
