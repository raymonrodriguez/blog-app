<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Builder;
trait ApiTrait
{

    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return;
        }
        $relations = explode(',', request('included'));

        $allowIncluded = collect($this->allowIncluded);

        foreach ($relations as $key => $relationship) {
            if (!$allowIncluded->contains($relationship)) {
                unset($relations[$key]);
            }
        }
        $query->with($relations);
    }

    public function scopeFilter(Builder $query)
    {
        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }
        $filters = request('filter');

        $allowfilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {
            if ($allowfilter->contains($filter)) {
                $query->where($filter, 'LIKE', '%' . $value . '%');
            }
        }
    }

    public function scopeSort(Builder $query)
    {
        if (empty($this->allowSort) || empty(request('sort'))) {
            return;
        }
        $sortFields =  explode(',', request('sort'));
        $allowsort = collect($this->allowSort);

        foreach ($sortFields as $sortfield) {

            $direction = 'asc';

            if (substr($sortfield, 0, 1) == '-') {

                $direction = 'desc';
                $sortfield =  substr($sortfield, 1);
            }

            if ($allowsort->contains($sortfield)) {
                $query->orderBy($sortfield, $direction);
            }
        }
    }

    public function scopegetOrpaginate(Builder $query)
    {
        if (request('perPage')) {
            $perPage =  intval(request('perPage'));
            if ($perPage) {
                return $query->paginate($perPage);
            }
        }
        return $query->get();
    }

}



?>
