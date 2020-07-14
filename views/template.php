<html>
    <head>
    
    </head>
    <body>
    Esse é o topo<br/>
    <hr/>
    <a href="<?= BASE_URL;?>/">Home</a>
    
    <?php $this->loadViewInTemplate($viewName, $viewData);?>

    </body>
</html>