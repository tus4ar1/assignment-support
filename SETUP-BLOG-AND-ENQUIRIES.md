# Blog and enquiry form setup

This repository is a WordPress application. GitHub stores the code; the live site needs a PHP/WordPress host and a database. Publishing an article happens in WordPress, not by editing GitHub files.

1. Deploy the updated theme and the `assignment-support-enquiries` plugin to your WordPress installation. In **Appearance > Themes**, activate **My best assignment**. In **Plugins**, activate **Assignment Support Enquiries**.
2. In **Pages > Add New**, create and publish a page named **Blog** with the slug `blog`. Leave its content empty. Create a **Home** page if you do not already have one.
3. In **Settings > Reading**, choose **A static page**, set **Homepage** to Home and **Posts page** to Blog. Save. The custom `home.php` archive then lists posts and `single.php` displays each article. In **Settings > Permalinks**, select **Post name** and save if you want clean article URLs.
4. In **Posts > Add New**, write an article, set its featured image and excerpt if desired, then publish. It will appear on the Blog page and, for the latest three posts, in the homepage resources section. Existing posts can be edited from **Posts > All Posts**.
5. In **Settings > Enquiry form**, set **Send enquiries to** to your own email. If it is blank, the plugin uses the WordPress **Settings > General > Administration Email Address**. The form appears on the homepage when the plugin is active; it does not save submissions to the WordPress database.
6. Configure outgoing mail with your hosting provider or a reputable SMTP mail plugin and a verified sender address for your domain. Send a test message using the mail setup, then send a real enquiry from the public form. Check the recipient inbox and spam folder and reply using the visitor email supplied in the notification.

If the site is not deployed yet, a GitHub repository alone cannot run WordPress or deliver email. Hosting, a domain, a database and mail delivery must be configured before the form can be tested end to end.
