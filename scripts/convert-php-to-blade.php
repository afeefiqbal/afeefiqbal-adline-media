<?php
/**
 * Converts adline/new PHP page content to Blade view stubs.
 * Usage: php scripts/convert-php-to-blade.php
 */

$sourceDir = dirname(__DIR__, 2) . '/adline/new';
$viewsDir = dirname(__DIR__) . '/resources/views/web';

$pages = [
    'index.php' => 'home.blade.php',
    'about.php' => 'about-us.blade.php',
    'contact.php' => 'contact_us.blade.php',
    'blog.php' => 'blogs.blade.php',
    'blog-single.php' => 'blog_detail.blade.php',
    'portfolio.php' => 'portfolio.blade.php',
    'portfolio-single.php' => 'portfolio_detail.blade.php',
    'services-single.php' => 'service_detail.blade.php',
    '404.php' => 'error/404.blade.php',
];

function extractContent(string $file): string
{
    $content = file_get_contents($file);
    $content = preg_replace('/<\?php\s+include\s*\(\s*[\'"]header\.php[\'"]\s*\)\s*\?>\s*/i', '', $content);
    $content = preg_replace('/<\?php\s+include\s*\(\s*[\'"]footer\.php[\'"]\s*\)\s*\?>\s*/i', '', $content);
    return trim($content);
}

function convertToBlade(string $html): string
{
    $replacements = [
        '/src="images\/([^"]+)"/' => 'src="{{ asset(\'web/imagesN/$1\') }}"',
        '/href="images\/([^"]+)"/' => 'href="{{ asset(\'web/imagesN/$1\') }}"',
        '/url\([\'"]?images\/([^\'"\)]+)[\'"]?\)/' => 'url({{ asset(\'web/imagesN/$1\') }})',
        '/href="index\.php"/' => 'href="{{ url(\'/\') }}"',
        '/href="\.\/"/' => 'href="{{ url(\'/\') }}"',
        '/href="about\.php"/' => 'href="{{ url(\'about-us\') }}"',
        '/href="contact\.php"/' => 'href="{{ url(\'contact-us\') }}"',
        '/href="portfolio\.php"/' => 'href="{{ url(\'portfolio\') }}"',
        '/href="blog\.php"/' => 'href="{{ url(\'blogs\') }}"',
        '/href="services-single\.php"/' => 'href="{{ url(\'service/exhibition-booth-design\') }}"',
        '/href="portfolio-single\.php"/' => 'href="{{ url(\'portfolio\') }}"',
        '/href="blog-single\.php"/' => 'href="{{ url(\'blogs\') }}"',
        '/href="404\.php"/' => 'href="{{ url(\'/\') }}"',
        '/href="index\.html"/' => 'href="{{ url(\'/\') }}"',
        '/href="privacy-policy"/' => 'href="{{ url(\'privacy-policy\') }}"',
    ];

    foreach ($replacements as $pattern => $replacement) {
        $html = preg_replace($pattern, $replacement, $html);
    }

    return $html;
}

foreach ($pages as $phpFile => $bladeFile) {
    $sourcePath = $sourceDir . '/' . $phpFile;
    if (!file_exists($sourcePath)) {
        echo "Skip missing: $phpFile\n";
        continue;
    }

    $content = extractContent($sourcePath);
    $content = convertToBlade($content);
    $blade = "@extends('web.layouts.main')\n@section('content')\n" . $content . "\n@endsection\n";

    $targetPath = $viewsDir . '/' . $bladeFile;
    $targetDir = dirname($targetPath);
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    file_put_contents($targetPath, $blade);
    echo "Converted: $phpFile -> $bladeFile\n";
}

echo "Done.\n";
