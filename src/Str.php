<?php

declare(strict_types=1);

namespace Str;

class Str
{
    private $__str_buffer;

    const CHARS_ARRAY = [
        '0'     => ['°', '₀', '۰', '０'],
        '1'     => ['¹', '₁', '۱', '１'],
        '2'     => ['²', '₂', '۲', '２'],
        '3'     => ['³', '₃', '۳', '３'],
        '4'     => ['⁴', '₄', '۴', '٤', '４'],
        '5'     => ['⁵', '₅', '۵', '٥', '５'],
        '6'     => ['⁶', '₆', '۶', '٦', '６'],
        '7'     => ['⁷', '₇', '۷', '７'],
        '8'     => ['⁸', '₈', '۸', '８'],
        '9'     => ['⁹', '₉', '۹', '９'],
        'a'     => ['à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ',
            'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ā', 'ą', 'å',
            'α', 'ά', 'ἀ', 'ἁ', 'ἂ', 'ἃ', 'ἄ', 'ἅ', 'ἆ', 'ἇ',
            'ᾀ', 'ᾁ', 'ᾂ', 'ᾃ', 'ᾄ', 'ᾅ', 'ᾆ', 'ᾇ', 'ὰ', 'ά',
            'ᾰ', 'ᾱ', 'ᾲ', 'ᾳ', 'ᾴ', 'ᾶ', 'ᾷ', 'а', 'أ', 'အ',
            'ာ', 'ါ', 'ǻ', 'ǎ', 'ª', 'ა', 'अ', 'ا', 'ａ', 'ä'],
        'b'     => ['б', 'β', 'ب', 'ဗ', 'ბ', 'ｂ'],
        'c'     => ['ç', 'ć', 'č', 'ĉ', 'ċ', 'ｃ'],
        'd'     => ['ď', 'ð', 'đ', 'ƌ', 'ȡ', 'ɖ', 'ɗ', 'ᵭ', 'ᶁ', 'ᶑ',
            'д', 'δ', 'د', 'ض', 'ဍ', 'ဒ', 'დ', 'ｄ'],
        'e'     => ['é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ',
            'ệ', 'ë', 'ē', 'ę', 'ě', 'ĕ', 'ė', 'ε', 'έ', 'ἐ',
            'ἑ', 'ἒ', 'ἓ', 'ἔ', 'ἕ', 'ὲ', 'έ', 'е', 'ё', 'э',
            'є', 'ə', 'ဧ', 'ေ', 'ဲ', 'ე', 'ए', 'إ', 'ئ', 'ｅ'],
        'f'     => ['ф', 'φ', 'ف', 'ƒ', 'ფ', 'ｆ'],
        'g'     => ['ĝ', 'ğ', 'ġ', 'ģ', 'г', 'ґ', 'γ', 'ဂ', 'გ', 'گ', 'ｇ'],
        'h'     => ['ĥ', 'ħ', 'η', 'ή', 'ح', 'ه', 'ဟ', 'ှ', 'ჰ', 'ｈ'],
        'i'     => ['í', 'ì', 'ỉ', 'ĩ', 'ị', 'î', 'ï', 'ī', 'ĭ', 'į',
            'ı', 'ι', 'ί', 'ϊ', 'ΐ', 'ἰ', 'ἱ', 'ἲ', 'ἳ', 'ἴ',
            'ἵ', 'ἶ', 'ἷ', 'ὶ', 'ί', 'ῐ', 'ῑ', 'ῒ', 'ΐ', 'ῖ',
            'ῗ', 'і', 'ї', 'и', 'ဣ', 'ိ', 'ီ', 'ည်', 'ǐ', 'ი',
            'इ', 'ی', 'ｉ'],
        'j'     => ['ĵ', 'ј', 'Ј', 'ჯ', 'ج', 'ｊ'],
        'k'     => ['ķ', 'ĸ', 'к', 'κ', 'Ķ', 'ق', 'ك', 'က', 'კ', 'ქ',
            'ک', 'ｋ'],
        'l'     => ['ł', 'ľ', 'ĺ', 'ļ', 'ŀ', 'л', 'λ', 'ل', 'လ', 'ლ', 'ｌ'],
        'm'     => ['м', 'μ', 'م', 'မ', 'მ', 'ｍ'],
        'n'     => ['ñ', 'ń', 'ň', 'ņ', 'ŉ', 'ŋ', 'ν', 'н', 'ن', 'န', 'ნ', 'ｎ'],
        'o'     => ['ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ',
            'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ø', 'ō', 'ő',
            'ŏ', 'ο', 'ὀ', 'ὁ', 'ὂ', 'ὃ', 'ὄ', 'ὅ', 'ὸ', 'ό',
            'о', 'و', 'θ', 'ို', 'ǒ', 'ǿ', 'º', 'ო', 'ओ', 'ｏ',
            'ö'],
        'p'     => ['п', 'π', 'ပ', 'პ', 'پ', 'ｐ'],
        'q'     => ['ყ', 'ｑ'],
        'r'     => ['ŕ', 'ř', 'ŗ', 'р', 'ρ', 'ر', 'რ', 'ｒ'],
        's'     => ['ś', 'š', 'ş', 'с', 'σ', 'ș', 'ς', 'س', 'ص', 'စ', 'ſ', 'ს', 'ｓ'],
        't'     => ['ť', 'ţ', 'т', 'τ', 'ț', 'ت', 'ط', 'ဋ', 'တ', 'ŧ', 'თ', 'ტ', 'ｔ'],
        'u'     => ['ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ',
            'ự', 'û', 'ū', 'ů', 'ű', 'ŭ', 'ų', 'µ', 'у', 'ဉ',
            'ု', 'ူ', 'ǔ', 'ǖ', 'ǘ', 'ǚ', 'ǜ', 'უ', 'उ', 'ｕ',
            'ў', 'ü'],
        'v'     => ['в', 'ვ', 'ϐ', 'ｖ'],
        'w'     => ['ŵ', 'ω', 'ώ', 'ဝ', 'ွ', 'ｗ'],
        'x'     => ['χ', 'ξ', 'ｘ'],
        'y'     => ['ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'ÿ', 'ŷ', 'й', 'ы', 'υ',
            'ϋ', 'ύ', 'ΰ', 'ي', 'ယ', 'ｙ'],
        'z'     => ['ź', 'ž', 'ż', 'з', 'ζ', 'ز', 'ဇ', 'ზ', 'ｚ'],
        'aa'    => ['ع', 'आ', 'آ'],
        'ae'    => ['æ', 'ǽ'],
        'ai'    => ['ऐ'],
        'ch'    => ['ч', 'ჩ', 'ჭ', 'چ'],
        'dj'    => ['ђ', 'đ'],
        'dz'    => ['џ', 'ძ'],
        'ei'    => ['ऍ'],
        'gh'    => ['غ', 'ღ'],
        'ii'    => ['ई'],
        'ij'    => ['ĳ'],
        'kh'    => ['х', 'خ', 'ხ'],
        'lj'    => ['љ'],
        'nj'    => ['њ'],
        'oe'    => ['œ', 'ؤ'],
        'oi'    => ['ऑ'],
        'oii'   => ['ऒ'],
        'ps'    => ['ψ'],
        'sh'    => ['ш', 'შ', 'ش'],
        'shch'  => ['щ'],
        'ss'    => ['ß'],
        'sx'    => ['ŝ'],
        'th'    => ['þ', 'ϑ', 'ث', 'ذ', 'ظ'],
        'ts'    => ['ц', 'ც', 'წ'],
        'uu'    => ['ऊ'],
        'ya'    => ['я'],
        'yu'    => ['ю'],
        'zh'    => ['ж', 'ჟ', 'ژ'],
        '(c)'   => ['©'],
        'A'     => ['Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ',
            'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Å', 'Ā', 'Ą',
            'Α', 'Ά', 'Ἀ', 'Ἁ', 'Ἂ', 'Ἃ', 'Ἄ', 'Ἅ', 'Ἆ', 'Ἇ',
            'ᾈ', 'ᾉ', 'ᾊ', 'ᾋ', 'ᾌ', 'ᾍ', 'ᾎ', 'ᾏ', 'Ᾰ', 'Ᾱ',
            'Ὰ', 'Ά', 'ᾼ', 'А', 'Ǻ', 'Ǎ', 'Ａ', 'Ä'],
        'B'     => ['Б', 'Β', 'ब', 'Ｂ'],
        'C'     => ['Ç','Ć', 'Č', 'Ĉ', 'Ċ', 'Ｃ'],
        'D'     => ['Ď', 'Ð', 'Đ', 'Ɖ', 'Ɗ', 'Ƌ', 'ᴅ', 'ᴆ', 'Д', 'Δ', 'Ｄ'],
        'E'     => ['É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ',
            'Ệ', 'Ë', 'Ē', 'Ę', 'Ě', 'Ĕ', 'Ė', 'Ε', 'Έ', 'Ἐ',
            'Ἑ', 'Ἒ', 'Ἓ', 'Ἔ', 'Ἕ', 'Έ', 'Ὲ', 'Е', 'Ё', 'Э',
            'Є', 'Ə', 'Ｅ'],
        'F'     => ['Ф', 'Φ', 'Ｆ'],
        'G'     => ['Ğ', 'Ġ', 'Ģ', 'Г', 'Ґ', 'Γ', 'Ｇ'],
        'H'     => ['Η', 'Ή', 'Ħ', 'Ｈ'],
        'I'     => ['Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Î', 'Ï', 'Ī', 'Ĭ', 'Į',
            'İ', 'Ι', 'Ί', 'Ϊ', 'Ἰ', 'Ἱ', 'Ἳ', 'Ἴ', 'Ἵ', 'Ἶ',
            'Ἷ', 'Ῐ', 'Ῑ', 'Ὶ', 'Ί', 'И', 'І', 'Ї', 'Ǐ', 'ϒ',
            'Ｉ'],
        'J'     => ['Ｊ'],
        'K'     => ['К', 'Κ', 'Ｋ'],
        'L'     => ['Ĺ', 'Ł', 'Л', 'Λ', 'Ļ', 'Ľ', 'Ŀ', 'ल', 'Ｌ'],
        'M'     => ['М', 'Μ', 'Ｍ'],
        'N'     => ['Ń', 'Ñ', 'Ň', 'Ņ', 'Ŋ', 'Н', 'Ν', 'Ｎ'],
        'O'     => ['Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ',
            'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ø', 'Ō', 'Ő',
            'Ŏ', 'Ο', 'Ό', 'Ὀ', 'Ὁ', 'Ὂ', 'Ὃ', 'Ὄ', 'Ὅ', 'Ὸ',
            'Ό', 'О', 'Θ', 'Ө', 'Ǒ', 'Ǿ', 'Ｏ', 'Ö'],
        'P'     => ['П', 'Π', 'Ｐ'],
        'Q'     => ['Ｑ'],
        'R'     => ['Ř', 'Ŕ', 'Р', 'Ρ', 'Ŗ', 'Ｒ'],
        'S'     => ['Ş', 'Ŝ', 'Ș', 'Š', 'Ś', 'С', 'Σ', 'Ｓ'],
        'T'     => ['Ť', 'Ţ', 'Ŧ', 'Ț', 'Т', 'Τ', 'Ｔ'],
        'U'     => ['Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ',
            'Ự', 'Û', 'Ū', 'Ů', 'Ű', 'Ŭ', 'Ų', 'У', 'Ǔ', 'Ǖ',
            'Ǘ', 'Ǚ', 'Ǜ', 'Ｕ', 'Ў', 'Ü'],
        'V'     => ['В', 'Ｖ'],
        'W'     => ['Ω', 'Ώ', 'Ŵ', 'Ｗ'],
        'X'     => ['Χ', 'Ξ', 'Ｘ'],
        'Y'     => ['Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Ÿ', 'Ῠ', 'Ῡ', 'Ὺ', 'Ύ',
            'Ы', 'Й', 'Υ', 'Ϋ', 'Ŷ', 'Ｙ'],
        'Z'     => ['Ź', 'Ž', 'Ż', 'З', 'Ζ', 'Ｚ'],
        'AE'    => ['Æ', 'Ǽ'],
        'Ch'    => ['Ч'],
        'Dj'    => ['Ђ'],
        'Dz'    => ['Џ'],
        'Gx'    => ['Ĝ'],
        'Hx'    => ['Ĥ'],
        'Ij'    => ['Ĳ'],
        'Jx'    => ['Ĵ'],
        'Kh'    => ['Х'],
        'Lj'    => ['Љ'],
        'Nj'    => ['Њ'],
        'Oe'    => ['Œ'],
        'Ps'    => ['Ψ'],
        'Sh'    => ['Ш'],
        'Shch'  => ['Щ'],
        'Ss'    => ['ẞ'],
        'Th'    => ['Þ'],
        'Ts'    => ['Ц'],
        'Ya'    => ['Я'],
        'Yu'    => ['Ю'],
        'Zh'    => ['Ж'],
        ' '     => ["\xC2\xA0", "\xE2\x80\x80", "\xE2\x80\x81",
            "\xE2\x80\x82", "\xE2\x80\x83", "\xE2\x80\x84",
            "\xE2\x80\x85", "\xE2\x80\x86", "\xE2\x80\x87",
            "\xE2\x80\x88", "\xE2\x80\x89", "\xE2\x80\x8A",
            "\xE2\x80\xAF", "\xE2\x81\x9F", "\xE3\x80\x80",
            "\xEF\xBE\xA0"],
    ];

    public function __construct($str) { $this->__str_buffer = $str; }
    public function __toString(): string { return $this->__str_buffer; }
    public function getString(): string { return $this->__str_buffer; }

    public function substr(int $start = 0, int $length = 0): Str
    {
        $this->__str_buffer = \mb_substr($this->__str_buffer, $start, $length !== 0 ? $length : \mb_strlen($this->__str_buffer));
        return $this;
    }

    public function hasPrefix(string $prefix): bool
    {
        if ('' === $this->__str_buffer || '' === $prefix) { return false; }
        return (0 === \mb_strpos($this->__str_buffer, $prefix));
    }

    public function hasSuffix(string $suffix): bool
    {
        if ('' === $this->__str_buffer || '' === $suffix) { return false; }
        return \mb_substr($this->__str_buffer, -\mb_strlen($suffix)) === $suffix;
    }

    public function ensureLeft(string $check): Str
    {
        if ('' !== $check && 0 === \mb_strpos($this->__str_buffer, $check)) { return $this; }
        $this->__str_buffer = $check . $this->__str_buffer;
        return $this;
    }

    public function ensureRight(string $check): Str
    {
        if ('' !== $check && \mb_substr($this->__str_buffer, -\mb_strlen($check)) === $check) { return $this; }
        $this->__str_buffer .= $check;
        return $this;
    }

    public function contains(string $needle, bool $caseSensitive = true): bool
    {
        if ($this->__str_buffer === '' || $needle === '') { return false; }
        return $caseSensitive ? (false !== \mb_strpos($this->__str_buffer, $needle)) : (false !== \mb_stripos($this->__str_buffer, $needle));
    }

    public function replace(string $old, string $new): Str
    {
        $this->__str_buffer = \mb_ereg_replace(\preg_quote($old, '/'), $new, $this->__str_buffer);
        return $this;
    }

    public function replaceWithLimit(string $old, string $new, int $limit = -1): Str
    {
        if ($old === $new || $limit === 0) { return $this; }
        $strLower = \mb_strtolower($this->__str_buffer);
        $oldLower = \mb_strtolower($old);
        $oldCount = \mb_substr_count($strLower, $oldLower);
        if ($oldCount === 0) { return $this; }
        if ($limit < 0 || $oldCount < $limit) { $limit = $oldCount; }
        $offset = 0;
        while ($limit--) {
            $pos = \mb_strpos($this->__str_buffer, $old, $offset);
            $offset = $pos + \mb_strlen($old);
            $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $pos) . $new . \mb_substr($this->__str_buffer, $offset);
        }
        return $this;
    }

    public function toLowerCase(): Str
    {
        $this->__str_buffer = \mb_strtolower($this->__str_buffer);
        return $this;
    }

    public function toUpperCase(): Str
    {
        $this->__str_buffer = \mb_strtoupper($this->__str_buffer);
        return $this;
    }

    public function trim(string $chars = ''): Str
    {
        $chars = '' === $chars ? '\s' : \preg_quote($chars, '/');
        $this->__str_buffer = \mb_ereg_replace("^[$chars]+|[$chars]+\$", '', $this->__str_buffer);
        return $this;
    }

    public function trimLeft(string $chars = ''): Str
    {
        $chars = '' === $chars ? '\s' : \preg_quote($chars, '/');
        $this->__str_buffer = \mb_ereg_replace("^[$chars]+", '', $this->__str_buffer);
        return $this;
    }

    public function trimRight(string $chars = ''): Str
    {
        $chars = '' === $chars ? '\s' : \preg_quote($chars, '/');
        $this->__str_buffer = \mb_ereg_replace("[$chars]+\$", '', $this->__str_buffer);
        return $this;
    }

    public function append(string $sub): Str
    {
        $this->__str_buffer .= $sub;
        return $this;
    }

    public function prepend(string $sub): Str
    {
        $this->__str_buffer = $sub . $this->__str_buffer;
        return $this;
    }

    public function at(int $pos): Str
    {
        $this->__str_buffer = \mb_substr($this->__str_buffer, $pos, 1);
        return $this;
    }

    public function chars(): array
    {
        if ($this->__str_buffer === '') { return []; }
        $chars = [];
        for ($i = 0, $iMax = \mb_strlen($this->__str_buffer); $i < $iMax; $i++) { $chars[] = \mb_substr($this->__str_buffer, $i, 1); }
        return $chars;
    }

    public function length(): int
    {
        return \mb_strlen($this->__str_buffer);
    }

    public function first(int $length = 1): Str
    {
        if ($length <= 0) { $this->__str_buffer = ''; return $this; }
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $length);
        return $this;
    }

    public function last(int $length = 1): Str
    {
        if ($length <= 0) { $this->__str_buffer = ''; return $this; }
        $this->__str_buffer = \mb_substr($this->__str_buffer, -$length);
        return $this;
    }

    public function indexOf(string $needle, int $offset = 0): int
    {
        if ($needle === '' || $this->__str_buffer === '')  { return -1; }
        $pos = \mb_strpos($this->__str_buffer, $needle, $offset);
        return false === $pos ? -1 : $pos;
    }

    public function indexOfLast(string $needle, int $offset = 0): int
    {
        if ($needle === '' || $this->__str_buffer === '') { return -1; }
        $maxLen = \mb_strlen($this->__str_buffer);
        if ($offset < 0) { $offset = $maxLen - (int)abs($offset); }
        if ($offset > $maxLen || $offset < 0) { return -1; }
        $pos = \mb_strrpos($this->__str_buffer, $needle, $offset);
        return false === $pos ? -1 : $pos;
    }

    public function countSubstr(string $needle, bool $caseSensitive = true): int
    {
        if ($caseSensitive) { return \mb_substr_count($this->__str_buffer, $needle); }
        return \mb_substr_count(\mb_strtolower($this->__str_buffer), \mb_strtolower($needle));
    }

    public function containsAll(array $needles, bool $caseSensitive = true): bool
    {
        if ([] === $needles) { return false; }
        foreach ($needles as $needle) { if (!$this->contains($needle, $caseSensitive)) { return false; } }
        return true;
    }

    public function containsAny(array $needles, bool $caseSensitive = true): bool
    {
        foreach ($needles as $needle) { if ($this->contains($needle, $caseSensitive)) { return true; } }
        return false;
    }

    public function startsWith(string $substring, bool $caseSensitive = true): bool
    {
        if ($caseSensitive) { return 0 === \mb_strpos($this->__str_buffer, $substring); }
        return 0 === \mb_stripos($this->__str_buffer, $substring);
    }

    public function startsWithAny(array $substrings, bool $caseSensitive = true): bool
    {
        foreach ($substrings as $substring) { if ($this->startsWith($substring, $caseSensitive)) { return true; } }
        return false;
    }

    public function endsWith(string $substring, bool $caseSensitive = true): bool
    {
        if ($caseSensitive) { return \mb_substr($this->__str_buffer, -\mb_strlen($substring)) === $substring; }
        return -1 !== \mb_strripos($this->__str_buffer, $substring);
    }

    public function endsWithAny(array $substrings, bool $caseSensitive = true): bool
    {
        foreach ($substrings as $substring) { if ($this->endsWith($substring, $caseSensitive)) { return true; } }
        return false;
    }

    public function padBoth(int $length, string $padStr = ' '): Str
    {
        $padding = $length - \mb_strlen($this->__str_buffer);
        $this->applyPadding((int)floor($padding / 2), (int)ceil($padding / 2), $padStr);
        return $this;
    }

    private function applyPadding(int $left = 0, int $right = 0, string $padStr = ' '): Str
    {
        if ('' === $padStr || $right + $left <= 0) { return $this; }
        $leftPadding = \mb_substr(str_repeat($padStr, $left), 0, $left);
        $rightPadding = \mb_substr(str_repeat($padStr, $right), 0, $right);
        $this->__str_buffer = $leftPadding . $this->__str_buffer . $rightPadding;
        return $this;
    }

    public function padLeft(int $length, string $padStr = ' '): Str
    {
        $this->applyPadding($length - \mb_strlen($this->__str_buffer), 0, $padStr);
        return $this;
    }

    public function padRight(int $length, string $padStr = ' '): Str
    {
        $this->applyPadding(0, $length - \mb_strlen($this->__str_buffer), $padStr);
        return $this;
    }

    public function insert(string $substring, int $index): Str
    {
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $index) . $substring . \mb_substr($this->__str_buffer, $index);
        return $this;
    }

    public function removeLeft(string $substring): Str
    {
        if ('' !== $substring && 0 === \mb_strpos($this->__str_buffer, $substring)) { $this->__str_buffer = \mb_substr($this->__str_buffer, \mb_strlen($substring)); }
        return $this;
    }

    public function removeRight(string $substring): Str
    {
        if ('' !== $substring && \mb_substr($this->__str_buffer, -\mb_strlen($substring)) === $substring) { $this->__str_buffer = \mb_substr($this->__str_buffer, 0, \mb_strlen($this->__str_buffer) - \mb_strlen($substring)); }
        return $this;
    }

    public function repeat(int $multiplier): Str
    {
        $this->__str_buffer = \str_repeat($this->__str_buffer, $multiplier);
        return $this;
    }

    public function reverse(): Str
    {
        $reversed = '';
        $i = \mb_strlen($this->__str_buffer);
        while ($i--) { $reversed .= \mb_substr($this->__str_buffer, $i, 1); }
        $this->__str_buffer = $reversed;
        return $this;
    }

    public function shuffle(): Str
    {
        $indexes = \range(0, \mb_strlen($this->__str_buffer) - 1);
        \shuffle($indexes);
        $shuffledStr = '';
        foreach ($indexes as $i) { $shuffledStr .= \mb_substr($this->__str_buffer, $i, 1); }
        $this->__str_buffer = $shuffledStr;
        return $this;
    }

    public function between(string $start, string $end, int $offset = 0): Str
    {
        $posStart = \mb_strpos($this->__str_buffer, $start, $offset);
        if ($posStart === false) { $this->__str_buffer = ''; return $this; }
        $substrIndex = $posStart + \mb_strlen($start);
        $posEnd = \mb_strpos($this->__str_buffer, $end, $substrIndex);
        if ($posEnd === false || $posEnd === $substrIndex) { $this->__str_buffer = ''; return $this; }
        $this->__str_buffer = \mb_substr($this->__str_buffer, $substrIndex, $posEnd - $substrIndex);
        return $this;
    }

    public function camelize(): Str
    {
        $this->__str_buffer = \mb_ereg_replace("^['\s']+|['\s']+\$", '', $this->__str_buffer);
        $this->__str_buffer = \mb_strtolower(\mb_substr($this->__str_buffer, 0, 1)) . \mb_substr($this->__str_buffer, 1);
        $this->__str_buffer = preg_replace('/^[-_]+/', '', $this->__str_buffer);
        $this->__str_buffer = preg_replace_callback('/[-_\s]+(.)?/u', function ($match) { if (isset($match[1])) { return \mb_strtoupper($match[1]); } return ''; }, $this->__str_buffer);
        $this->__str_buffer = preg_replace_callback('/[\d]+(.)?/u', function ($match) { return \mb_strtoupper($match[0]); }, $this->__str_buffer);
        return $this;
    }

    public function lowerCaseFirst(): Str
    {
        $this->__str_buffer = \mb_strtolower(\mb_substr($this->__str_buffer, 0, 1)) . \mb_substr($this->__str_buffer, 1);
        return $this;
    }

    public function upperCaseFirst(): Str
    {
        $this->__str_buffer = \mb_strtoupper(\mb_substr($this->__str_buffer, 0, 1)) . \mb_substr($this->__str_buffer, 1);
        return $this;
    }

    public function collapseWhitespace(): Str
    {
        $this->__str_buffer = \mb_ereg_replace('[[:space:]]+', ' ', $this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace("^['\s']+|['\s']+\$", '', $this->__str_buffer);
        return $this;
    }

    public function regexReplace(string $pattern, string $replacement, string $options = 'msr'): Str
    {
        $this->__str_buffer = \mb_ereg_replace($pattern, $replacement, $this->__str_buffer, $options);
        return $this;
    }

    public function dasherize(): Str
    {
        $this->__str_buffer = \mb_ereg_replace("^['\s']+|['\s']+\$", '', $this->__str_buffer);
        $this->__str_buffer = \mb_strtolower(\mb_ereg_replace('\B([A-Z])', '-\1', $this->__str_buffer));
        $this->__str_buffer = \mb_ereg_replace('[-_\s]+', '-', $this->__str_buffer);
        return $this;
    }

    public function delimit($delimiter): Str
    {
        $this->__str_buffer = \mb_ereg_replace("^['\s']+|['\s']+\$", '', $this->__str_buffer);
        $this->__str_buffer = \mb_strtolower(\mb_ereg_replace('\B([A-Z])', '-\1', $this->__str_buffer));
        $this->__str_buffer = \mb_ereg_replace('[-_\s]+', $delimiter, $this->__str_buffer);
        return $this;
    }

    public function isUUIDv4(): bool
    {
        return (bool)\preg_match("/^[a-f0-9]{8}-?[a-f0-9]{4}-?4[a-f0-9]{3}-?[89ab][a-f0-9]{3}-?[a-f0-9]{12}\Z/", $this->__str_buffer);
    }

    public function hasLowerCase(): bool
    {
        return \mb_ereg_match('.*[[:lower:]]', $this->__str_buffer);
    }

    public function hasUpperCase(): bool
    {
        return \mb_ereg_match('.*[[:upper:]]', $this->__str_buffer);
    }

    public function matchesPattern(string $pattern): bool
    {
        return \mb_ereg_match($pattern, $this->__str_buffer);
    }

    public function htmlDecode(int $flags = ENT_COMPAT): Str
    {
        $this->__str_buffer = \html_entity_decode($this->__str_buffer, $flags);
        return $this;
    }

    public function htmlEncode(int $flags = ENT_COMPAT): Str
    {
        $this->__str_buffer = \htmlentities($this->__str_buffer, $flags);
        return $this;
    }

    public function humanize(): Str
    {
        $this->__str_buffer = \str_replace('_', ' ', $this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace("^['\s']+|['\s']+\$", '', $this->__str_buffer);
        $this->__str_buffer = \mb_strtoupper(\mb_substr($this->__str_buffer, 0, 1)) . \mb_substr($this->__str_buffer, 1);
        return $this;
    }

    public function isAlpha(): bool
    {
        return \mb_ereg_match('^[[:alpha:]]*$', $this->__str_buffer);
    }

    public function isAlphanumeric(): bool
    {
        return \mb_ereg_match('^[[:alnum:]]*$', $this->__str_buffer);
    }

    public function isBase64(): bool
    {
        return (base64_encode(base64_decode($this->__str_buffer)) === $this->__str_buffer);
    }

    public function isBlank(): bool
    {
        return \mb_ereg_match('^[[:space:]]*$', $this->__str_buffer);
    }

    public function isHexadecimal(): bool
    {
        return \mb_ereg_match('^[[:xdigit:]]*$', $this->__str_buffer);
    }

    public function isJson(): bool
    {
        json_decode($this->__str_buffer);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function isLowerCase(): bool
    {
        return \mb_ereg_match('^[[:lower:]]*$', $this->__str_buffer);
    }

    public function isSerialized(): bool
    {
        return ($this->__str_buffer === 'b:0;') || (@unserialize($this->__str_buffer, []) !== false);
    }

    public function isUpperCase(): bool
    {
        return \mb_ereg_match('^[[:upper:]]*$', $this->__str_buffer);
    }

    public function lines(): array
    {
        if ('' === $this->__str_buffer) { return []; }
        return \mb_split('[\r\n]{1,2}', $this->__str_buffer);
    }

    public function split(string $pattern, int $limit = -1): array
    {
        if ($limit === 0) { return []; }
        if ($pattern === '') { return [$this->__str_buffer]; }
        if ($limit >= 0) { return array_filter(\mb_split($pattern, $this->__str_buffer), function () use (&$limit) { return --$limit >= 0; }); }
        return \mb_split($pattern, $this->__str_buffer);
    }

    public function longestCommonPrefix(string $otherStr): Str
    {
        $maxLength = min(\mb_strlen($this->__str_buffer), \mb_strlen($otherStr));
        $longestCommonPrefix = '';
        for ($i = 0; $i < $maxLength; $i++) {
            $char = \mb_substr($this->__str_buffer, $i, 1);
            if ($char === \mb_substr($otherStr, $i, 1)) { $longestCommonPrefix .= $char; } else { break; }
        }
        $this->__str_buffer = $longestCommonPrefix;
        return $this;
    }

    public function longestCommonSuffix(string $otherStr): Str
    {
        $maxLength = min(\mb_strlen($this->__str_buffer), \mb_strlen($otherStr));
        $longestCommonSuffix = '';
        for ($i = 1; $i <= $maxLength; $i++) {
            $char = \mb_substr($this->__str_buffer, -$i, 1);
            if ($char === \mb_substr($otherStr, -$i, 1)) { $longestCommonSuffix = $char . $longestCommonSuffix; } else { break; }
        }
        $this->__str_buffer = $longestCommonSuffix;
        return $this;
    }

    public function longestCommonSubstring(string $otherStr): Str
    {
        $strLength = \mb_strlen($this->__str_buffer);
        $otherLength = \mb_strlen($otherStr);
        $len = 0;
        $end = 0;
        $table = \array_fill(0, $strLength, \array_fill(0, $otherLength, 0));
        for ($i = 1; $i <= $strLength; $i++) {
            for ($j = 1; $j <= $otherLength; $j++) {
                $strChar = \mb_substr($this->__str_buffer, $i - 1, 1);
                $otherChar = \mb_substr($otherStr, $j - 1, 1);
                if ($strChar === $otherChar) {
                    $table[$i][$j] = $table[$i - 1][$j - 1] + 1;
                    if ($table[$i][$j] > $len) { $len = $table[$i][$j]; $end = $i; } } else { $table[$i][$j] = 0; }
            }
        }
        $this->__str_buffer = \mb_substr($this->__str_buffer, $end - $len, $len);
        return $this;
    }

    public function safeTruncate(int $length, string $substring = ''): Str
    {
        if ($length >= \mb_strlen($this->__str_buffer)) { return $this; }
        $length -= \mb_strlen($substring);
        $truncated = \mb_substr($this->__str_buffer, 0, $length);
        if (\mb_strpos($this->__str_buffer, ' ', $length - 1) !== $length) {
            $lastPos = \mb_strrpos($truncated, ' ', 0);
            if ($lastPos !== false) { $truncated = \mb_substr($truncated, 0, $lastPos); }
        }
        $this->__str_buffer = $truncated . $substring;
        return $this;
    }

    public function slugify(string $replacement = '-', string $language = 'en'): Str
    {
        $split = \preg_split('/[-_]/', $language);
        $language = \strtolower($split[0]);
        $languageSpecific = ['de' => [['ä',  'ö',  'ü',  'Ä',  'Ö',  'Ü' ], ['ae', 'oe', 'ue', 'AE', 'OE', 'UE']], 'bg' => [['х', 'Х', 'щ', 'Щ', 'ъ', 'Ъ', 'ь', 'Ь'], ['h', 'H', 'sht', 'SHT', 'a', 'А', 'y', 'Y']]];
        if (!empty($languageSpecific[$language])) { $this->__str_buffer = \str_replace($languageSpecific[$language][0], $languageSpecific[$language][1], $this->__str_buffer); }
        foreach (self::CHARS_ARRAY as $key => $value) { $this->__str_buffer = \str_replace($value, $key, $this->__str_buffer); }
        $this->__str_buffer = \str_replace('@', $replacement, $this->__str_buffer);
        $quotedReplacement = \preg_quote($replacement, '/');
        $pattern = "/[^a-zA-Z\d\s-_$quotedReplacement]/u";
        $this->__str_buffer = \preg_replace($pattern, '', $this->__str_buffer);
        $this->__str_buffer = \strtolower($this->__str_buffer);
        $this->__str_buffer = \preg_replace("/^['\s']+|['\s']+\$/", '', $this->__str_buffer);
        $this->__str_buffer = \preg_replace('/\B([A-Z])/', '/-\1/', $this->__str_buffer);
        $this->__str_buffer = \preg_replace('/[-_\s]+/', $replacement, $this->__str_buffer);
        $l = \strlen($replacement);
        if (0 === \strpos($this->__str_buffer, $replacement)) { $this->__str_buffer = \substr($this->__str_buffer, $l); }
        if (\substr($this->__str_buffer, -$l) === $replacement) { $this->__str_buffer = \substr($this->__str_buffer, 0, \strlen($this->__str_buffer) - $l); }
        return $this;
    }

    public function toAscii(string $language = 'en', bool $removeUnsupported = true): Str
    {
        $split = \preg_split('/[-_]/', $language);
        $language = \strtolower($split[0]);
        $languageSpecific = ['de' => [['ä',  'ö',  'ü',  'Ä',  'Ö',  'Ü' ], ['ae', 'oe', 'ue', 'AE', 'OE', 'UE']], 'bg' => [['х', 'Х', 'щ', 'Щ', 'ъ', 'Ъ', 'ь', 'Ь'], ['h', 'H', 'sht', 'SHT', 'a', 'А', 'y', 'Y']]];
        if (!empty($languageSpecific[$language])) { $this->__str_buffer = \str_replace($languageSpecific[$language][0], $languageSpecific[$language][1], $this->__str_buffer); }
        foreach (self::CHARS_ARRAY as $key => $value) { $this->__str_buffer = \str_replace($value, $key, $this->__str_buffer); }
        if ($removeUnsupported) { $this->__str_buffer = \preg_replace('/[^\x20-\x7E]/', '', $this->__str_buffer); }
        return $this;
    }

    public function slice(int $start, int $end = null): Str
    {
        if ($end === null) { $length = \mb_strlen($this->__str_buffer); }
        elseif ($end >= 0 && $end <= $start) { $this->__str_buffer = ''; return $this; }
        elseif ($end < 0) { $length = \mb_strlen($this->__str_buffer) + $end - $start; }
        else { $length = $end - $start; }
        $this->__str_buffer = \mb_substr($this->__str_buffer, $start, $length);
        return $this;
    }

    public function stripWhitespace(): Str
    {
        $this->__str_buffer = \mb_ereg_replace('[[:space:]]+', '', $this->__str_buffer);
        return $this;
    }

    public function truncate(int $length, string $substring = ''): Str
    {
        if ($length >= \mb_strlen($this->__str_buffer)) { return $this; }
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $length - \mb_strlen($substring)) . $substring;
        return $this;
    }

    public function upperCamelize(): Str
    {
        $this->__str_buffer = \mb_ereg_replace("^[\s]+|[\s]+\$", '', $this->__str_buffer);
        $this->__str_buffer = preg_replace('/^[-_]+/', '', $this->__str_buffer);
        $this->__str_buffer = preg_replace_callback('/[-_\s]+(.)?/u', function ($match) { if (isset($match[1])) { return \mb_strtoupper($match[1]); } return ''; }, $this->__str_buffer);
        $this->__str_buffer = preg_replace_callback('/[\d]+(.)?/u', function ($match) { return \mb_strtoupper($match[0]); }, $this->__str_buffer);
        $this->__str_buffer = \mb_strtoupper(\mb_substr($this->__str_buffer, 0, 1)) . \mb_substr($this->__str_buffer, 1);
        return $this;
    }

    public function surround(string $substring): Str
    {
        $this->__str_buffer = $substring . $this->__str_buffer . $substring;
        return $this;
    }

    public function swapCase(): Str
    {
        $this->__str_buffer = \preg_replace_callback('/[\S]/u', function ($match) { if ($match[0] === \mb_strtoupper($match[0])) { return \mb_strtolower($match[0]); } return \mb_strtoupper($match[0]); }, $this->__str_buffer);
        return $this;
    }

    public function tidy(): Str
    {
        $this->__str_buffer = \preg_replace(['/\x{2026}/u', '/[\x{201C}\x{201D}]/u', '/[\x{2018}\x{2019}]/u', '/[\x{2013}\x{2014}]/u'], ['...', '"', "'", '-'], $this->__str_buffer);
        return $this;
    }

    public function titleize(array $ignore = []): Str
    {
        $this->__str_buffer = \mb_ereg_replace("^[\s]+|[\s]+\$", '', $this->__str_buffer);
        $this->__str_buffer = preg_replace_callback('/([\S]+)/u', function ($match) use ($ignore) {
            if ($ignore && \in_array($match[0], $ignore, true)) { return $match[0]; }
            $this->__str_buffer = \mb_strtoupper(\mb_substr($match[0], 0, 1)) . \mb_strtolower(\mb_substr($match[0], 1));
            return $this->__str_buffer; }, $this->__str_buffer);
        return $this;
    }

    public function toBoolean(): bool
    {
        $key = \strtolower($this->__str_buffer);
        $map = ['true' => true, '1' => true, 'on' => true, 'yes' => true, 'false' => false, '0' => false, 'off' => false, 'no' => false];
        if (\array_key_exists($key, $map)) { return $map[$key]; }
        if (\is_numeric($this->__str_buffer)) { return $this->__str_buffer + 0 > 0; }
        return (bool)\mb_ereg_replace('[[:space:]]+', '', $this->__str_buffer);
    }

    public function toSpaces(int $tabLength = 4): Str
    {
        $this->__str_buffer = \str_replace("\t", \str_repeat(' ', $tabLength), $this->__str_buffer);
        return $this;
    }

    public function toTabs(int $tabLength = 4): Str
    {
        $this->__str_buffer = \str_replace(\str_repeat(' ', $tabLength), "\t", $this->__str_buffer);
        return $this;
    }

    public function toTitleCase(): Str
    {
        $this->__str_buffer = \mb_convert_case($this->__str_buffer, \MB_CASE_TITLE);
        return $this;
    }

    public function underscored(): Str
    {
        $this->__str_buffer = \mb_ereg_replace("^['\s']+|['\s']+\$", '', $this->__str_buffer);
        $this->__str_buffer = \mb_strtolower(\mb_ereg_replace('\B([A-Z])', '-\1', $this->__str_buffer));
        $this->__str_buffer = \mb_ereg_replace('[-_\s]+', '_', $this->__str_buffer);
        return $this;
    }

    public function move(int $start, int $length, int $destination): Str
    {
        if ($destination <= $length) { return $this; }
        $substr = \mb_substr($this->__str_buffer, $start, $length);
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $destination) . $substr . \mb_substr($this->__str_buffer, $destination);
        $pos = \mb_strpos($this->__str_buffer, $substr, 0);
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $pos) . \mb_substr($this->__str_buffer, $pos + \mb_strlen($substr));
        return $this;
    }

    public function overwrite(int $start, int $length, string $substr): Str
    {
        if ($length <= 0) { return $this; }
        $sub = \mb_substr($this->__str_buffer, $start, $length);
        $pos = \mb_strpos($this->__str_buffer, $sub, 0);
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $pos) . $substr . \mb_substr($this->__str_buffer, $pos + \mb_strlen($sub));
        return $this;
    }

    public function snakeize(): Str
    {
        $this->__str_buffer = \mb_ereg_replace('::', '/', $this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace('([A-Z]+)([A-Z][a-z])', '\1_\2', $this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace('([a-z\d])([A-Z])', '\1_\2', $this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace('\s+', '_', $this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace('\s+', '_', $this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace('^\s+|\s+$', '', $this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace('-', '_', $this->__str_buffer);
        $this->__str_buffer = \mb_strtolower($this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace_callback('([\d|A-Z])', function ($matches) { $match = $matches[1]; if ((string)(int)$match === $match) { return '_' . $match . '_'; }}, $this->__str_buffer);
        $this->__str_buffer = \mb_ereg_replace('_+', '_', $this->__str_buffer);
        $this->__str_buffer = \preg_replace('/^[_]+|[_]+$/', '', $this->__str_buffer);

        return $this;
    }

    public function afterFirst(string $needle, string $substr, int $times = 1): Str
    {
        $idxEnd = \mb_strpos($this->__str_buffer, $needle) + \mb_strlen($needle);
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $idxEnd) . \str_repeat($substr, $times) . \mb_substr($this->__str_buffer, $idxEnd);
        return $this;
    }

    public function beforeFirst(string $needle, string $substr, int $times = 1): Str
    {
        $idx = \mb_strpos($this->__str_buffer, $needle);
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $idx) . \str_repeat($substr, $times) . \mb_substr($this->__str_buffer, $idx);
        return $this;
    }

    public function afterLast(string $needle, string $substr, int $times = 1): Str
    {
        $idxEnd = \mb_strrpos($this->__str_buffer, $needle) + \mb_strlen($needle);
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $idxEnd) . \str_repeat($substr, $times) . \mb_substr($this->__str_buffer, $idxEnd);
        return $this;
    }

    public function beforeLast(string $needle, string $substr, int $times = 1): Str
    {
        $idx = \mb_strrpos($this->__str_buffer, $needle);
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, $idx) . \str_repeat($substr, $times) . \mb_substr($this->__str_buffer, $idx);
        return $this;
    }

    public function isEmail(): bool
    {
        return \count(\mb_split('@', $this->__str_buffer)) === 2;
    }

    public function isIpV4(): bool
    {
        return (bool)\preg_match('/\b((25[0-5]|2[0-4][\d]|[01]?[\d][\d]?)(\.|$)){4}\b/', $this->__str_buffer);
    }

    public function isIpV6(): bool
    {
        return (bool)\preg_match('/^\s*((([0-9A-Fa-f]{1,4}:){7}([0-9A-Fa-f]{1,4}|:))|(([0-9A-Fa-f]{1,4}:){6}(:[0-9A-Fa-f]{1,4}|((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){5}(((:[0-9A-Fa-f]{1,4}){1,2})|:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3})|:))|(([0-9A-Fa-f]{1,4}:){4}(((:[0-9A-Fa-f]{1,4}){1,3})|((:[0-9A-Fa-f]{1,4})?:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){3}(((:[0-9A-Fa-f]{1,4}){1,4})|((:[0-9A-Fa-f]{1,4}){0,2}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){2}(((:[0-9A-Fa-f]{1,4}){1,5})|((:[0-9A-Fa-f]{1,4}){0,3}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(([0-9A-Fa-f]{1,4}:){1}(((:[0-9A-Fa-f]{1,4}){1,6})|((:[0-9A-Fa-f]{1,4}){0,4}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:))|(:(((:[0-9A-Fa-f]{1,4}){1,7})|((:[0-9A-Fa-f]{1,4}){0,5}:((25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)(\.(25[0-5]|2[0-4]\d|1\d\d|[1-9]?\d)){3}))|:)))(%.+)?\s*$/', $this->__str_buffer);
    }

    public function random(int $size, int $sizeMax = -1, string $possibleChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'): Str
    {
        if ($size <= 0 || $sizeMax === 0) { $this->__str_buffer = ''; return $this; }
        if ($sizeMax > 0 && $sizeMax < $size) { $this->__str_buffer = ''; return $this; }
        $maxLen = $sizeMax > 0 ? $sizeMax : $size;
        $actualLen = \rand($size, $maxLen);
        $allowedCharsLen = \mb_strlen($possibleChars) - 1;
        $result = '';
        while ($actualLen--) { $char = \mb_substr($possibleChars, \rand(0, $allowedCharsLen), 1); $result .= $char; }
        $this->__str_buffer = $result;
        return $this;
    }

    public function appendUniqueIdentifier(int $size = 4, int $sizeMax = -1, string $possibleChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'): Str
    {
        if ($size <= 0 || $sizeMax === 0) { $this->__str_buffer = ''; return $this; }
        if ($sizeMax > 0 && $sizeMax < $size) { $this->__str_buffer = ''; return $this; }
        $maxLen = $sizeMax > 0 ? $sizeMax : $size;
        $actualLen = \rand($size, $maxLen);
        $allowedCharsLen = \mb_strlen($possibleChars) - 1;
        $result = '';
        while ($actualLen--) { $char = \mb_substr($possibleChars, \rand(0, $allowedCharsLen), 1); $result .= $char; }
        $this->__str_buffer .= $result;
        return $this;
    }

    public function words(): array
    {
        if ('' === $this->__str_buffer) { return []; }
        return \mb_split('[[:space:]]+', $this->__str_buffer);
    }

    public function quote(string $quote = '"'): Str
    {
        $words = \mb_split('[[:space:]]+', $this->__str_buffer);
        $result = [];
        foreach ($words as $word) { $result[] = $quote . $word . $quote; }
        $this->__str_buffer = \implode(' ', $result);
        return $this;
    }

    public function unquote(string $quote = '"'): Str
    {
        $words = \mb_split('[[:space:]]+', $this->__str_buffer);
        $result = [];
        foreach ($words as $word) {
            $this->__str_buffer = $word;
            $this->__str_buffer = \mb_ereg_replace("^[$quote]+|[$quote]+\$", '', $this->__str_buffer);
            $result[] = $this->__str_buffer;
        }
        $this->__str_buffer = \implode(' ', $result);
        return $this;
    }

    public function chop(int $step): array
    {
        $result = [];
        $len = \mb_strlen($this->__str_buffer);
        if ($this->__str_buffer === '' || $step <= 0) { return []; }
        if ($step >= $len) { return [$this->__str_buffer]; }
        $startPos = 0;
        for ($i = 0; $i < $len; $i+=$step) { $result[] = \mb_substr($this->__str_buffer, $startPos, $step); $startPos += $step; }
        return $result;
    }

    public function join(string $separator, array $otherStrings = []): Str
    {
        if ('' === $this->__str_buffer) { return $this; }
        foreach ($otherStrings as $otherString) { $this->__str_buffer .= ($separator . $otherString); }
        return $this;
    }

    public function shift(string $delimiter): Str
    {
        if ('' === $delimiter) { $this->__str_buffer = ''; return $this; }
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, \mb_strpos($this->__str_buffer, $delimiter) ?: \mb_strlen($this->__str_buffer));
        return $this;
    }

    public function shiftReversed(string $delimiter): Str
    {
        if ('' === $delimiter) { $this->__str_buffer = ''; return $this; }
        $idx = \mb_strpos($this->__str_buffer, $delimiter);
        $this->__str_buffer = \mb_substr($this->__str_buffer, $idx ? $idx + 1 : 0);
        return $this;
    }

    public function pop(string $delimiter): Str
    {
        if ('' === $delimiter) { $this->__str_buffer = ''; return $this; }
        $idx = \mb_strrpos($this->__str_buffer, $delimiter);
        $this->__str_buffer = \mb_substr($this->__str_buffer, $idx ? $idx + 1 : 0);
        return $this;
    }

    public function popReversed(string $delimiter): Str
    {
        if ('' === $delimiter) { $this->__str_buffer = ''; return $this; }
        $this->__str_buffer = \mb_substr($this->__str_buffer, 0, \mb_strrpos($this->__str_buffer, $delimiter) ?: \mb_strlen($this->__str_buffer));
        return $this;
    }
}
