<?php


namespace ProviderMan\Http\Livewire;


use Illuminate\Validation\Rule;
use Livewire\Component;
use ProviderMan\Models\Provider;
use ProviderMan\Rules\CheckClassNamespace;

class Single extends Component
{
    public $provider, $class, $name, $enable, $provider_id;

    public function mount(Provider $provider)
    {
        $this->provider = $provider;
        $this->name = $provider->name;
        $this->class = $provider->class;
        $this->enable = $provider->enable;
        $this->provider_id = $provider->id;
    }

    public function edit()
    {
        $this->validate();

        $this->provider->update([
            'name' => $this->name,
            'class' => $this->class,
            'enable' => $this->enable,
        ]);

        $this->emit('providerEdited');

        session()->flash('message', 'Provider was edited successfully.');
    }

    public function delete()
    {
        $this->provider->delete();
        $this->emit('providerDeleted');
    }
    
    public function render()
    {
        return view('provider::livewire.single')->layout('provider::base');
    }

    public function getRules()
    {
        return $rules = [
            'name' => [
                'required',
                'min:3',
                'max:255',
                Rule::unique('providers')->ignore($this->provider_id)
            ],
            'class' => [
                'required',
                'min:5',
                'max:255',
                Rule::unique('providers')->ignore($this->provider_id),
                new CheckClassNamespace()
            ],
        ];
    }
    
}
