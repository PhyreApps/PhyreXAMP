<?php

use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new class extends Component {
    use Toast;

    public $virtualHosts = [];

    public $creatingVirtualHost = false;

    public $virtualHostState = [];

    public function createVirtualHost()
    {
        $this->creatingVirtualHost = true;
    }

    public function startCreatingVirtualHost()
    {
        $this->validate([
            'virtualHostState.name' => 'required|string|max:255',
            'virtualHostState.document_root' => 'required|string|max:255',
            'virtualHostState.php_version' => 'required',
        ]);

        $newVirtualHost = new \App\Models\VirtualHost();
        $newVirtualHost->fill($this->virtualHostState);
        $newVirtualHost->save();

        $this->creatingVirtualHost = false;
        $this->toast('success', 'Virtual Host created successfully');
        $this->virtualHostState = [];

        $this->redirect('/');
    }


    public function selectDocumentRoot()
    {
        $dir = \Native\Laravel\Dialog::new()
            ->folders()
            ->open();

        if (empty($dir)) {
            return;
        }

        $find = \App\Models\VirtualHost::where('document_root', $dir)->first();
        if ($find) {
            $this->toast('danger', 'Document root already exists');
            return;
        }

        $this->virtualHostState['document_root'] = $dir;
    }

    public function mount()
    {
        $lastPHPVersion = \App\Models\SupportedPHPVersion::orderBy('id', 'desc')->first();
        if ($lastPHPVersion) {
            $this->virtualHostState['php_version'] = $lastPHPVersion->php_version;
        }
    }
}; ?>

<div>
    @if($this->creatingVirtualHost)


        <x-form wire:submit="startCreatingVirtualHost">

            <h3 class="text-2xl my-8">
                Create new Virtual Host
            </h3>

            <x-input label="Name" placeholder="my-host.dev" wire:model="virtualHostState.name" />


            <x-input label="Document Root"
                     wire:click="selectDocumentRoot"
                :value="isset($virtualHostState['document_root']) ? $virtualHostState['document_root'] : ''"
            >
                <x-slot:append>
                    <x-button  wire:click="selectDocumentRoot" label="Select" icon="o-folder" class="btn-primary rounded-s-none" />
                </x-slot:append>
            </x-input>

            @php
                $phpVersions =\App\Models\SupportedPHPVersion::all();
            @endphp


            <x-select label="PHP Version" wire:model="virtualHostState.php_version"
                       option-value="php_version"
                       option-label="php_version_name"

                       :options="$phpVersions" single />

            <x-slot:actions>
                <x-button label="Create Virtual Host" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-form>


    @else
        <div class="max-w-2xl mx-auto text-center py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
            <h2 class="font-extrabold text-white sm:text-4xl">
                        <span class="block text-3xl ">
                            Welcome to PhyreXAMP!
                        </span>
                <span class="block text-2xl ">
                            Your local development environment.
                        </span>
            </h2>
            <p class="mt-4 text-lg leading-6 text-white/80">
                PhyreXAMP is a local development environment that allows you to build and test websites. It is a combination of free software (Apache, MySQL, PHP) that allows you to locally develop web applications.
            </p>
            <div class="mt-8">
            <x-button wire:click="createVirtualHost" label="Create your first Virtual Host" class="btn-primary" type="submit" spinner="createVirtualHost" />
            </div>
        </div>
    @endif
</div>
