<h1>Bus Booking System</h1>

1- Egypt cities as stations [Cairo, Giza, AlFayyum, AlMinya, Asyut...]<br>
2- Predefined trips between 2 stations that cross over in-between stations.<br>
ex: Cairo to Asyut trip that crosses over AlFayyum -firstly- then AlMinya.<br>
3- Bus for each trip, each bus has 12 available seats to be booked by users, each seat has an
unique id.<br>
4- Users can book an available trip seat.<br>

<h4>For example we have Cairo-Asyut trip that crosses over AlFayyum -firstly- then AlMinya:<br>
any user can book a seat for any of these criteria<br>
(Cairo to AlFayyum), (Cairo to AlMinya), (Cairo to Asyut),<br>
(AlFayyum to AlMinya), (AlFayyum to Asyut) or<br>
(AlMinya to Asyut)<br>
if there is an available seat, taking into consideration if the bus is full from Cairo to
AlMinya, the user cannot book any seat from AlFayyum but he can book from AlMinya.</h4>

##To run locally, do the usual:

1- Install the dependencies<br>
npm install

2- Create databse in mysql<br>
mysql -u root -p<br>
mysql>CREATE DATABASE bus_booking_system;

3- Update MySql configuration<br>
update in file .env

5- Run Migration and seeders<br>
php artisan migrate:refresh --seed

5- Start the flask server<br>
php artisan serve

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
