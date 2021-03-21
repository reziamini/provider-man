<?php

namespace ProviderMan\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use ProviderMan\Models\Provider;

class Read extends Component
{
    use WithPagination;

    protected $listeners = ['providerCreated', 'providerUpdated', 'providerDeleted'];

    public function providerCreated()
    {
        //
    }

    public function providerUpdated()
    {
        //
    }

    public function providerDeleted()
    {
        //
    }

    public function render()
    {
        $providers = Provider::query()->orderByDesc('created_at')->paginate();

        return view('provider::livewire.read', ['providers' => $providers])
            ->layout('provider::base');
    }
    
}
