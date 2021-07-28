<?php


namespace App\Services\Repositories\TargetAudience\ServiceTask;


use App\Models\ServiceTask;
use App\Services\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ServiceTaskRepository extends BaseRepository
{
    protected function setModel(): void
    {
        $this->model = new ServiceTask();
    }

    public function allForModel(Model $model)
    {
        return $model->tasks()->get();
    }

    protected function getRelation(Model $model)
    {
        return $model->service();
    }

    public function createOrUpdateImageForModel(Model $model, array $data = [])
    {
        $id = \Arr::get($data, 'id');
        $image = $model->tasks()->where('id', $id)->first();
        if (is_null($image)) {
            $image = $this->getModel();
            $this->getRelation($image)->associate($model);
        }

        if (\Arr::get($data, 'position') === null) {
            $maxPosition = $model->tasks()->max('position');
            if (is_null($maxPosition)) {
                $maxPosition = 0;
            }
            $data['position'] = $maxPosition + 10;
        }

        $image->fill($data);
        if ($image->isDirty()) {
            $model->touch();
        }
        $image->save();

        return $image;
    }


    public function deleteById($id): void
    {
        $image = $this->findById($id);
        if (!is_null($image)) {
            $this->getRelation($image)->first()->touch();
            $image->delete();
        }
    }
}
