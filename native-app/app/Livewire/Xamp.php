<?php

namespace App\Livewire;

use App\DockerClient;
use App\Models\VirtualHost;
use Livewire\Component;
use Native\Laravel\Dialog;
use Native\Laravel\Facades\Notification;
use Native\Laravel\Facades\Shell;
use Native\Laravel\Facades\Window;
use function Psy\sh;

class Xamp extends Component
{
    public $status = 'stopped';

    public function start()
    {
        $this->status = 'started';

        $this->dockerCli('start-container', 'phyrexamp-*');

        Notification::title('PhyreXAMP Started')
            ->message('You can now access your virtual hosts.')
            ->show();
    }

    public function stop()
    {
        $this->status = 'stopped';

        $this->dockerCli('stop-container', 'phyrexamp-*');

        Notification::title('PhyreXAMP Stopped')
            ->message('All services have been stopped.')
            ->show();

    }

    public function restart()
    {
        $this->status = 'stopped';

        $this->dockerCli('restart-container', 'phyrexamp-*');

        Notification::title('PhyreXAMP Restarted')
            ->message('All services have been restarted.')
            ->show();

        $this->status = 'started';
    }

    public function openLocalHost()
    {
        Shell::openExternal('http://localhost');
    }

    public function mount()
    {
        $getStatus = $this->dockerCli('status-container', 'phyrexamp-httpd');
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
