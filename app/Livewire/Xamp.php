<?php

namespace App\Livewire;

use App\DockerClient;
use App\Models\VirtualHost;
use Livewire\Component;
use function Psy\sh;

class Xamp extends Component
{
    public $status = 'stopped';
    public $virtualHosts = [];

    public function start()
    {
        $this->status = 'started';

        $this->dockerCli('start-container', 'phyrexamp-*');
    }

    public function stop()
    {
        $this->status = 'stopped';

        $this->dockerCli('stop-container', 'phyrexamp-*');
    }

    public function mount()
    {
        $getStatus = $this->dockerCli('status-container', 'phyrexamp-*');

        if (str_contains($getStatus, 'is running')) {
            $this->status = 'started';
        }

        $getVirtualHosts = VirtualHost::all();
        
        $this->virtualHosts = $getVirtualHosts->toArray();
    }

    public function dockerCli($command, $args = '')
    {
        $commandsPath = base_path('docker/commands');
        shell_exec("chmod +x $commandsPath/".$command.".sh");
        $response = shell_exec("sh $commandsPath/".$command.".sh " . $args);

        return $response;
    }

    public function render()
    {
        return view('livewire.xamp');
    }
}
