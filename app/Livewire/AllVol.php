<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Volunteer;
use Livewire\WithPagination;


class AllVol extends Component 
{
    use WithPagination ;

    protected  $pagination_theme = 'bootstrap';

    public $search='';
    public $status='';
    public $num=(10);
    

    protected $queryString =['search','status','num'];

    public function updatingsearch()
    {
        $this->resetPage();
    }


    protected function vols()
    {
        return $this->status === ''
            ? Volunteer::where(
                function($search) {
                return $search
                        ->where('name','like' , '%' . $this->search .'%')
                        ->orWhere('phone','like' , '%' . $this->search .'%');
                })->paginate($this->num)
            : Volunteer::where('status',$this->status )
            ->where(
                function($search) {
                return $search
                        ->where('name','like' , '%' . $this->search .'%')
                        ->orWhere('phone','like' , '%' . $this->search .'%');
                })
            ->paginate($this->num);
            
    }


    public function render()
    {
        return view('livewire.all-vol', ['vols' => $this->vols()]);
    }
}
