# Kombat Akademy
A strategy guide website for the fighting game *Mortal Kombat 1*. This project was started in 2023 and has since been abandoned (2019 if including the previous installment). All code has been made open source and is free to use. Information and code by Raptor_FGC / RedRaptor10.

The site provides information for character data, frame data, combos, guides, and gameplay. It also includes a Tier Maker for users to create their own tier lists. Much of the site was still in-progress and there was a lot of missing data for combos and guides. All of this required a large effort and ultimately was too much to handle.

|     |     |
| --- | --- |
| ![](/screenshots/character-1.jpg) | ![](/screenshots/character-2.jpg) |
| ![](/screenshots/move-list-table.jpg) | ![](/screenshots/combos.jpg) |
| ![](/screenshots/characters.jpg) | ![](/screenshots/tier-maker.jpg) |

## Features
- General Gameplay Guides
- Character Overviews & Stats
- Move List / Frame Data Viewer
- Combos & Video Guides
- Advanced Filtering Options
- Button Platform Switcher
- Tier Maker ([See Demo](https://redraptor10.github.io/Tier-Maker-MK1/))
- Gameplay Videos
- Teams Page

Last update: 11/19/2024 (ver. 0.289-1113952)

*Note: WordPress site, pages, and database must be set up separately if you want to use the site. I will not provide resources for how to set those up.*

## Deploys
- Copy assets/img to /images
- Copy assets/img/site and assets/img/kameos to /wp-content/uploads/
- Header :
    + Disable title, add logo file assets/img/site/logo.png and avatar.png to Site Icon (Logo & Site Identity)
    + Clear all object in Header Top, Header Main, Header Bottom
    + Insert shortcode [php file="header-top"] to "HTML 1" and put "HTML 1" in Header Top
    + Put Logo in Header Main
    + Put Primary Menu in Header Bottom
    + Menu Sidebar -> Skin Mode (Dark)
- Layouts :
    + Sidebars : set all with "Content (no sidebars)" (Default, pages, blog, search, 404)
    + Page Header -> Display Settings -> Display -> set all to "Hide" (Single, categories, index, search, archive)
    + Page Header -> Cover settings -> Show Title, Show Tagline (Disable)
    + Page Header -> Titlebar settings -> Show Tilte, Show Tagline (Disable)
- Blog:
    + Single Blog Post : Hide Title, Meta, Tags, Author Biography, Related Posts, Comment Form
- Footer:
    + Copyright : clear all object on Footer Sidebar x, insert shortcode [php file="footer"] in Copyright, put Copyright to Footer Bottom
- Pages :
    + About, Term of service, Credit, Donate, Contact, Privacy Policy => use shortcode
    + Characters, Kameos, Move List, Combos, Tier List, Gameplay, Updates, Teams
    + Add one by one character page with parent id (characters page), use shortcode [php file="character"]
    + Add one by one kameo page with parent id (kameos page), use shortcode [php file="kameo"]
    + Fix load move list fail by date format, m-d-Y -> Y-m-d, m/d/Y -> Y/m/d
    + Fix load move list fail when use utf8mb4 encode, replace to * in notes column in move list table
    + Fix load gameplay fail by date format, m-d-Y -> Y-m-d, m/d/Y -> Y/m/d
- Menus :
    + Add to primary menu : Home, Move List, Combos, Kameos, Charracters, Other -> Tier list, Gameplay, Updates, Teams
- Fonts :
    + Install Font Awesome 5 with Font Awesome plugin


## Discontinuation
The project has been discontinued for a combination of reasons: The increasing site costs, too much work and not enough time, little to no motivation, low interest and little usage from users, lack of support/donations, personal dislike of the game, bad past experiences, and so on. I don't see much reason for me to continue, so I am leaving this project to the community.

## Thank You
Thank you to everyone who has helped me with this project. To all those who supported my Patreon and YouTube, and donated in the past, thank you very much for making this possible.

## Tech
- PHP
- JavaScript / CSS / HTML
- WordPress

[Click here for Kombat Akademy - Mortal Kombat 11](https://github.com/RedRaptor10/kombat-akademy-mk11)
