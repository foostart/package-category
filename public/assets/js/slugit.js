/*
 * jQuery slugIt plug-in 1.0
 *
 * Copyright (c) 2010 Diego Kuperman
 *
 * Inspired by perl module Text::Unidecode and Django urlfy.js
 *
 * Licensed under the BSD license:
 *      http://www.opensource.org/licenses/bsd-license.php
 */

jQuery.fn.slugIt = function (options) {
    var defaults = {
        events: 'keypress keyup',
        output: '#slug',
        separator: '-',
        map: false,
        before: false,
        after: false
    };

    var opts = jQuery.extend(defaults, options);

    var chars = latin_map();
    chars = jQuery.extend(chars, greek_map());
    chars = jQuery.extend(chars, turkish_map());
    chars = jQuery.extend(chars, russian_map());
    chars = jQuery.extend(chars, ukranian_map());
    chars = jQuery.extend(chars, czech_map());
    chars = jQuery.extend(chars, latvian_map());
    chars = jQuery.extend(chars, polish_map());
    chars = jQuery.extend(chars, symbols_map());
    chars = jQuery.extend(chars, currency_map());

    if (opts.map) {
        chars = jQuery.extend(chars, opts.map);
    }

    jQuery(this).bind(defaults.events, function () {
        var text = jQuery(this).val();

        //Change to Slug
        text = to_slug(text);

        if (opts.before) text = opts.before(text);
        text = jQuery.trim(text.toString());

        var slug = new String();
        for (var i = 0; i < text.length; i++) {
            if (chars[text.charAt(i)]) {
                slug += chars[text.charAt(i)]
            } else {
                slug += text.charAt(i)
            }
        }

        // Ensure separator is composable into regexes
        var sep_esc = opts.separator.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
        var re_trail = new RegExp('^' + sep_esc + '+|' + sep_esc + '+$', 'g');
        var re_multi = new RegExp(sep_esc + '+', 'g');

        slug = slug.replace(/[^-\w\d\$\*\(\)\'\!\_]/g, opts.separator);  // swap spaces and unwanted chars
        slug = slug.replace(re_trail, '');                               // trim leading/trailing separators
        slug = slug.replace(re_multi, opts.separator);                   // eliminate repeated separatos
        slug = slug.toLowerCase();                                       // convert sting to lower case

        if (opts.after) slug = opts.after(slug);

        if (typeof opts.output == "function") {
            opts.output(slug)
        } else {
            jQuery(opts.output).val(slug);         // input or textarea
            jQuery(opts.output).html(slug);        // other dom elements
        }

        return this;
    });

    function to_slug(str) {
        str = str.toLowerCase();

        str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
        str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
        str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
        str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
        str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
        str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
        str = str.replace(/(đ)/g, 'd');

        str = str.replace(/([^0-9a-z-\s])/g, '');

        str = str.replace(/(\s+)/g, '-');

        str = str.replace(/^-+/g, '');

        str = str.replace(/-+$/g, '');

        return str;
    }

    function latin_map() {
        return {
            'Ã€': 'A', 'Ã': 'A', 'áº¢': 'A', 'Ãƒ': 'A', 'áº ': 'A', 'Ã„': 'A', 'Ã…': 'A', 'Ã†': 'AE',
            'áº°': 'A', 'áº®': 'A', 'áº²': 'A', 'áº´': 'A', 'áº¶': 'A', 'Ä‚': 'A',
            'áº¦': 'A', 'áº¤': 'A', 'áº¨': 'A', 'áºª': 'A', 'áº¬': 'A', 'Ã‚': 'A',
            'Ã‡': 'C',
            'Ãˆ': 'E', 'Ã‰': 'E', 'áºº': 'E', 'áº¼': 'E', 'áº¸': 'E', 'Ã‹': 'E',
            'á»€': 'E', 'áº¾': 'E', 'á»‚': 'E', 'á»„': 'E', 'á»†': 'E',
            'ÃŒ': 'I', 'Ã': 'I', 'á»ˆ': 'I', 'Ä¨': 'I', 'á»Š': 'I', 'ÃŽ': 'I', 'Ã': 'I',
            'Ä': 'D',
            'Ã‘': 'N',
            'Ã’': 'O', 'Ã“': 'O', 'á»Ž': 'O', 'Ã•': 'O', 'á»Œ': 'O', 'Ã–': 'O', 'Ã˜': 'O',
            'á»’': 'O', 'á»': 'O', 'á»’': 'O', 'á»–': 'O', 'á»˜': 'O', 'Ã”': 'O',
            'á»œ': 'O', 'á»š': 'O', 'á»ž': 'O', 'á» ': 'O', 'á»¢': 'O', 'Æ ': 'O',
            'Ã™': 'U', 'Ãš': 'U', 'á»¦': 'U', 'Å¨': 'U', 'á»¤': 'U', 'Ã›': 'U', 'Ãœ': 'U',
            'á»ª': 'U', 'á»¨': 'U', 'á»¬': 'U', 'á»®': 'U', 'á»°': 'U', 'Æ¯': 'U',
            'Ã': 'Y', 'á»²': 'Y', 'á»¶': 'Y', 'á»¸': 'Y', 'á»´': 'Y',
            'Ãž': 'TH',
            'ÃŸ': 'ss',
            'Ã ': 'a', 'Ã¡': 'a', 'áº£': 'a', 'Ã£': 'a', 'áº¡': 'a', 'Ã¥': 'a', 'Ã¤': 'a',
            'áº±': 'a', 'áº¯': 'a', 'áº³': 'a', 'áºµ': 'a', 'áº·': 'a', 'Äƒ': 'a',
            'áº§': 'a', 'áº¥': 'a', 'áº©': 'a', 'áº«': 'a', 'áº­': 'a', 'Ã¢': 'a',
            'Ã¦': 'ae',
            'Ã§': 'c',
            'Ã¨': 'e', 'Ã©': 'e', 'áº»': 'e', 'áº½': 'e', 'áº¹': 'e', 'Ã«': 'e',
            'á»': 'e', 'áº¿': 'e', 'á»ƒ': 'e', 'á»…': 'e', 'á»‡': 'e', 'Ãª': 'e',
            'Ã¬': 'i', 'Ã­': 'i', 'á»‰': 'i', 'Ä©': 'i', 'á»‹': 'i', 'Ã®': 'i', 'Ã¯': 'i',
            'Ä‘': 'd', 'Ã°': 'd',
            'Ã±': 'n',
            'Ã²': 'o', 'Ã³': 'o', 'á»': 'o', 'Ãµ': 'o', 'á»': 'o', 'Ã¶': 'o', 'Å‘': 'o', 'Ã¸': 'o',
            'á»“': 'o', 'á»‘': 'o', 'á»•': 'o', 'á»—': 'o', 'á»™': 'o', 'Ã´': 'o',
            'á»': 'o', 'á»›': 'o', 'á»Ÿ': 'o', 'á»¡': 'o', 'á»£': 'o', 'Æ¡': 'o',
            'Ã¹': 'u', 'Ãº': 'u', 'á»§': 'u', 'Å©': 'u', 'á»¥': 'u', 'Ã¼': 'u',
            'á»«': 'u', 'á»©': 'u', 'á»­': 'u', 'á»¯': 'u', 'á»±': 'u', 'Æ°': 'u',
            'Ã½': 'y', 'á»³': 'y', 'á»·': 'y', 'á»¹': 'y', 'á»µ': 'y', 'Ã¿': 'y',
            'Ã¾': 'th',
        };
    }

    function greek_map() {
        return {
            'Î±': 'a', 'Î²': 'b', 'Î³': 'g', 'Î´': 'd', 'Îµ': 'e', 'Î¶': 'z', 'Î·': 'h', 'Î¸': '8',
            'Î¹': 'i', 'Îº': 'k', 'Î»': 'l', 'Î¼': 'm', 'Î½': 'n', 'Î¾': '3', 'Î¿': 'o', 'Ï€': 'p',
            'Ï': 'r', 'Ïƒ': 's', 'Ï„': 't', 'Ï…': 'y', 'Ï†': 'f', 'Ï‡': 'x', 'Ïˆ': 'ps', 'Ï‰': 'w',
            'Î¬': 'a', 'Î­': 'e', 'Î¯': 'i', 'ÏŒ': 'o', 'Ï': 'y', 'Î®': 'h', 'ÏŽ': 'w', 'Ï‚': 's',
            'ÏŠ': 'i', 'Î°': 'y', 'Ï‹': 'y', 'Î': 'i',
            'Î‘': 'A', 'Î’': 'B', 'Î“': 'G', 'Î”': 'D', 'Î•': 'E', 'Î–': 'Z', 'Î—': 'H', 'Î˜': '8',
            'Î™': 'I', 'Îš': 'K', 'Î›': 'L', 'Îœ': 'M', 'Î': 'N', 'Îž': '3', 'ÎŸ': 'O', 'Î ': 'P',
            'Î¡': 'R', 'Î£': 'S', 'Î¤': 'T', 'Î¥': 'Y', 'Î¦': 'F', 'Î§': 'X', 'Î¨': 'PS', 'Î©': 'W',
            'Î†': 'A', 'Îˆ': 'E', 'ÎŠ': 'I', 'ÎŒ': 'O', 'ÎŽ': 'Y', 'Î‰': 'H', 'Î': 'W', 'Îª': 'I',
            'Î«': 'Y'
        };
    }

    function turkish_map() {
        return {
            'ÅŸ': 's', 'Åž': 'S', 'Ä±': 'i', 'Ä°': 'I', 'Ã§': 'c', 'Ã‡': 'C', 'Ã¼': 'u', 'Ãœ': 'U',
            'Ã¶': 'o', 'Ã–': 'O', 'ÄŸ': 'g', 'Äž': 'G'
        };
    }

    function russian_map() {
        return {
            'Ð°': 'a', 'Ð±': 'b', 'Ð²': 'v', 'Ð³': 'g', 'Ð´': 'd', 'Ðµ': 'e', 'Ñ‘': 'yo', 'Ð¶': 'zh',
            'Ð·': 'z', 'Ð¸': 'i', 'Ð¹': 'j', 'Ðº': 'k', 'Ð»': 'l', 'Ð¼': 'm', 'Ð½': 'n', 'Ð¾': 'o',
            'Ð¿': 'p', 'Ñ€': 'r', 'Ñ': 's', 'Ñ‚': 't', 'Ñƒ': 'u', 'Ñ„': 'f', 'Ñ…': 'h', 'Ñ†': 'c',
            'Ñ‡': 'ch', 'Ñˆ': 'sh', 'Ñ‰': 'sh', 'ÑŠ': '', 'Ñ‹': 'y', 'ÑŒ': '', 'Ñ': 'e', 'ÑŽ': 'yu',
            'Ñ': 'ya',
            'Ð': 'A', 'Ð‘': 'B', 'Ð’': 'V', 'Ð“': 'G', 'Ð”': 'D', 'Ð•': 'E', 'Ð': 'Yo', 'Ð–': 'Zh',
            'Ð—': 'Z', 'Ð˜': 'I', 'Ð™': 'J', 'Ðš': 'K', 'Ð›': 'L', 'Ðœ': 'M', 'Ð': 'N', 'Ðž': 'O',
            'ÐŸ': 'P', 'Ð ': 'R', 'Ð¡': 'S', 'Ð¢': 'T', 'Ð£': 'U', 'Ð¤': 'F', 'Ð¥': 'H', 'Ð¦': 'C',
            'Ð§': 'Ch', 'Ð¨': 'Sh', 'Ð©': 'Sh', 'Ðª': '', 'Ð«': 'Y', 'Ð¬': '', 'Ð­': 'E', 'Ð®': 'Yu',
            'Ð¯': 'Ya'
        };
    }

    function ukranian_map() {
        return {
            'Ð„': 'Ye', 'Ð†': 'I', 'Ð‡': 'Yi', 'Ò': 'G', 'Ñ”': 'ye', 'Ñ–': 'i', 'Ñ—': 'yi', 'Ò‘': 'g'
        };
    }

    function czech_map() {
        return {
            'Ä': 'c', 'Ä': 'd', 'Ä›': 'e', 'Åˆ': 'n', 'Å™': 'r', 'Å¡': 's', 'Å¥': 't', 'Å¯': 'u',
            'Å¾': 'z', 'ÄŒ': 'C', 'ÄŽ': 'D', 'Äš': 'E', 'Å‡': 'N', 'Å˜': 'R', 'Å ': 'S', 'Å¤': 'T',
            'Å®': 'U', 'Å½': 'Z'
        };
    }

    function polish_map() {
        return {
            'Ä…': 'a', 'Ä‡': 'c', 'Ä™': 'e', 'Å‚': 'l', 'Å„': 'n', 'Ã³': 'o', 'Å›': 's', 'Åº': 'z',
            'Å¼': 'z', 'Ä„': 'A', 'Ä†': 'C', 'Ä˜': 'e', 'Å': 'L', 'Åƒ': 'N', 'Ã“': 'o', 'Åš': 'S',
            'Å¹': 'Z', 'Å»': 'Z'
        };
    }

    function latvian_map() {
        return {
            'Ä': 'a', 'Ä': 'c', 'Ä“': 'e', 'Ä£': 'g', 'Ä«': 'i', 'Ä·': 'k', 'Ä¼': 'l', 'Å†': 'n',
            'Å¡': 's', 'Å«': 'u', 'Å¾': 'z', 'Ä€': 'A', 'ÄŒ': 'C', 'Ä’': 'E', 'Ä¢': 'G', 'Äª': 'i',
            'Ä¶': 'k', 'Ä»': 'L', 'Å…': 'N', 'Å ': 'S', 'Åª': 'u', 'Å½': 'Z'
        };
    }

    function currency_map() {
        return {
            'â‚¬': 'euro', '$': 'dollar', 'â‚¢': 'cruzeiro', 'â‚£': 'french franc', 'Â£': 'pound',
            'â‚¤': 'lira', 'â‚¥': 'mill', 'â‚¦': 'naira', 'â‚§': 'peseta', 'â‚¨': 'rupee',
            'â‚©': 'won', 'â‚ª': 'new shequel', 'â‚«': 'dong', 'â‚­': 'kip', 'â‚®': 'tugrik',
            'â‚¯': 'drachma', 'â‚°': 'penny', 'â‚±': 'peso', 'â‚²': 'guarani', 'â‚³': 'austral',
            'â‚´': 'hryvnia', 'â‚µ': 'cedi', 'Â¢': 'cent', 'Â¥': 'yen', 'å…ƒ': 'yuan',
            'å††': 'yen', 'ï·¼': 'rial', 'â‚ ': 'ecu', 'Â¤': 'currency', 'à¸¿': 'baht'
        };
    }

    function symbols_map() {
        return {
            'Â©': '(c)', 'Å“': 'oe', 'Å’': 'OE', 'âˆ‘': 'sum', 'Â®': '(r)', 'â€ ': '+',
            'â€œ': '"', 'â€': '"', 'â€˜': "'", 'â€™': "'", 'âˆ‚': 'd', 'Æ’': 'f', 'â„¢': 'tm',
            'â„ ': 'sm', 'â€¦': '...', 'Ëš': 'o', 'Âº': 'o', 'Âª': 'a', 'â€¢': '*',
            'âˆ†': 'delta', 'âˆž': 'infinity', 'â™¥': 'love', '&': 'and'
        };
    }

    return this;
}
