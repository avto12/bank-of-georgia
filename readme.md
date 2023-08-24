# WordPress + Webpack Base Theme

### WordPress Projects documentation and startup guide

# Introduction

WordPress is regarded as one of the most robust and popular content management systems out there, hence why Making Science is keen on implementing and selling it to our clients as a nuanced solution for their websites. It allows incredible versatility and the client is faced with an intuitive and easy to use CMS for their content and various needs for their projects. This guide will help any member of the Front-End development team to get started with our curated Base theme and initial configuration of webpack as a starting point for their project.

## Quick Links:

<aside>
➡️ [Theme folder structure](https://www.notion.so/WordPress-Webpack-Base-Theme-d3c2832f6c1b4b5facb6025b09cdb0df)

</aside>

<aside>
➡️ [Webpack folder structure](https://www.notion.so/WordPress-Webpack-Base-Theme-d3c2832f6c1b4b5facb6025b09cdb0df)

</aside>

<aside>
➡️ [Local Dev Environment setup](https://www.notion.so/WordPress-Webpack-Base-Theme-d3c2832f6c1b4b5facb6025b09cdb0df)

</aside>

<aside>
➡️ [Webpack installation and startup](https://www.notion.so/WordPress-Webpack-Base-Theme-d3c2832f6c1b4b5facb6025b09cdb0df)

</aside>

# **Installation and configuration**

Installing the Base theme is as simple as having a clean installation of WordPress (for maximized compatibility, although an already pre-configured installation might work), then within the Themes section of the Administration panel of WP, select the option to upload a new theme, selecting the .ZIP file containing the base theme and subsequently applying said theme after installation is completed.

# **Theme structure**

The theme is structured in a way that respects conventional practices:

- Within the **root** “**_**” folder of the theme, there are folders pertaining to each of the main aspects of visual and logical functionality of a website: CSS (css), JavaScript (js), Images (img) and Fonts (fonts).
    - Within the **CSS** (***css***) folder there are two main folders:
        - The “**SCSS**” (***sass***) folder contains all CSS partials and components of the **SASS** (or ***SCSS***) files that comprehend the visual aspects of the theme.
            - Inside the **SCSS** (***sass***) folder, we find the **`main.scss`** file, which is the node aggregator for every SCSS partial and module that needs to be imported and integrated into the SASS compilation.
                - Inside this folder there is also a “**modules**” folder, where all the SCSS partial should be included for organizational purposes.
        - The “**Vendors**” (***vendors***) folder contains third-party libraries that can be implemented within the theme and provide standardization and common practices for the development of the website; we mainly use Normalize.css, “formValidation”, Slick (for sliders) and, of course, Bootstrap.
    - Within the **JavaScript** (***js***) folder, we can find all of the .JS files that are used as the logical modules for the website. As a rule of thumb, each .JS file should represent a concrete and specific logical component of a module or segment of the website; meaning that the code should be divided into a decentralized structure so that the code itself is more manageable and scalable.
        - Inside this folder is, similar to the CSS aspect of the theme, a “**Vendors**” (***vendors***) folder, which contains any libraries that will be used throughout the project. Just like with CSS, the default libraries that are included in the theme are Bootstrap and “formValidation”.
    - Within the **Images** (***img***) folder, we must include in an organized manner (sectioned and categorized accordingly) all of the images, iconography and graphical assets that will be used on the website. It’s strongly advised to use SVG files whenever possible for iconography.
    - Finally, within the **Fonts** (***fonts***) folder, you will find every font used within the project, either for the main website, for the administration panel of WP or even for third-party libraries that might require a specific font to function properly.
- Within the base folder of the project (on the same level as the root “**_**” folder), you will find different PHP files that pertain to the structure and navigation of the website. This structure is generally dictated by the needs of the project:
    - Files such as **`header.php`** or **`footer.php`** are reusable modules that will be included in the project in several ways, therefore having a “create once, reuse always” approach to these modules is the optimal way of approaching development of a WP-powered website.
    - The **`functions.php`** file includes all the initial configuration aspects of the Theme. Including WordPress functionality, shortcodes, styles and scripts enqueueing, etc.
    - Inside the folder **Functions** “***functions***”, is another folder named “enqueues” which is a customized folder containing two files:
        - The **`enqueuescripts.php`** file contains a function that enqueues the main JS file generated by Webpack to be used by Wordpress, as it’s then injected into the `**header.php**` and therefore included in the entire site. Any script files added to the project ***must*** be added to **`src/index.js`** as an “**`import`**” statement, since **Webpack** will bundle and compile it automatically whenever DEV or PROD builds are made.
        - The **`enqueuestyles.php`** file is, in essence, the same as the “**enqueuescripts.php**” file, but intended for **CSS** files, it holds the same principle: loading and including the compiled **CSS** bundle file generated by **Webpack** into the Wordpress project. Just like with the JS files imported into **`src/index.js`**, any CSS files, SASS partials or modules added to the project ***must*** be added to **`/_/css/styles.scss`** as an “**`@import`**” statement.

That is the basic structure of the theme, once the developer gets acquainted with it, the rest of the development process is “as usual”, since our goal is to utilize WordPress as a CMS only, not as a Front-End framework.

```xml
📂 _
├── 📂 css
│   ├── 📂 sass
│   │   ├── 📁 modules
│   │   │   └── 📝 _partial.scss
│   │   ├── 📝 admin.scss
│   │   └── 📝 main.scss
│   ├── 📁 vendors
│   └── 📝 styles.scss
├── 📁 fonts
├── 📁 img
└── 📂 js
    ├── 📁 vendors
    ├── 📂 modules
    │   └── 📝 _partial.js
    ├── 📝 contact.js
    └── 📝 main.js
```

# **Webpack + WordPress**

Webpack is commonly known as an “assets bundler” that is used as a modular extension of a project, providing it with an enriched environment of compilers, “plugins”, loaders, functionality and tools under a standard packaging system and in a way that is transparent and seamless to the browsers.

In order to comply with the defined structure of the base theme template, new assets added to the project that fall within the scope of CSS and JS files, must be imported into their matrix bundlers respectively:

- CSS/SASS modules ***must*** be imported into the **`/_/css/syles.scss`** matrix file with an “**@import**” declaration (E.g. `**@import "~sass/main";**` ). This includes SASS partials (E.g. **_partial.scss**), vendor or third-party libraries CSS files, etc. Everything ***must*** be imported into this specific file due to Webpack targeting and compiling this as the final **main.css** that’s used in production.
- JS modules ***must*** be imported into the **`/src/main.js`** matrix file with an “**import**” declaration (E.g. `**import "./modules/_partial";**` ), this includes JS partials (E.g. **_partial.js**) and modules. For vendor or third-party libraries, JS files ***must*** be imported into the **`/src/vendor.js`** matrix file with an “**import**” declaration as well. Everything ***must*** be imported into these specific files due to Webpack targeting and compiling these as the final **index.bundle.js** and **vendor.bundle.js** that are used in production.

Part of the versatility that Webpack offers, is the use of different plugins and loaders that can be easily implemented into the project; this base theme template only provides the necessary loaders and plugins to compile SASS and JS files, optimize them and serve as a development or production environment, nonetheless, if you need to include or import new modules to Webpack, remember to properly add them into the corresponding Webpack configuration pack.

- If the module you’re trying to install is intended for ***general*** use, indifferent from the build environment, please add it to the `**webpack.common.js**` file.
- If the module is only intended as a development tool, please add it to the **`webpack.dev.js`** file and note that it will only be compiled and served for the ***Development*** environment.
- If the module is only intended to be used in production, please add it to the **`webpack.prod.js`** file and note that it will only be compiled and served for the ***Production*** environment.

The included modules and plugins in the template are:

```xml
💡 Loaders
├── ✔️ sass-loader
├── ✔️ css-loader
└── ✔️ style-loader

💡 Plugins
├── ✔️ html-webpack-plugin
├── ✔️ clean-webpack-plugin
├── ✔️ mini-css-extract-plugin@2.4.5
└── ✔️ css-minimizer-webpack-plugin
```

The current template file structure of the Webpack installation is as follows:

```xml
📂 MSFrontBase
├── 📁 _
├── 📂 dist
│   ├── 📝 main.bundle.js
│   ├── 📝 vendor.bundle.js
│   └── 📝 main.css
├── 📂 src
│   ├── 📝 index.js
│   └── 📝 vendor.js
├── 📜 package.json
├── 📝 webpack.common.js
├── 📝 webpack.dev.js
├── 📝 webpack.prod.js
└── 🖥️ initwebpack.sh
```

# Local Dev Environment setup

The local development environment must be an Apache/MySQL enabled server on your [localhost](http://localhost); typically this is easily achieved by installing tools like XAMPP/MAMP/WAMP on your machine. Once you have installed your preferred localhost server, follow these steps to start working on a WP project.

1. On the [localhost](http://localhost) public folder directory of your Apache distribution (usually the “`**htdocs**`” folder), place a clean installation of WordPress.
2. Start your **MySQL** server instance, access **phpMyAdmin** and create a new database, remember the name you’ve given it as you’ll need it when installing WordPress.
3. Start your **Apache** server instance and open the [localhost](http://localhost) directory of your project (E.g. `**localhost/wordpress-project**`), this will trigger the installation procedure of **WordPress**; it will ask for your database name, username and password, provide these details and complete installation.
4. Once setup is finished, from within the **Administrator** panel of your WordPress panel, access the **Appearance** panel and click on “**Themes**”, then install the base template by clicking on “**Add new**” at the top and then “**Upload Theme**”. Once installed, activate it.
5. That’s it, now you’ll need to follow instructions to install and setup **Webpack**, which can be found in the section below.

# Webpack i**nstallation and startup**

Note that in order to start working on this template and use it as a launch platform for any project, a few steps need to be followed:

1. Download the theme ZIP into your localhost apache server directory (usually **htdocs** folder for XAMPP/MAMP) and install it as a Theme on the Wordpress Admin panel.
2. On your terminal application, go to the directory containing the theme template, it’s usually located at: **`\wp-content\themes\THEME-TEMPLATE\`**
3. Once in this directory, run the command **`npm install --dev-save webpack webpack-cli`**
4. After the Webpack installation is done, run the command **`npm i`**
5. Start your MAMP/XAMPP/WAMPP server to serve localhost as an apache service.
6. Run the command **`npm run build`** if you want to build the production version of the project and test that everything is compiling correctly.
7. Run the command **`npm start`** if you want to start the development server.
8. All done, start coding!

# ITCSS as a standard

Note that in order to start working on this template and use it as a launch platform for any project, a few steps need to be followed:

For CSS:

- Utilities for specific modifier classes
- Elements for HTML tags only

For PHP:

- Templates for generic blocks