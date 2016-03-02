<?php

namespace App\Models\Auto;

use App\Models\DataTable;

class Search extends DataTable
{
    public function totalCount()
    {
        return Auto::count();
    }

    public function filteredCount()
    {
        $query = $this->constructQuery();
        return $query->count();
    }

    public function search()
    {
        $query = $this->constructQuery();
        $this->constructOrder($query);
        $this->constructLimit($query);
        return $query->get();
    }

    protected function constructQuery()
    {
        $query = Auto::select('autos.id', 'autos.year', 'marks.name AS mark_name', 'models.name AS model_name')
            ->leftJoin('marks', function($query) {
                $query->on('marks.id', '=', 'autos.mark_id')->where('marks.show_status', '=', Auto::STATUS_ACTIVE);
            })
            ->leftJoin('models', function($query) {
                $query->on('models.id', '=', 'autos.model_id')->where('models.show_status', '=', Auto::STATUS_ACTIVE);
            })
            ->where('autos.show_status', Auto::STATUS_ACTIVE);
        if ($this->search != null) {
            $query->where('autos.year', $this->search)
                ->orWhere('marks.name', 'LIKE', '%'.$this->search.'%')
                ->orWhere('models.name', 'LIKE', '%'.$this->search.'%');
        }
        return $query;
    }

    protected function constructOrder($query)
    {
        switch ($this->orderCol) {
            case 'mark_name':
                $orderCol = 'marks.name';
                break;
            case 'model_name':
                $orderCol = 'models.name';
                break;
            case 'year':
                $orderCol = 'autos.year';
                break;
            default:
                $orderCol = 'autos.id';
        }
        $orderType = 'desc';
        if ($this->orderType == 'asc') {
            $orderType = 'asc';
        }
        $query->orderBy($orderCol, $orderType);
    }

    protected function constructLimit($query)
    {
        $query->skip($this->start)->take($this->length);
    }
}