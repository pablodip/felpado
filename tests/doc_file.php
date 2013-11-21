<?php

namespace felpado\doc;

function generate_doc_file($docFile, $sourceFile) {
    $contents = doc_file_contents(docs_from_source(file_source($sourceFile)));

    file_put_contents($docFile, $contents);
}

function file_source($file) {
    return file_get_contents($file);
}


function doc_file_contents($docs) {
    return doc_file_header()
          ."\n\n"
          .doc_file_function_list($docs)
          ."\n\n"
          .doc_file_functions($docs);
}

function doc_file_header() {
    return <<<EOF
# Functions
EOF;
}

function doc_file_function_list($docs) {
    return implode(", ", \f::map(function ($function) {
        return sprintf('[%s](#%s)', $function, $function);
    }, \f::keys($docs)));
}

function doc_file_functions($docs) {
    return implode("\n\n", \f::map('felpado\doc\function_doc', $docs));
}

function function_doc($doc, $function) {
    return sprintf(<<<EOF
<a name="%s"></a>
### %s

%s

%s

```
%s
```
EOF
        ,
        $function,
        $function,
        preg_replace('/^.*$/m', '`$0`', $doc['usage']),
        $doc['desc'],
        $doc['example']
    );
}


function docs_from_source($source) {
    return \f::map(
        'felpado\doc\parse_doc',
        \f::map('felpado\doc\doc_remove_php', docs_from_tokens(token_get_all($source)))
    );
}

function doc_remove_php($doc) {
    if (preg_match('#^\/\*\*.*?\*/#ms', $doc, $matches)) {
        return trim(preg_replace('/^.*?\*+[ \/]?/m', '', $matches[0]));
    }
}

function parse_doc($doc) {
    $parts = array_replace(array('', '', ''), explode("\n\n", $doc));

    return array(
        'raw'     => $doc,
        'usage'   => $parts[0],
        'desc'    => $parts[1],
        'example' => $parts[2],
    );
}

function docs_from_tokens($tokens) {
    return \f::reduce(function ($docs, $token) {
        if (token_is_doc($token)) {
            return \f::assoc($docs, 'pending', token_value($token));
        }

        if (\f::contains($docs, 'pending') && token_is_string($token)) {
            return \f::renameKey($docs, 'pending', token_value($token));
        }

        return $docs;
    }, $tokens, array());
}

function token_is_doc($token) {
    return token_is_type($token, T_DOC_COMMENT);
}

function token_is_string($token) {
    return token_is_type($token, T_STRING);
}

function token_is_type($token, $type) {
    return token_type($token) === $type;
}

function token_type($token) {
    return $token[0];
}

function token_value($token) {
    return $token[1];
}