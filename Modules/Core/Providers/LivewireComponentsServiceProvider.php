<?php

namespace Modules\Core\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Livewire;
use Nwidart\Modules\Facades\Module;
use ReflectionClass;
use Symfony\Component\Finder\SplFileInfo;

class LivewireComponentsServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->registerModuleComponents();
    }

    protected function registerModuleComponents()
    {
        $modules = Module::toCollection();

        $modulesLivewireNamespace = 'Http\\Pages';

        $modules->each(function ($module) use ($modulesLivewireNamespace) {
            $directory = (string) Str::of($module->getPath())
                ->append('/' . $modulesLivewireNamespace)
                ->replace(['\\'], '/');

            $namespace = 'Modules\\' . $module->getName() . '\\' . $modulesLivewireNamespace;

            $this->registerComponentDirectory($directory, $namespace, $module->getLowerName() . '::');
        });
    }

    protected function registerComponentDirectory($directory, $namespace, $aliasPrefix = '')
    {
        $filesystem = new Filesystem();

        if (! $filesystem->isDirectory($directory)) {
            return false;
        }

        collect($filesystem->allFiles($directory))
            ->map(function (SplFileInfo $file) use ($namespace) {
                return (string) Str::of($namespace)
                    ->append('\\', $file->getRelativePathname())
                    ->replace(['/', '.php'], ['\\', '']);
            })
            ->filter(function ($class) {
                return is_subclass_of($class, Component::class) && ! (new ReflectionClass($class))->isAbstract();
            })
            ->each(function ($class) use ($namespace, $aliasPrefix) {
                $alias = $aliasPrefix . Str::of($class)
                    ->after($namespace . '\\')
                    ->replace(['/', '\\'], '.')
                    ->explode('.')
                    ->map([Str::class, 'kebab'])
                    ->implode('.');

                if (Str::endsWith($class, ['\Index', '\index'])) {
                    Livewire::component(Str::beforeLast($alias, '.index'), $class);
                }
                if ($alias !== 'core::test-counter') {
                    // dd($alias);
                }
                Livewire::component($alias, $class);
            });
    }
}
