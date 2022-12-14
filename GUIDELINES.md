# Code guidelines

## Table of contents
1. [General](GUIDELINES.md#general)
2. [HTML](GUIDELINES.md#html)
3. [PHP](GUIDELINES.md#php)
4. [CSS](GUIDELINES.md#css)
5. [GIT](GUIDELINES.md#git)

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

## Git
### Setting up local repository
1. Clone the repository
```
git clone git@github.com:gtomkiel/GroupB-term2.git
```
2. Navigate to the folder where you have the project files
```
cd GroupB-term2
```
3. Switch to your branch
```
git checkout <branch-name>
```
4. (Optional) Make sure that your branch is up to date
```
git pull
```

### Commiting your changes to github
1. Add files to commit
```
git add .
```
2. Commit your changes locally (Make sure to put descriptive messeage!)
```
git commit -m "<your-messeage>"
```
3. Make sure that your branch is up to date
```
git pull
```
4. Push your changes to GitHub
```
git push
```

### Reverting your push
1. Find the hash of you commit from GitHub
2. Revert your changes
```
git revert <commit-hash>
```
3. Commit your changes
```
git commit -m "<your-messeage>"
```
4. Push your changes
```
git push
```

### Sync your branch to master
1. Make sure you are in your branch
```
git checkout <branch-name>
```
```
git fetch origin
git merge origin/master
```
5. (Optional) Fix possible merge conflicts

### To create a pull request
1. Go to the GitHub repository
2. Click pull requests
3. Make a new pull request
4. Click on your branch
5. Write a title and short description
6. Wait for feedback
