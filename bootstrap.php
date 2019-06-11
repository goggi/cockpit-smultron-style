<?php
if (COCKPIT_ADMIN && !COCKPIT_API_REQUEST) {

    $settings = $app->config['crawlyfi'] ?? [];
    extract($settings);


    $app['app.assets.base'] = array_merge($app['app.assets.base'], [
        '/addons/cockpit-smultron-style/assets/css/crawlyfi.css'
    ]);

    $app['app.assets.base'] = array_merge($app['app.assets.base'], [
        "/addons/cockpit-smultron-style/assets/css/system-{$system}.css"
    ]);

    $this->on('admin.init', function () use ($app) {

        $settings = $app->config['crawlyfi'] ?? [];
        extract($settings);

        $this->helper('admin')->addAssets('cockpit-smultron-style:assets/css/crawlyfi.css');

        // Load environment specific css.
        if (!empty($system) && $app->path("cockpit-smultron-style:assets/css/system-{$system}.css")) {
            $this->helper('admin')->addAssets("cockpit-smultron-style:assets/css/system-{$system}.css");
        }

      });

}