<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| BBCODE
| -------------------------------------------------------------------
| This file contains two arrays of bbcode for use with the bbcode helper.
| The first array is for buttons and the second is for parsing.
|
*/

$bbcode = array(

//    name                onClick

    "bold"            =>        "insert_bbcode('[b]', '[/b]');return(false)",
    "italic"            =>        "insert_bbcode('[i]', '[/i]');return(false)",
    "underline"            =>        "insert_bbcode('[u]', '[/u]');return(false)",
    "align-left"        =>        "insert_bbcode('[left]', '[/left]');return(false)",
    "align-center"       =>        "insert_bbcode('[center]', '[/center]');return(false)",
    "align-right"        =>        "insert_bbcode('[right]', '[/right]');return(false)",
    "align-justify"      =>        "insert_bbcode('[justify]', '[/justify]');return(false)",
    "quote-left"        =>        "insert_bbcode('[q=AUTHOR]', '[/q]');return(false)",
    "file-image-o"          =>        "insert_bbcode('[img=LINK]', '');return(false)",
    "link"          =>        "insert_bbcode('[url=LINK]', '[/url]');return(false)"
    );

$bbcode_to_parse = array(

//    regex                                            replacement                                    clean            loop    

    "#\[base_url\]#i"                        =>        array(base_url(),                                    base_url(),        1),
    "#\[/\]#"                                =>        array("<hr width=\"100%\" size=\"1\" />",                "",                1),
    "#\[hr\]i#"                            =>        array("<hr width=\"100%\" size=\"1\" />",                "",                1),
    "#\[b\](.+)\[/b\]#isU"                    =>        array("<strong>$1</strong>",                            "",                1),
    "#\[i\](.+)\[/i\]#isU"                    =>        array("<em>$1</em>",                                "",                1),
    "#\[u\](.+)\[/u\]#isU"                    =>        array("<u>$1</u>",                                    "",                1),
    "#\[center\](.+)\[/center\]#isU"            =>        array("<div style=\"text-align: center\">$1</div>",        "",                1),
    "#\[left\](.+)\[/left\]#isU"            =>        array("<div style=\"text-align: left\">$1</div>",        "",                1),
    "#\[right\](.+)\[/right\]#isU"            =>        array("<div style=\"text-align: right\">$1</div>",        "",                1),
    "#\[justify\](.+)\[/justify\]#isU"            =>        array("<div style=\"text-align: justify\">$1</div>",        "",                1),
    "#\[color=(.+)\](.+)\[/color\]#isU"        =>        array("<span style=\"color:$1\">$2</span>",                "",                1),
    "#\[size=([0-9]+)\](.+)\[/size\]#isU"        =>        array("<span style=\"font-size:$1px\">$2</span>",            "",                1),
    "#\[img\](.+)\[/img\]#isU"                =>        array("<img  />",            "",                1),
    "#\[img=(.+)\]#isU"                        =>        array("<img src='$1'/>",            "",                1),
    "#\[email\](.+)\[/email\]#isU"            =>        array("<a >$1</a>",                    "$1",            1),
    "#\[email=(.+)\](.+)\[/email\]#isU"        =>        array("<a >$2</a>",                    "$1 ($2)",        1),
    "#\[url\](.+)\[/url\]#isU"                =>        array("<a >$1</a>",            "$1",            1),
    "#\[url=(.+)\](.+)\[/url\]#isU"            =>        array("<a href='$1' target='_blank'>$2</a>",            "$1 ($2)",        1),
    "#\[list\](.+)\[/list\]#isU"                =>        array("<ul>$1</ul>",                                "\n$1\n",            1),
    "#\[list=(.+)\](.+)\[/list\]#isU"                =>        array("<ol type=\"$1\">$2</ol>",                                "\n$1\n",            1),
    "#\[\*\](.+)\[/\*\]#isU"                    =>        array("<li>$1</li>",                                " - $1\n",        1),
    "#\[q\](.+)\[/q\]#isU"                    =>        array("<blockquote><p>$1</p></blockquote>",                    "\"$1\"",            5),
    "#\[q=(.+)\](.+)\[/q\]#isU"                =>        array("<blockquote><p>$2</p><footer><cite title='AUTHOR'>$1</cite></footer></blockquote>",            "\"$2\" ($1)",        5),
    "#\[code=(.+)\](.+)\[/code\]#isU"            =>        array("<sourcecode language='$1'>$2</sourcecode>",                    "$1",            1)
    );

?>