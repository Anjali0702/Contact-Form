# Contact Form with PHP and MySQL

This is a simple web application that implements a contact form using HTML, PHP, and MySQL. The contact form allows users to submit their contact information and messages, which are then stored in a MySQL database. Additionally, the application sends an email notification to the site owner with the details of the form submission.

## Requirements

To run this project, you need the following:

- A web server (e.g., Apache) with PHP support
- MySQL database server

## Installation and Setup

1. Clone or download this repository to your local machine.
2. Create a new MySQL database for the contact form data.
3. Import the `contact_form.sql` file in the repository to create the necessary table for the form submissions.
4. Open the `process_form.php` file and update the database connection details (servername, username, password, and dbname) with your MySQL server credentials.
5. Set up your web server to serve the `index.html` and `thank_you.html` files.

## Usage

1. Access the contact form through your web server (e.g., http://localhost/contact_form/index.html).
2. Fill in all the required fields (Full Name, Phone Number, Email, Subject, and Message).
3. Click the "Submit" button to submit the form.
4. The form data will be validated, and upon successful validation:
   - The data will be saved to the MySQL database.
   - An email notification will be sent to the site owner's email address with the form submission details.
   - The user will be redirected to a thank-you page (`thank_you.html`).

## Validation Rules

The contact form implements the following validation rules:

- All fields are mandatory.
- The email field must contain a valid email address.

## Folder Structure

- `index.html`: The HTML file containing the contact form.
- `thank_you.html`: The HTML file displayed after successful form submission.
- `process_form.php`: The PHP script to process the form data and send email notifications.
- `contact_form.sql`: SQL file containing the database table structure.

## Author

[Anjali Panda](https://github.com/Anjali0702)

Feel free to contribute, raise issues, or suggest improvements!
