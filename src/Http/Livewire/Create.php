<?php


namespace ProviderMan\Http\Livewire;


use Livewire\Component;
use function PHPUnit\Framework\returnArgument;
use ProviderMan\Models\Provider;
use ProviderMan\Rules\CheckClassNamespace;

class Create extends Component
{

    public $name, $class;

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function create()
    {
        $this->validate();

        Provider::query()->create([
            'name' => $this->name,
            'class' => $this->class
        ]);
        $this->reset();

        $this->emit('providerCreated');
    }

    public function getRules()
    {
        return $rules = [
            'name' => 'required|min:3|max:255|unique:providers',
            'class' => ['required', 'min:5', 'max:255', 'unique:providers', new CheckClassNamespace()],
        ];
    }

    public function render()
    {
        return view('provider::livewire.create')->layout('provider::base');
    }

}
