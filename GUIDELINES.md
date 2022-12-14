# Code guidelines

## Table of contents
1. [General](GUIDELINES.md#general)
2. [HTML](GUIDELINES.md#html)
3. [PHP](GUIDELINES.md#php)
4. [CSS](GUIDELINES.md#css)

## General 
Indentation: 3 spaces<br>
Charset: UTF-8

Use camel case when writing code and naming files<br><br>
For naming variables, functions, files etc. use camel case

Some camelCase examples: 
* $exampleVariable = "foo";
* functionFooBar();
* exampleFileName.php

Validate your file befor pushing

* HTML Validator: https://validator.w3.org/#validate_by_input
* CSS Validator:  https://jigsaw.w3.org/css-validator/#validate_by_input

Make sure to leave an empty new line at the end of every page!

## HTML

### Rules
Make sure that you follow the rules and add all required attributes 
for example:
```<img src="" alt="">```
 
## PHP

not yet

## CSS

All CSS must be in the styles/styles.css file
* Follow the scheme for the style.css file
* Our CSS is in groups, we have **media queries**, **HTML tags**, **classes**, **IDs**

### CSS code example
```CSS
/* Media queries */
@font-face {
   
}

/* HTML Tags */
header {
  
}

...

footer {
   
}

/* Classes */

...

/* IDs */
```
