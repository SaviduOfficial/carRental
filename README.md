# Vehicle Rental System Web Application

A group project for a vehicle rental service web application built using PHP, CSS, and JavaScript. The application allows users to browse available vehicles, register as customers, make bookings, and process payments. Admins can manage customers and vehicles.

## Features

- **User Login/Registration**
- **Browse Vehicles**
- **Bookings**
- **Admin Interface**
- **Payment System**

## Tech Stack

- **Backend:** PHP
- **Frontend:** HTML, CSS, JavaScript
- **Database:** MySQL

## Setup Instructions

1. **Clone the repository**:
    Clone the project into the `htdocs` folder of your XAMPP installation (usually located in `C:\xampp\htdocs`).
    ```bash
    git clone https://github.com/SaviduOfficial/carRental.git C:\xampp\htdocs\carRental
    ```

2. **Install XAMPP**: Download and install XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org).

3. **Start Apache and MySQL**:
   - Open the XAMPP Control Panel.
   - Click on "Start" next to Apache and MySQL to start the servers.

4. **Configure Database**:
   - Open `phpMyAdmin` (usually at `http://localhost/phpmyadmin`).
   - Create a new database and import the SQL file if provided (or configure your database settings).

5. **Set Up Configurations**:
   - Open `config.php` and update the database connection settings with your own.

6. **Access the Application**:
   - Open a browser and go to `http://localhost/carRental` to view the app.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature-name`).
5. Open a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
