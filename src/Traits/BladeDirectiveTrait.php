<?php


namespace Laraflow\Form\Traits;


use Illuminate\View\Compilers\BladeCompiler;
use Laraflow\Form\Builders\FormBuilder;

trait BladeDirectiveTrait
{
    /**
     * Register Blade directives.
     *
     * @return void
     */
    public function registerBladeDirectives(array $directives = [])
    {
        if (empty($directives)) {
            if (property_exists(parent::class, 'directives')) {
                $directives = parent::$directives;
            }
        }
        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
            $directives = get_class_directives(FormBuilder::class);

            foreach ($directives as $directive) {
                $bladeCompiler->directive("form_{$snakedirective}", function ($expression) use ($directive) {
                    return "<?php echo \Laraflow\Form\Facades\Form::{$directive}({$expression}); ?>";
                });
            }
        });
    }
}
