# Simple Broken Site

This page is broken on purpose, there are both PHP and JS errors. None of them are complicated so you shouldn't have to dig much to fix them. The entire setup, fixes, upload to server for review, etc... should take maybe 15-30 minutes, maybe less. There are a few setup steps that I will provide in case you are not familiar with `composer`.

As an additional note this is not the type of code we write. We wanted to provide something simple and easy to setup instead of doing a whole framework setup.

* run `composer install` in the root to get any vendor packages.
    * If you do not have composer installed you will need to work through that part.
* Viewing the index.php page should get you started on fixing the issues.
* Once the issues are fixed upload your site code somewhere we can review it.
* __Bonus Points:__ After the php errors are fixed, copy the index.php to a new file and provide the necessary JS to call the API directly and remove the dependence on the service.php api call.