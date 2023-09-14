# Person REST API Documentation

This documentation provides an overview of the REST API for managing a "person" resource. This API allows you to perform CRUD (Create, Read, Update, Delete) operations on person records and includes dynamic parameter handling. The API is built using PHP and interfaces with mysql.

## Table of Contents

1. [System Design](#system-design)
2. [Database Structure](#database-structure)
3. [Setup Instructions](#setup-instructions)
4. [API Endpoints](#api-endpoints)
    - [Create a Person](#create-a-person)
    - [Retrieve a Person](#retrieve-a-person)
    - [Update a Person](#update-a-person)
    - [Delete a Person](#delete-a-person)
5. [Request/Response Formats](#requestresponse-formats)
6. [Sample API Usage](#sample-api-usage)
7. [GitHub Repository](#github-repository)

## System Design<a name="system-design"></a>

![System Design](link-to-your-uml-diagram.png)

*Provide a brief description of your system design. Include any relevant UML diagrams or architectural information.*

## Database Structure<a name="database-structure"></a>

*Describe the structure of your database, including tables, fields, and relationships.*

## Setup Instructions<a name="setup-instructions"></a>

### Prerequisites

Before you can use this API, ensure you have the following prerequisites installed:

- PHP (version X.X or higher)
- Your choice of database (e.g., MySQL, PostgreSQL)
- Composer (for managing PHP dependencies)

### Installation

1. Clone the GitHub repository: `git clone https://github.com/your-username/your-repo.git`
2. Navigate to the project directory: `cd your-repo`
3. Install PHP dependencies: `composer install`
4. Configure your database connection in `config.php`.
5. Run database migrations: `php migrate.php`

## API Endpoints<a name="api-endpoints"></a>

### Create a Person<a name="create-a-person"></a>

**Endpoint:** `POST /api`

**Request Body:**

```json
{
    "name": "Test Name",
    "age": 30,
    "email": "johndoe@example.com"
}
```

**Response:**

```json
{
    "message": "Person created successfully",
    "data": {
        "id": 1,
        "name": "John Doe",
        "age": 30,
        "email": "johndoe@example.com"
    }
}
```

### Retrieve a Person<a name="retrieve-a-person"></a>

**Endpoint:** `GET /api/persons/{id}`

**Response:**

```json
{
    "data": {
        "id": 1,
        "name": "John Doe",
        "age": 30,
        "email": "johndoe@example.com"
    }
}
```

### Update a Person<a name="update-a-person"></a>

**Endpoint:** `PUT /api/persons/{id}`

**Request Body:**

```json
{
    "age": 31
}
```

**Response:**

```json
{
    "message": "Person updated successfully",
    "data": {
        "id": 1,
        "name": "John Doe",
        "age": 31,
        "email": "johndoe@example.com"
    }
}
```

### Delete a Person<a name="delete-a-person"></a>

**Endpoint:** `DELETE /api/persons/{id}`

**Response:**

```json
{
    "message": "Person deleted successfully"
}
```

## Request/Response Formats<a name="requestresponse-formats"></a>

*Explain the format of requests and responses, including any error messages.*

## Sample API Usage<a name="sample-api-usage"></a>

*Provide example code snippets or CURL commands for using the API.*

```bash
# Example: Create a Person
curl -X POST -H "Content-Type: application/json" -d '{
    "name": "Jane Smith",
    "age": 25,
    "email": "janesmith@example.com"
}' http://your-api-url/api/persons
```

## GitHub Repository<a name="github-repository"></a>

Find the complete project [HERE](https://github.com/your-username/your-repo)