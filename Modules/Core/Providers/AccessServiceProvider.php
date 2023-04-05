<?php

namespace Modules\Core\Providers;

use Modules\User\Models\User;
use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class AccessServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->callAfterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
            $this->registerBladeExtensions($bladeCompiler);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

    private function registerBladeExtensions($bladeCompiler)
    {
        $bladeCompiler->directive('ucan', function ($arguments) {
            list($name, $moduleName) = explode(',', $arguments.',');
            $module = trim($moduleName, " ");

            if (empty($module)) {
                return "<?php if(ucan({$name})): ?>";
}

return
"<?php if(\\Nwidart\\Modules\\Facades\\Module::isEnabled({$module}) && ucan({$name})): ?>";
});

$bladeCompiler->directive('elseucan', function ($arguments) {
list($name, $moduleName) = explode(',', $arguments.',');
$module = trim($moduleName, " ");

if (empty($module)) {
return "<?php elseif(ucan({$name})): ?>";
}

return
"<?php elseif(\\Nwidart\\Modules\\Facades\\Module::isEnabled({$module}) && ucan({$name})): ?>";
});

$bladeCompiler->directive('enducan', function ($arguments) {
return '<?php endif; ?>';
});
}
}