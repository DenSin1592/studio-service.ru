<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\Features\ToggleFlags;
use App\Http\Controllers\Admin\Features\UpdatePositions;
use App\Http\Controllers\Controller;
use App\Models\TargetAudience;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\Copier\Core\CopierStaticFactory;
use App\Services\DataProviders\BaseDataProvider;
use App\Services\FormProcessors\BaseFormProcessor;
use App\Services\Repositories\BaseRepository;
use Illuminate\Http\RedirectResponse;

abstract class BaseEssenceController extends Controller
{
    use ToggleFlags;
    use UpdatePositions;

    protected const VIEW_INDEX = 'admin.essence.index';
    protected const VIEW_CREATE = 'admin.essence.create';
    protected const VIEW_EDIT = 'admin.essence.edit';

    protected BaseRepository $repository;
    protected BaseDataProvider $formDataProvider;
    protected BaseFormProcessor $formProcessor;
    protected Breadcrumbs $breadcrumbs;
    protected ?string $urlShowONSite = null;

    abstract protected function setDependencies(): void;


    public function __construct(Breadcrumbs $breadcrumbs){
        $this->setDependencies();
        $this->breadcrumbs = $breadcrumbs;
    }


    public function index()
    {
        $modelList = $this->repository->paginate();
        return view(self::VIEW_INDEX)
            ->with('modelList', $modelList)
            ->with('title', static::INDEX_TITLE)
            ->with('viewHeaderFieldName', static::VIEW_HEADER_FIELD_NAME)
            ->with('viewListName', static::VIEW_LIST)
            ->with($this->getRoutePaths())
            ;
    }


    public function create()
    {
        $model = $this->repository->newInstance();
        $formData = $this->formDataProvider->provideData($model, \Request::old());
        $breadcrumbs = $this->breadcrumbs->getFor(static::BREADCRUMBS_CREATE, $model);

        return \View(self::VIEW_CREATE)
            ->with('formData', $formData)
            ->with('essenceName', static::ESSENCE_NAME)
            ->with('breadcrumbs', $breadcrumbs)
            ->with('viewFormFieldsName', static::VIEW_FORM_FIELDS)
            ->with($this->getRoutePaths())
            ;
    }


    public function store()
    {
        $model = $this->formProcessor->create(\Request::except('redirect_to'));
        if (is_null($model))
            return \Redirect::route(static::ROUTE_CREATE)->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') === 'index') {
            $redirect = \Redirect::route(static::ROUTE_INDEX);
        } else {
            $redirect = \Redirect::route(static::ROUTE_EDIT, [$model->id]);
        }

        return $redirect->with('alert_success', trans(static::CREATE_MESSAGE));
    }


    public function edit($id)
    {
        $model = $this->repository->findByIdOrFail($id);
        if($model instanceof TargetAudience && $model->parent_id === null){
            $this->urlShowONSite = null;
        }

        $formData = $this->formDataProvider->provideData($model, old());
        $breadcrumbs = $this->breadcrumbs->getFor(static::BREADCRUMBS_EDIT, $model);

        return \View(self::VIEW_EDIT)
            ->with('formData', $formData)
            ->with('essenceName', static::ESSENCE_NAME)
            ->with('breadcrumbs', $breadcrumbs)
            ->with('viewFormFieldsName', static::VIEW_FORM_FIELDS)
            ->with('urlShowOnSite', $this->urlShowONSite)
            ->with($this->getRoutePaths())
            ;
    }


    public function update($id)
    {
        $model = $this->repository->findByIdOrFail($id);
        $success = $this->formProcessor->update($model ,\Request::except('redirect_to'));
        if (!$success)
            return \Redirect::route(static::ROUTE_EDIT, [$model->id])
                ->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') === 'index') {
            $redirect = \Redirect::route(static::ROUTE_INDEX);
        } else {
            $redirect = \Redirect::route(static::ROUTE_EDIT, [$model->id]);
        }
        return $redirect->with('alert_success', trans(static::EDIT_MESSAGE));
    }


    public function destroy($id)
    {
        $model = $this->repository->findByIdOrFail($id);
        if (is_null($model)) {
            \App::abort(404, 'Essence not found');
        }
        $this->repository->delete($model);

        return \Redirect::route(static::ROUTE_INDEX)->with('alert_success', static::DESTROY_MESSAGE);
    }


    public function copy($id): RedirectResponse
    {
        $model = $this->repository->findByIdOrFail($id);
        $copier = CopierStaticFactory::build($model::class);
        $copyModel = $copier->copy($model);

        return \Redirect::route(static::ROUTE_EDIT, $copyModel->id)->with('alert_success', trans('Успешно скопировано!'));
    }


    protected function getRoutePaths(): array
    {
        $routePaths = [
            'routeIndex' => static::ROUTE_INDEX,
            'routeCreate' => static::ROUTE_CREATE,
            'routeStore' => static::ROUTE_STORE,
            'routeEdit' => static::ROUTE_EDIT,
            'routeUpdate' => static::ROUTE_UPDATE,
            'routeDestroy' => static::ROUTE_DESTROY,
            'routeUpdatePosition' => static::ROUTE_UPDATE_POSITIONS,
            'routeToggleAttribute' => static::ROUTE_TOGGLE_ATTRIBUTE,
        ];

        try {
            $routePaths['routeCopy'] = static::ROUTE_COPY;
        }catch (\Error $e){
            if(stripos($e->getMessage(), 'Undefined constant') === false) {
                throw $e;
            }
        }

        return $routePaths;

//        $oClass = (new ReflectionClass(static::class))->getConstants();
//        $oClass = resolve(ReflectionClass::class, ['objectOrClass' => static::class])->getConstants();
//        dd($oClass);
//        В следующий раз буду парсить константы потомка
    }
}
