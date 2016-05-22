# XdevL theme

Simple but effective Wordpress blogging theme

# How to

In order to build and package this plugin you will need [nodejs](https://nodejs.org) and [grunt](http://gruntjs.com) installed locally on your machine.

Start off by downloading the theme dependencies by running the following command at the root of the theme directory:
```markdown
npm install
```
and build the theme files:
```markdown
grunt
```
Once complete the theme directory should have everything needed in order to work. If it happens to be located under your local Wordpress theme directory, you should be able to edit any files, re-build the theme and directly see the result on your local Wordpress installation.

To automatically build theme files as you change them, issuing the following command will watch out for any changes and re-build the theme accordingly:
```markdown
grunt watch
```

To package the theme as a zipped Wordpress theme file and strip down any unwanted files, symply run:
```markdown
grunt package
```

# LICENSE

This theme is licensed under [GPLV2](http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html).
