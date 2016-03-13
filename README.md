# Caldera Members
Simple member plugin for WordPress.

This is a processor that adds the currently logged in user to a "plan". It also provides a function and shortcode for content restriction. That's pretty much it -- build your own custom membership system using [Caldera Forms](https://CalderaForms.com) and our [many fine Caldera Forms add-ons](https://calderawp.com/caldera-forms-add-ons/).

<strong>-- BETA --</strong>

Requires Caldera Forms 1.3.1

BTW: Checking out repo or downloading zip requires `composer update` -- use /releases dir to get built zip.

## Content Restriction
### Shortcode
* Simple:

    `[cf_members plan="your_plan_slug"]I must be a member to see this[/cf_members]`
* Show the join form (must be an existing Caldera Forms)

    `[cf_members plan="your_plan_slug" sign_up="CF12345678" ]I must be a member to see this. If not I will see the form.[/cf_members]`
# PHP Function

```
    <?php
        if( cf_members_has_plan( 'your_plan_slug' ) ) {
            echo "I must be a member to see this";
        }
```

## FAQ
* Does the user have to be logged in?
    Yes.
* Can this plugin, log the user in or register the user?
    No. But our [Users add-on[(https://calderawp.com/downloads/caldera-forms-users-add/) can.
* Can this plugin require payment to join a plan?
    No. But if it is combined with one of [our many payment processors](https://calderawp.com/caldera-forms-add-ons/) you can add one of those earlier in the form. That way payment isn't successful, the plan will not be set.
* This plugin doesn't do much does it?
    Correct. That's the point. There are plenty of quality, fully-featured membership plugins for WordPress. This one is super simple -- just the basics. Build whatever you need by combining it with other Caldera Forms processors.



## PUBLIC REPO FOR WHAT MAY BE A PAID PRODUCT (not sure)
We are experimenting with using public git repos for commercial products. Support will only be provided via our [support system](https://calderawp.com/support/) which requires a valid license. If you are using this plugin please choose to purchase a license to recive support, support our work and 
enable live updates.

[Feel free to report bug here](https://github.com/CalderaWP/cf-members/issues) -- pull requests are accepted.


## License & Copyright
* Copyright 2016  Josh Pollock for CalderaWP LLC.
