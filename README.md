# Content Management System

## Overview
This is a simple Content Management System (CMS) built with CodeIgniter. It allows users to create, read, update, and delete content, as well as upload associated media files.

## Features
- User authentication (optional)
- Create, edit, and delete content
- Upload multiple media files
- Categorize content
- Validate form inputs

## Requirements
- PHP >= 7.2
- CodeIgniter 3.x
- MySQL or MariaDB

## Installation

### Step 1: Clone the Repository
git clone https://github.com/7ananSaif/content_system.git

### Step 2: Configure the Database
1. Create a new database in MySQL.
2. Update the `application/config/database.php` file with your database credentials.

### Step 3: Set Up the Application
1. Navigate to the project directory:
   cd content_system
2. Import the SQL structure (if provided) into your database.

### Step 4: Run the Application
- Start your local development server:
  php -S localhost:8000 -t index.php
- Access the application in your web browser at:
  http://localhost:8000

## Usage
- Navigate to the homepage to view the list of contents.
- Use the navigation to create new content or edit existing content.
- Upload media files during content creation or editing.

## Contributing
Contributions are welcome! Please fork the repository and submit a pull request for any improvements or bug fixes.

## License
This project is licensed under the MIT License - see the LICENSE file for details.

## Author
Hanan 

## Acknowledgments
- CodeIgniter framework
- Bootstrap for styling