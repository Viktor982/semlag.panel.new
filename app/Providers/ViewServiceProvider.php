<?php

namespace NPDashboard\Providers;

use NPCore\Captcha\CaptchaManager;
use NPCore\Hooks\Container;
use NPCore\Providers\Provider;
use Illuminate\Events\Dispatcher;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;

class ViewServiceProvider extends Provider
{
    /**
     * @param Container $container
     */
    public function boot(Container $container)
    {
        $fs = $container['illuminateContainer']['files'];
        $ed = new Dispatcher($container['illuminateContainer']);
        $vr = new EngineResolver();
        $bc = new BladeCompiler($fs, config()['views']['compiled']);

        $bc->directive('inject', function ($expression){

            $segments = explode(',', preg_replace("/[\(\)\\\"\']/", '', $expression));

            $variable = trim($segments[0]);

            $service = trim($segments[1]);

            return "<?php \${$variable} =  \\NPCore\\AppCapsule::ioc()->make({$service}::class); ?>";
        });

        $bc->directive('captcha', function ($expression) use($container) {
            $_expression = strtolower($expression);
            $withScript = ($_expression == 'false') ? false : true;
            $_str = ($container['captcha']->generateView());
            return "<?php echo '{$_str}'; ?>";
        });

        $bc->directive('role', function ($expression) {
            return "<?php if(role({$expression})): ?>";
        });

        $bc->directive('endrole', function ($x) {
            return "<?php endif; ?>";
        });

        $bc->directive('prod', function ($x){
            return "<?php if (env('ENV') == 'production'): ?>";
        });

        $bc->directive('endprod', function ($x) {
            return "<?php endif; ?>";
        });

        $vr->register('blade', function () use ($bc, $fs){
            return new CompilerEngine($bc, $fs);
        });

        $vr->register('php', function (){
            return new PhpEngine();
        });

        $vf = new FileViewFinder($fs, config()['views']['views']);

        $factory = new Factory($vr, $vf, $ed);

        $container['illuminateContainer']['view'] = function () use($factory){
            return $factory;
        };
    }
}