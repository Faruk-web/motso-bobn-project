<?php

namespace Modules\Core\Providers;

use ReflectionClass;
use Illuminate\Support\Str;
use Illuminate\View\Component;
use Nwidart\Modules\Facades\Module;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\SplFileInfo;

class ComponentsServiceProvider extends ServiceProvider
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
        $this->registerBladeComponents();
    }

    protected function registerBladeComponents()
    {
        $modules = Module::toCollection();

        $modulesComponentNamespace = 'View\\Components';

        $modules->each(function ($module) use ($modulesComponentNamespace) {
            $directory = (string) Str::of($module->getPath())
                ->append('/' . $modulesComponentNamespace)
                ->replace(['\\'], '/');

            $namespace = 'Modules\\' . $module->getName() . '\\' . $modulesComponentNamespace;

            $this->registerBladeComponentDirectory($directory, $namespace, $module->getLowerName() . '::');
        });
    }

    protected function registerBladeComponentDirectory($directory, $namespace, $aliasPrefix = '')
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

                Blade::component($alias, $class);
            });
    }
}
