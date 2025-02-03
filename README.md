<p align="center">
<a href="https://qtecsolution.com/" target="_blank">
<img src="https://media.licdn.com/dms/image/C510BAQFPADB5GnQEZA/company-logo_200_200/0/1574759253542?e=2147483647&v=beta&t=1cYJ8BJV-mUnLBZlKJEVApQXBj32T6bT2alRbuT_xrw" width="200" alt="qtec Logo">
</a>
</p>

<h1>AI Content Image Generator SAAS</h1>

<div style="display: flex;">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/170px-Laravel.svg.png" width="50px" height="50px" alt="Laravel" class="icon">
    <img src="https://w7.pngwing.com/pngs/187/112/png-transparent-responsive-web-design-html-computer-icons-css3-world-wide-web-consortium-css-angle-text-rectangle-thumbnail.png" width="50px" height="50px" alt="html" class="icon">
    <img src="https://img2.freepng.fr/20180816/rcw/kisspng-cascading-style-sheets-logo-clip-art-css3-html-5b7617f67bd3d6.3499284915344660385072.jpg" width="50px" height="50px" alt="CSS" class="icon">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6a/JavaScript-logo.png/800px-JavaScript-logo.png" alt="JavaScript" width="50px" height="50px" class="icon">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/2560px-Bootstrap_logo.svg.png" width="50px" height="50px"  alt="Bootstrap" class="icon">
</div>  

<h2>Installation</h2>

Welcome to the setup guide for the **AI Content Image Generator SAAS**. This document provides comprehensive steps to install, configure, and run the project in your local environment, using both Docker and a native setup. Follow these instructions to ensure proper configuration.

## Prerequisites

Please ensure you have the following installed on your system:

- **PHP** (version 8.2 or higher)
- **Composer**
- **npm**
- **MySQL** (version 8.0 or compatible, e.g., MariaDB)
- **Git**

## Server Requirements

This application requires a server with the following specifications:

- **PHP** (version 8.2 or higher) with the extensions:
  - BCMath
  - Ctype
  - Fileinfo
  - JSON
  - Mbstring
  - PDO
  - GD
  - Zip
  - PDO MySQL
- **MySQL** (version 8.0) or **MariaDB**
- **Composer**
- **Web Server**: Apache or Nginx



## Setup Options

This guide covers two setup methods:
1. **Using Docker**
2. **Setting Up Locally (Without Docker)**



### Setup with Docker

#### 1. Clone the Repository

```bash
git clone https://github.com/qtecsolution/ai-content-image-generator-saas.git
```

```bash
cd ai-content-image-generator-saas
```

#### 2. Initialize the Project

```bash
make setup
```


The application should now be accessible at [http://localhost](http://localhost).


#### Available Docker Commands

- **Manage Container**

```bash
make docker-up
```
```bash
make docker-down
```

- **Install Dependencies**

```bash
make composer-install
```
```bash
make composer-update
```

- **Set File Permissions**

```bash
make set-permissions
```

- **Generate Application Key**

```bash
make generate-key
```

- **Run Migrations and Seed the Database**

```bash
make migrate-fresh-seed
```

- **Setup Environment File**

```bash
make setup-env
```

---

### Setup Without Docker

#### 1. Clone the Repository

```bash
git clone https://github.com/qtecsolution/ai-content-image-generator-saas.git
```

```bash
cd ai-content-image-generator-saas
```

#### 2. Install PHP Dependencies

Within the project directory, run:

```bash
composer install
```

#### 3. Configure the Environment

Create the `.env` file by copying the sample configuration:

```bash
cp .env.example .env
```

#### 4. Generate Application Key

Secure the application by generating a key:

```bash
php artisan key:generate
```

#### 5. Configure Database

1. **Access MySQL**:

    ```bash
    mysql -u {username} -p
    ```

2. **Create Database**:

    ```sql
    CREATE DATABASE creaify_db;
    ```

3. **Grant User Permissions**:

    ```sql
    GRANT ALL ON creaify_db.* TO '{your_username}'@'localhost' IDENTIFIED BY '{your_password}';
    ```

4. **Apply Changes and Exit**:

    ```sql
    FLUSH PRIVILEGES;
    EXIT;
    ```

5. **Update `.env` Database Settings**:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=creaify_db
    DB_USERNAME={your_username}
    DB_PASSWORD={your_password}
    ```

#### 6. Run Migrations and Seed Data

To set up the database tables and populate them with initial data, run:

```bash
php artisan migrate --seed
```

#### 7. Start the Development Server

To run the application locally, execute:

```bash
php artisan serve
```

Your application will be available at [http://127.0.0.1:8000](http://127.0.0.1:8000).


## Additional Information

- **Seeding**: The database seeder is configured to populate initial data. Run `php artisan migrate --seed` to use it.
- **Environment Variables**: Ensure all necessary environment variables are set in the `.env` file.
- **Database Configuration**: The application is configured for MySQL by default. Update the `.env` file as needed for other database connections.


<h2>Contributing</h2>
<p>This is an open source project and contributions are welcome. If you are interested in contributing, please fork the repository and submit a pull request with your changes. The project maintainers will review and merge your changes accordingly.</p>


<h2>License</h2>
<p>The ai-content-image-generator-saas project is open source and available under the MIT License. You are free to use, modify, and distribute this codebase in accordance with the terms of the license.</p>
<p>Please refer to the LICENSE file for more details.</p>


