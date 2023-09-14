

# API Documentation

## Overview

This API allows you to perform CRUD (Create, Read, Update, Delete) operations on person records. You can create a new person, update their information, retrieve a person's details, and delete a person's record.

## Endpoints

### Create a New Person

**Endpoint**: `PUT /api`

**Request Format**:

```json
{
    "name": "John Wanjiku",
    "phone": "123456789",
    "email": "johnwan@example.com"
}
```

**Response Format**:

- **Success (HTTP 201 Created)**

```json
{
    "message": "Person created successfully"
}
```

- **Error (HTTP 400 Bad Request)**

```json
{
    "message": "Failed to create person"
}
```

### Update Person Information

**Endpoint**: `PATCH /api/{id}`

**Request Format**:

This will accept variable values also. You can passone, two or three fields to update.

```json
{
    "name": "Updated Name",
    "phone": "987-654-3210",
    "email": "updatedemail@example.com"
}
```

**Response Format**:

- **Success (HTTP 200 OK)**

```json
{
    "message": "Person updated successfully"
}
```

- **Error (HTTP 400 Bad Request)**

```json
{
    "message": "Failed to update person"
}
```

### Retrieve Person Information

**Endpoint**: `GET /api/{id}`

**Response Format**:

- **Success (HTTP 200 OK)**

```json
{
    "person": {
        "id": 1,
        "name": "John Wanjiku",
        "phone": "254123456789",
        "email": "johndoe@example.com"
    }
}
```

- **Error (HTTP 400 Bad Request)**

```json
{
    "message": "Failed to get person"
}
```

### Delete Person

**Endpoint**: `DELETE /api/{id}`

**Response Format**:

- **Success (HTTP 200 OK)**

```json
{
    "message": "Person Deleted"
}
```

- **Error (HTTP 400 Bad Request)**

```json
{
    "message": "Failed to delete person"
}
```

## Sample Usage

Here are some sample API requests and their expected responses:

### Create a New Person

**Request**:

```http
PUT /api
Content-Type: application/json

{
    "name": "Jane Smith",
    "phone": "555-555-5555",
    "email": "janesmith@example.com"
}
```

**Response** (HTTP 201 Created):

```json
{
    "message": "Person created successfully"
}
```

### Update Person Information

**Request**:

```http
PATCH /api/1
Content-Type: application/json

{
    "name": "Updated Name",
    "phone": "712345679",
    "email": "updated@example.com"
}
```

**Response** (HTTP 200 OK):

```json
{
    "message": "Person updated successfully"
}
```

### Retrieve Person Information

**Request**:

```http
GET /api/1
```

**Response** (HTTP 200 OK):

```json
{
    "person": {
        "id": 1,
        "name": "John Wanjiku",
        "phone": "254712345679",
        "email": "updated@example.com"
    }
}
```

### Delete Person

**Request**:

```http
DELETE /api/1
```

**Response** (HTTP 200 OK):

```json
{
    "message": "Person Deleted"
}
```

## Known Limitations and Assumptions

- This API assumes that the incoming data is in JSON format.
- It assumes that phone numbers provided in requests are formatted as "123456789".
- Error responses are in JSON format and include a "message" field to provide information about the error.

## Setting Up and Deploying the API

To set up and deploy this API, follow these steps:

1. Clone the API repository from GitHub.

2. Ensure you have PHP installed on your server or local development environment.

3. Execute `createdb.php` in your browser and update the `database.php` file with your database credentials.

4. Configure your web server (e.g., Apache or Nginx) to serve the API.

5. Start the web server and ensure that PHP is configured to handle PHP scripts.

6. Make API requests using your preferred HTTP client.