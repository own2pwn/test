<?php

namespace App\Models\Door;

use App\Models\DataTable;

class Search extends DataTable
{
    public function totalCount()
    {
        return Door::count();
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
        $query = Door::active();
        if ($this->search != null) {
            $query->where('name', 'LIKE', '%'.$this->search.'%');
        }
        return $query;
    }

    protected function constructOrder($query)
    {
        switch ($this->orderCol) {
            case 'id':
                $orderCol = 'id';
                break;
            case 'name':
                $orderCol = 'name';
                break;
            default:
                $orderCol = 'id';
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