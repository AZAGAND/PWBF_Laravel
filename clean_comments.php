<?php
// Function to strip comments from PHP code
function strip_php_comments($content) {
    $newStr  = '';
    $commentTokens = [T_COMMENT];
    if (defined('T_DOC_COMMENT')) {
        $commentTokens[] = T_DOC_COMMENT; // PHP 5
    }
    if (defined('T_ML_COMMENT')) {
        $commentTokens[] = T_ML_COMMENT;  // PHP 4
    }

    $tokens = token_get_all($content);

    foreach ($tokens as $token) {
        if (is_array($token)) {
            if (in_array($token[0], $commentTokens)) {
                // Preserve newlines from comments to keep basic structure somewhat intact, 
                // but reduce excessive vertical spacing later.
                // $newStr .= str_repeat("\n", substr_count($token[1], "\n"));
                continue;
            }
            $token = $token[1];
        }
        $newStr .= $token;
    }
    return $newStr;
}

// Recursive function to get all PHP files
function getDirContents($dir, &$results = array()) {
    $files = scandir($dir);

    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            if (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
                $results[] = $path;
            }
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
        }
    }

    return $results;
}

$dir = 'c:\laragon\www\Laravel Semester 3\app\Http\Controllers';
$files = getDirContents($dir);

foreach ($files as $file) {
    echo "Processing: " . basename($file) . "... ";
    $content = file_get_contents($file);
    $cleanContent = strip_php_comments($content);
    
    // Normalize newlines
    $cleanContent = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n\n", $cleanContent);
    // Trim leading/trailing whitespace
    $cleanContent = trim($cleanContent);

    if ($content !== $cleanContent) {
        file_put_contents($file, $cleanContent);
        echo "Cleaned.\n";
    } else {
        echo "No comments found/changed.\n";
    }
}
