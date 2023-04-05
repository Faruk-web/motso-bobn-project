<?php

namespace Modules\Core\Console;

use Illuminate\Console\Command;
use Modules\User\Models\Module;
use Modules\User\Models\Permission;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ModuleUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'sync:module';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $modules = \Nwidart\Modules\Facades\Module::all();

        foreach ($modules as $module) {
            Module::updateOrCreate(
                [
                    'name'=> $module->getName()
                ],
                [
                    'path'=> $module->getPath(),
                    'is_core'=> $module->getName() == 'Core' || $module->getName() == 'Template' ? 1 : null,
                    'status'=> $module->isEnabled() ? 1 : 2,
                ]
            );
        }
        $this->info('Module database updated!');

        $this->permissionTesting();
    }

    public function permissionTesting()
    {
        $modules = Module::active()->get();
        foreach ($modules as $module) {
            if (is_array(config(strtolower($module->name).'.permission')) && count(config(strtolower($module->name).'.permission')) > 0) {
                foreach (config(strtolower($module->name).'.permission') as $keyPermission => $valuePermission) {
                    foreach ($valuePermission['type'] as $keyType => $valueType) {
                        if ($valueType == 'all') {
                            $this->permissionCreate($keyPermission, $module->id);
                        } elseif ($valueType == 'create') {
                            $this->permissionCreate($keyPermission.'.create', $module->id);
                        } elseif ($valueType == 'update') {
                            $this->permissionCreate($keyPermission.'.update', $module->id);
                        } elseif ($valueType == 'view') {
                            $this->permissionCreate($keyPermission.'.view', $module->id);
                        } elseif ($valueType == 'delete') {
                            $this->permissionCreate($keyPermission.'.delete', $module->id);
                        }
                    }
                }
            }
        }

        $this->info('Permission database updated!');
    }

    public function permissionCreate($name, $moduleId)
    {
        return Permission::updateOrCreate(
            [
                'name'=> $name
            ],
            [
                'module_id'=> $moduleId,
                'guard_name'=> 'web',
            ]
        );
    }
}