<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');

        //echo $this->Html->css('default/cake.generic');
        echo $this->Html->css(array(
        'default/bootstrap.css',
        'default/font-awesome.css',
        'default/pace-theme-big-counter.css',
        'default/style.css',
        'default/main-style.css',
        'default/morris-0.4.3.min.css',
        'pure/pure-base/',
        'pure/pure-button/',
        'pure/pure-form/',
        'pure/pure-grid/',
        'pure/pure-table/',
        'pure/pure-menu/menus.css',
        'outro/font-awesome.css',
        'outro/morris-0.4.3.min.css',
        ));
        echo $this->Html->script('//yui.yahooapis.com/pure/0.6.0/pure-min.css');
        
        echo $this->fetch('meta');
        echo $this->fetch('css');
    
      echo $this->Html->script(array(
        'jquery-1.10.2.js',
        'jquery.metisMenu.js',
        'pace.js',
        'siminta.js',
        'raphael-2.1.0.min.js',
        'morris.js',
        'dashboard-demo.js',
        'bootstrap.min.js',
        ));
    ?>
</head>