## Table of contents

- [\bootphp\fn](#class-bootphpfn)
- [\bootphp\str](#class-bootphpstr)
- [\bootphp\cookie](#class-bootphpcookie)
- [\bootphp\file](#class-bootphpfile)

<hr />

### Class: \bootphp\fn

> Class fn

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>printbr(</strong><em>mixed</em> <strong>$str</strong>)</strong> : <em>void</em><br /><em>Prints one argument per line with html break</em> |
| public static | <strong>printhtml(</strong><em>mixed</em> <strong>$str</strong>)</strong> : <em>void</em><br /><em>Prints one argument per line with html comment format</em> |
| public static | <strong>printjs(</strong><em>mixed</em> <strong>$str</strong>)</strong> : <em>void</em><br /><em>Prints one argument per line in javascript comments format</em> |
| public static | <strong>println(</strong><em>mixed</em> <strong>$str</strong>)</strong> : <em>void</em><br /><em>Prints one argument per line</em> |

<hr />

### Class: \bootphp\str

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>replace_first(</strong><em>mixed</em> <strong>$search</strong>, <em>string</em> <strong>$replace=`''`</strong>, <em>string</em> <strong>$subject=`''`</strong>)</strong> : <em>void</em> |
| public static | <strong>starts_with(</strong><em>mixed</em> <strong>$haystack</strong>, <em>mixed</em> <strong>$needle</strong>)</strong> : <em>void</em> |

<hr />

### Class: \bootphp\cookie

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>remove(</strong><em>mixed</em> <strong>$key</strong>, <em>string</em> <strong>$context=`'/'`</strong>)</strong> : <em>void</em> |

<hr />

### Class: \bootphp\file

| Visibility | Function |
|:-----------|:---------|
| public static | <strong>check(</strong><em>mixed</em> <strong>$filepath</strong>)</strong> : <em>void</em> |
| public static | <strong>clean(</strong><em>mixed</em> <strong>$path</strong>)</strong> : <em>void</em> |
| public static | <strong>export_object(</strong><em>mixed</em> <strong>$filename</strong>, <em>mixed</em> <strong>$objet</strong>)</strong> : <em>void</em> |
| public static | <strong>is_remote(</strong><em>string</em> <strong>$file_name=`''`</strong>)</strong> : <em>number</em> |
| public static | <strong>list_all(</strong><em>mixed</em> <strong>$folder</strong>, <em>array</em> <strong>$ignore=array()</strong>)</strong> : <em>void</em> |
| public static | <strong>mkdir(</strong><em>string</em> <strong>$dirName</strong>, <em>number</em> <strong>$rights=511</strong>)</strong> : <em>boolean</em> |
| public static | <strong>path(</strong><em>mixed</em> <strong>$str</strong>)</strong> : <em>void</em> |
| public static | <strong>recursive_list_all(</strong><em>mixed</em> <strong>$folder</strong>, <em>string</em> <strong>$prefix=`''`</strong>)</strong> : <em>void</em> |
| public static | <strong>resolve_path(</strong><em>\bootphp\unknown</em> <strong>$str</strong>)</strong> : <em>string</em> |
| public static | <strong>write(</strong><em>mixed</em> <strong>$filepath</strong>, <em>mixed</em> <strong>$content</strong>)</strong> : <em>void</em> |
| public static | <strong>write_ini(</strong><em>mixed</em> <strong>$assoc_arr</strong>, <em>mixed</em> <strong>$path</strong>, <em>bool</em> <strong>$has_sections=false</strong>)</strong> : <em>void</em> |

