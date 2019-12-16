# Plugin structure
```
themes/books4languages-book-child-theme-for-pressbooks/                         # → Plugin root
├── assets                                                                      # → Assets folder                                                   
│   ├── images                                                                  # → Images folder
│   │   ├── books4languages-header.png
│   │   ├── books4languages-icon.png
│   │   └── lang-icon.png                                       
│   ├── styles                                                                  # → Styles folder
│   │   ├── components                                                          # → components folder
│   │   │   ├── _accessibility.scss
│   │   │   ├── _colors.scss
│   │   │   ├── _elements.scss
│   │   │   ├── _media.scss
│   │   │   ├── _pages.scss
│   │   │   ├── _section-titles.scss
│   │   │   ├── _specials.scss
│   │   │   ├── _structure.scss
│   │   │   └── _toc.scss
│   │   ├── epub                                                                # → Epub folder
│   │   │   ├── _fonts.scss
│   │   │   └── style.scss
│   │   ├── prince                                                              # → Prince folder
│   │   │   ├── _fonts.scss
│   │   │   └── style.scss
│   │   └── web                                                                 # → Web folder
│   │       ├── _fonts.scss
│   │       └── style.scss              
│   └── index.php                                                               # → Empty index file php
├── partials                                                                    # → Partials folder
│   ├── content-cover-book-header.php                                           # → Cover book header file php
│   ├── content-cover-metadata.php                                              # → Cover metadata file php
│   └── content-single.php                                                      # → Single file php
├── .editorconfig     
├── .gitattributes
├── .gitignore
├── composer.json    
├── composer.lock    
├── FOLDER-STRUCTURE.md    
├── footer.php    
├── functions.php    
├── header.php
├── LICENSE.md                                                                  # → License file md
├── LICENSE.txt                                                                 # → License file txt
├── package-lock.json               
├── package.json
├── phpcs.ruleset.xml
├── README.md                                                                   # → Readme file md
├── screenshot.png
├── script.js
├── site.webmanifest
├── smd-relations.css
├── style.css                                                                   # → file css for all the css template
└── translation-menu.css    
