<?php
if (COCKPIT_ADMIN && !COCKPIT_API_REQUEST) {

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