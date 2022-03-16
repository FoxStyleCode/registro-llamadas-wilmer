<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Llamada;
use App\Exports\CallerExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class Index extends Component
{

    use WithPagination;

    public $municipality;
    public $type;
    public $caller_name;
    public $reason;
    public $detail;
    public $call_answer;
    public $call_answer_by;
    public $llamada_id;
    public $isModalOpen = 0;

    public function render()
    {
        return view('livewire.index', ['llamadas' => Llamada::paginate(2)]);
    }

    protected $rules = [
        'municipality' => 'required',
        'type'=> 'required',
        'caller_name'  => 'required',
        'detail'  => 'required',
        'reason'  => 'required',
        'call_answer'  => 'required',
        'call_answerBy'  => 'required',
    ]; 

    public function submit(){

        $this->validate();

        $model = Llamada::updateOrCreate(['id' => $this->llamada_id], [
            'municipality' => $this->municipality,
            'type' => $this->type,
            'caller_name' => $this->caller_name,
            'detail' => $this->detail,
            'reason' => $this->reason,
            'call_answer' => $this->call_answer,
            'call_answer_by' => $this->call_answerBy
        ]);
        
        $model->save();

        $this->resetCreateForm();

        session()->flash('message', $this->llamada_id ? 'Registro de llamada actualizado correctamente.' : 'Registro de llamada creado correctamente.');

        $this->closeModalPopover();
    }


    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;

    }
    
    public function edit($id)
    {
        $llamada = Llamada::findOrFail($id);
        $this->llamada_id = $id;
        $this->municipality = $llamada->municipality;
        $this->type = $llamada->type;
        $this->caller_name = $llamada->caller_name;
        $this->detail = $llamada->detail;
        $this->reason = $llamada->reason;
        $this->call_answer = $llamada->call_answer;
        $this->call_answer_by = $llamada->call_answer_by;
    
        $this->openModalPopover();

    }

    private function resetCreateForm(){
        $this->llamada_id = '';
        $this->municipality = '';
        $this->type = '';
        $this->caller_name = '';
        $this->detail = '';
        $this->reason = '';
        $this->call_answer = '';
        $this->call_answer_by = $this->call_answerBy = Auth::user()->name;
    }

    public function delete($id)
    {
        Llamada::find($id)->delete();
        session()->flash('message', 'Llamada eliminada correctamente.');
    }

    public function exports(){

        return Excel::download(new CallerExport, 'users.xlsx');

    }

}
