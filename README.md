Take A Number
=============

Author: [Donald Merand](http://donaldmerand.com) for [Explo](http://www.explo.org)

This is an online ticket counter, like at the RMV (DMV), but on the web! You go to a URL which retains a counter for you. You can increase, or reset the counter, and anybody else looking at that URL will have the counter automatically refreshed.

Did you know that if you want to buy your own RMV take-a-number system they cost [a lot of money](http://www.ayacart.com/takeanumber/sf_catproductlist.asp?sf_p_CID=W3KLLNRIPM1316V3P0GFIC0LNH)?


Usage
-----

The way we use it is as follows:

1. Two people have the counter open. One person (in the back room) wants to tell the other (in the front room) that they are ready for the next "customer" to come in.
2. "Customers" show up all at once, about 100 at a time. They are each given a number from a stack of pre-printed cards (in order).
3. When it's time for the back-office to see another "customer", they increment the counter. The customer sees their number and goes back. It's like the RMV.


Notes
-----

- I'm using Jquery AJAX calls to mimic server pushes to the client. The client page just checks the server to make sure that its number is correct. If it's not, it updates.
- Counters are stored as plain text files on the filesystem. A database could be used, but seemed like overkill for such a simple application. If you want to set this up, your webserver will need read/write access to the `assets/data` directory.
- You might want to schedule a job to clear out the data directory periodically, lest it get crufty.
- I used [SCSS](sass-lang.com) and [CoffeeScript](http://jashkenas.github.com/coffee-script/) on this project (and you should too!).
- I made some special [Rake](http://rake.rubyforge.org/) tasks for watching/compiling the SCSS and CoffeeScript into CSS and JavaScript. Type `rake -T` at the command line to see what's available.


License
-------

[MIT-Licensed](http://www.opensource.org/licenses/MIT). We make no guarantees.
