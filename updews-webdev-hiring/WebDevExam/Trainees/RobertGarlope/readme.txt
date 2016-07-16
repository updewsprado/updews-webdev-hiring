
note:

1. I create the MVC format code, this is not a really popular PHP framework, I just wanted to adapt the flow of MVC because it easy to maintain the code.

  a. as you can find out the folder models, views and controllers
	models = all the data processing it doing here
	views = output for html code or json
	controllers = it decides how to responds to users request iether it will goes to views or models
	
  b. This means it follow the url format /controller/actionMethod/param
  
  c. Day9 were also the collarative of exercise work.
 
requirements:
	mod_rewrite should be enable for .htaccess
    database import and please see attachment sql file dews_training.sql
	
installation process:

1. copy the folder like Day1 or Day9 to webroot ex. c:/htdocs/Day9 in order it will work
2. update database details at config/db_config
3. if you want to rename the folder like Day9 to newFolderName then update the BASE_FOLDER at index.php
4. all the variables was located at config/config.php included the Map google Api for findus ballon.

comments:

Day5
	https://disqus.com/ - I think we need a website url to confirm before you can get the plugin.