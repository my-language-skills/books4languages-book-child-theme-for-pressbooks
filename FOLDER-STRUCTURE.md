# Plugin structure
```
themes/books4languages-book-child-theme-for-pressbooks/                         # → Plugin root
├── assets                                                                      # → Assets folder                                                   
│   ├── images                                                                  # → Images folder
│   │   ├── books4languages-header.png                                          # → Books4languages header file png
│   │   ├── books4languages-icon.png                                            # → Books4languages icon file png
│   │   ├── lang-icon.png                                                       # → Lang icon file png
│   │   ├── smdre_assignment.png                                                # → Smdre icon file png
│   │   ├── smdre_audiotrack.png                                                # → Smdre icon file png
│   │   ├── smdre_chrome_reader_mode.png                                        # → Smdre icon file png
│   │   ├── smdre_group_work.png                                                # → Smdre icon file png
│   │   └── smdre_video_library.png                                             # → Smdre icon file png
│   ├── styles                                                                  # → Styles folder
│   │   ├── components                                                          # → components folder
│   │   │   ├── _accessibility.scss                                             # → Accessibility file scss
│   │   │   ├── _colors.scss                                                    # → Colors file scss
│   │   │   ├── _elements.scss                                                  # → Elements file scss
│   │   │   ├── _media.scss                                                     # → Media file scss
│   │   │   ├── _pages.scss                                                     # → Pages file scss
│   │   │   ├── _section-titles.scss                                            # → Section titles file scss
│   │   │   ├── _specials.scss                                                  # → Specials file scss
│   │   │   ├── _structure.scss                                                 # → Structure file scss
│   │   │   └── _toc.scss                                                       # → Toc file scss
│   │   ├── epub                                                                # → Epub folder
│   │   │   ├── _fonts.scss                                                     # → Fonts file scss
│   │   │   └── style.scss                                                      # → Style file scss
│   │   ├── prince                                                              # → Prince folder
│   │   │   ├── _fonts.scss                                                     # → Fonts file scss
│   │   │   └── style.scss                                                      # → Style file scss
│   │   └── web                                                                 # → Web folder
│   │       ├── _fonts.scss                                                     # → Fonts file scss
│   │       └── style.scss                                                      # → Style file scss
│   └── index.php                                                               # → Empty index file php
├── partials                                                                    # → Partials folder
│   ├── content-cover-book-header.php                                           # → Cover book header file php
│   ├── content-cover-metadata.php                                              # → Cover metadata file php
│   ├── content-header-smdre.php                                                # → Content header smdre file php
│   └── content-single.php                                                      # → Single file php
├── .editorconfig     
├── .gitattributes
├── .gitignore
├── composer.json                                                               # → Composer file json
├── composer.lock                                                               # → Composer file lock
├── FOLDER-STRUCTURE.md                                                         # → Folder structure file md
├── footer.php                                                                  # → Footer file php
├── functions.php                                                               # → Function file php
├── header.php                                                                  # → Header file php
├── LICENSE.md                                                                  # → License file md
├── LICENSE.txt                                                                 # → License file txt
├── package-lock.json                                                           # → Package lock file json
├── package.json                                                                # → Package fila json
├── phpcs.ruleset.xml                                                           # → Phpcs ruleset file xml
├── README.md                                                                   # → Readme file md
├── screenshot.png                                                              # → Screenshot file png
├── script.js                                                                   # → Script file js
├── site.webmanifest                                                            # → Site webmanifest
├── smd-relations.css                                                           # → Smd relation file css
├── style.css                                                                   # → file css for all the css template
└── translation-menu.css                                                        # → Translation menu file css
