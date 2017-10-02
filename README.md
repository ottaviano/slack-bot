Slack Image Bot
===============


Description
-----------

The bot uses a list of URLs for retrieving just one and tries to extract the image's URL from response's body
for sending it in slack channel.
The list of URLs is defined in `app/config/parameters.yml`.
The tag `<meta property="og:image">` is searched in the HTTP response and the value of `content` attribute is extracted.

Installation
------------
    git clone git@github.com:ottaviano/slack-bot.git
    cd slack-bot
    composer install

Configuration
-------------
    cp ./app/config/parameters.yml.dist ./app/config/parameters.yml
    vim ./app/config/parameters.yml

- Fill the list of URLs
- Fill the slack configuration: token & channelId

Launch
------
    php script.php
