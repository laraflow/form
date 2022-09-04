<?php


namespace Laraflow\Form\Traits;


use Illuminate\View\Compilers\BladeCompiler;

trait BladeDirectiveTrait
{
    /**
     * Register Blade directives.
     *
     * @return void
     */
    public function registerBladeDirectives(array $directives = [])
    {
        //dump("name : " . self::class, "methos", self::$directives);

        if (empty($directives)) {
            if (property_exists(self::class, 'directives')) {
                $directives = self::$directives;
            }
        }

        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) use (&$directives) {
            foreach ($directives as $directive) {
                $bladeCompiler->directive("form_{$directive}", function ($expression) use (&$directive) {
                    return "<?php echo \Laraflow\Form\Facades\Form::{$directive}({$expression}); ?>";
                });
            }
        });
    }
}
