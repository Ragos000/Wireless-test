# Wireless Logic test

## The environment

During development I was using Apache/2.4.41, Php7.4 and Composer 2.4.1.
Assuming that all of the above are installed the autoloader has to be dumped with the "composer dump-autoload" command then the packages have to be installed by issuing the "composer install" command.


## Run the program

The project can be run by executing the index file located in the root folder.
I couldn't finish writing the tests because I encountered an issue, but it can be run with the "./vendor/bin/phpunit --verbose tests" command.


## Notes

I was using Notepad++ as an IDE.
Looking back probably there are better libraries to use for a web crawler then the one that I selected. I picked this one because it seemed simple and straitforward.
I also wanted to implement the sorting of the data but I ran out of time. I wasn't sure if I had to calculate the annual price for the monthly subscriptions or because in that case "Optimum:2 GB Data - 12 Months" would have been the first item.