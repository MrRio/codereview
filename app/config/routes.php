<?php

Router::connect('/', array('controller' => 'snippets', 'action' => 'index'));
/**
* ...and connect the rest of 'Pages' controller's urls.
*/
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
