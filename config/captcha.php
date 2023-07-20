<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Captcha Character Length
    |--------------------------------------------------------------------------
    |
    | This value defines the length of the Captcha code that will be displayed.
    |
    */

    'length' => 5,

    /*
    |--------------------------------------------------------------------------
    | Image Width
    |--------------------------------------------------------------------------
    |
    | This value defines the width of the Captcha image in pixels.
    |
    */

    'width' => 120,

    /*
    |--------------------------------------------------------------------------
    | Image Height
    |--------------------------------------------------------------------------
    |
    | This value defines the height of the Captcha image in pixels.
    |
    */

    'height' => 36,

    /*
    |--------------------------------------------------------------------------
    | Image Quality
    |--------------------------------------------------------------------------
    |
    | This value defines the quality of the Captcha image (0-100).
    |
    */

    'quality' => 90,

    /*
    |--------------------------------------------------------------------------
    | Math Captcha
    |--------------------------------------------------------------------------
    |
    | This option enables or disables the use of a math-based Captcha.
    | When set to true, the Captcha will display a simple math equation.
    | When set to false, the Captcha will display random characters.
    |
    */

    'math' => true,

    /*
    |--------------------------------------------------------------------------
    | Captcha Expiration
    |--------------------------------------------------------------------------
    |
    | This value defines the expiration time for stateless/API captcha in seconds.
    | After this time, the Captcha code will no longer be valid.
    |
    */

    'expire' => 60,

    /*
    |--------------------------------------------------------------------------
    | Captcha Session Key
    |--------------------------------------------------------------------------
    |
    | This value is the key used to store the Captcha code in the session.
    |
    */

    'session_key' => 'captcha',

    /*
    |--------------------------------------------------------------------------
    | Captcha Characters
    |--------------------------------------------------------------------------
    |
    | This value defines the characters that can be used to generate the Captcha code.
    | By default, it uses alphanumeric characters excluding vowels (to avoid confusion).
    |
    */

    'characters' => '2346789bcdfghjkmnpqrtvwxyz',

    /*
    |--------------------------------------------------------------------------
    | Captcha Case Sensitivity
    |--------------------------------------------------------------------------
    |
    | This option determines whether the Captcha comparison is case sensitive or not.
    | When set to true, the Captcha comparison will be case sensitive.
    |
    */

    'case_sensitive' => false,

    /*
    |--------------------------------------------------------------------------
    | Captcha Font Options
    |--------------------------------------------------------------------------
    |
    | This array allows you to specify additional font options for the Captcha.
    | You can customize the font used, its size, and other font options.
    |
    */

    'fonts' => [],

    /*
    |--------------------------------------------------------------------------
    | Captcha Characters Colors
    |--------------------------------------------------------------------------
    |
    | This array allows you to specify multiple colors for the Captcha characters.
    | The Captcha will randomly select a color for each character from this array.
    |
    */

    'characters_colors' => [],

    /*
    |--------------------------------------------------------------------------
    | Captcha Background Color
    |--------------------------------------------------------------------------
    |
    | This value defines the background color of the Captcha image.
    | You can use hexadecimal color codes (e.g., #FFFFFF) or RGB values.
    |
    */

    'background_color' => '#F9F9F9',

    /*
    |--------------------------------------------------------------------------
    | Captcha Noise
    |--------------------------------------------------------------------------
    |
    | This option enables or disables noise (distortion) in the Captcha image.
    | When set to true, the Captcha will have random lines and dots for noise.
    |
    */

    'noise' => true,

    /*
    |--------------------------------------------------------------------------
    | Captcha Noise Color
    |--------------------------------------------------------------------------
    |
    | This value defines the color of the noise (distortion) in the Captcha image.
    | You can use hexadecimal color codes (e.g., #000000) or RGB values.
    |
    */

    'noise_color' => '#CCCCCC',

    /*
    |--------------------------------------------------------------------------
    | Captcha Border
    |--------------------------------------------------------------------------
    |
    | This option enables or disables a border around the Captcha image.
    | When set to true, the Captcha will have a border around it.
    |
    */

    'border' => true,

    /*
    |--------------------------------------------------------------------------
    | Captcha Border Color
    |--------------------------------------------------------------------------
    |
    | This value defines the color of the border around the Captcha image.
    | You can use hexadecimal color codes (e.g., #000000) or RGB values.
    |
    */

    'border_color' => '#CCCCCC',

];

