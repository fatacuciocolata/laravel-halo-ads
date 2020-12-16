<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Halo ads

Halo Ads is a simple application that shows ads filtered by the latest added, can also be filtered by category or by keywords. For better understanding as [Carbon](https://carbon.nesbot.com/docs/) function says (difference for humans) the posted date is being shown in the format "one hour ago".

![homepage](../master/ss/index.png)

Users can post ads just only if they are logged in, log in feature uses Laravel auth. After adding ads, user can edit or delete
them. Requirements for adding a new ad:

-   title
-   description
-   price
-   image (optional)

![post new ad](../master/ss/post_new_Ad.png)

On the ad page (show method), other ads by same author are being displayed to the user.

![post new ad](../master/ss/single-ad.png)

### Database

Halo ads is using [SQLite](https://www.sqlite.org/index.html) as database.
