 <?php
spl_autoload_register(function ($class) {
    // Définissez le chemin de base de votre application
    $baseDir = __DIR__ . '/app/';

    // Convertit le nom de la classe en un chemin de fichier
    $file = $baseDir . str_replace('\\', '/', $class) . '.php';

    // Inclut le fichier si celui-ci existe
    if (file_exists($file)) {
        require $file;
    }
});
