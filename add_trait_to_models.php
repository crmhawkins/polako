<?php

$directory = __DIR__ . '/app/Models';
$traitUseStatement = "use App\\Models\\Traits\\BelongsToCompany;";
$traitLine = "use BelongsToCompany;";

function processFile($filePath, $traitUseStatement, $traitLine) {
    $content = file_get_contents($filePath);

    if (strpos($content, 'BelongsToCompany') !== false) {
        echo "✔ Ya presente: {$filePath}\n";
        return;
    }

    // Insertar use App\Models\Traits\BelongsToCompany;
    $content = preg_replace(
        '/<\?php\s+(namespace\s[^\n]+;)/',
        "<?php\n\$1\n\n{$traitUseStatement}",
        $content
    );

    // Insertar use BelongsToCompany; dentro de la clase
    $content = preg_replace(
        '/class\s+\w+\s+extends\s+\w+\s*\{/',
        "$0\n    {$traitLine}",
        $content
    );

    file_put_contents($filePath, $content);
    echo "✅ Trait añadido: {$filePath}\n";
}

function scanDirectory($directory, $traitUseStatement, $traitLine) {
    $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

    foreach ($rii as $file) {
        if ($file->isDir()) continue;

        if (pathinfo($file->getFilename(), PATHINFO_EXTENSION) === 'php') {
            processFile($file->getPathname(), $traitUseStatement, $traitLine);
        }
    }
}

scanDirectory($directory, $traitUseStatement, $traitLine);

