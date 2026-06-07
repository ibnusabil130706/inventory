# Inventory System API v1

Base URL:

http://localhost:8000/api/v1

---

# Authentication

## Register

### POST /register

Body:

```json
{
    "name": "Ibnu",
    "email": "ibnu@gmail.com",
    "password": "password",
    "password_confirmation": "password"
}
```

Response:

```json
{
    "success": true,
    "message": "User registered",
    "data": {
        "user": {
            "id": 1,
            "name": "Ibnu",
            "email": "ibnu@gmail.com"
        },
        "token": "1|xxxxxxxxxxxxxxxxxxxx"
    }
}
```

---

## Login

### POST /login

Body:

```json
{
    "email": "ibnu@gmail.com",
    "password": "password"
}
```

Response:

```json
{
    "success": true,
    "message": "Login berhasil",
    "data": {
        "token": "1|xxxxxxxxxxxxxxxxxxxx"
    }
}
```

---

# Categories

Semua endpoint Categories memerlukan:

Header:

```text
Authorization: Bearer {token}
Accept: application/json
```

---

## GET /categories

Response:

```json
{
    "success": true,
    "message": "Data kategori berhasil ditampilkan",
    "data": [
        {
            "id": 1,
            "name": "Elektronik"
        }
    ]
}
```

---

## POST /categories

Body:

```json
{
    "name": "Elektronik"
}
```

Response:

```json
{
    "success": true,
    "message": "Kategori dibuat",
    "data": {
        "id": 1,
        "name": "Elektronik"
    }
}
```

---

## GET /categories/{id}

Contoh:

```text
GET /categories/1
```

Response:

```json
{
    "success": true,
    "message": "Data kategori ditemukan",
    "data": {
        "id": 1,
        "name": "Elektronik"
    }
}
```

---

## PUT /categories/{id}

Body:

```json
{
    "name": "Elektronik Update"
}
```

Response:

```json
{
    "success": true,
    "message": "Kategori diperbarui",
    "data": {
        "id": 1,
        "name": "Elektronik Update"
    }
}
```

---

## DELETE /categories/{id}

Admin Only

Response:

```json
{
    "success": true,
    "message": "Kategori dihapus",
    "data": null
}
```

---

# Items

Semua endpoint Items memerlukan:

Header:

```text
Authorization: Bearer {token}
Accept: application/json
```

---

## GET /items

Response:

```json
{
    "success": true,
    "message": "Data item berhasil ditampilkan",
    "data": [
        {
            "id": 1,
            "name": "Laptop",
            "quantity": 10,
            "price": 8000000,
            "category_id": 1
        }
    ]
}
```

---

## POST /items

Body:

```json
{
    "name": "Laptop",
    "quantity": 10,
    "price": 8000000,
    "category_id": 1
}
```

Response:

```json
{
    "success": true,
    "message": "Item dibuat",
    "data": {
        "id": 1,
        "name": "Laptop",
        "quantity": 10,
        "price": 8000000,
        "category_id": 1
    }
}
```

---

## GET /items/{id}

Contoh:

```text
GET /items/1
```

Response:

```json
{
    "success": true,
    "message": "Data item ditemukan",
    "data": {
        "id": 1,
        "name": "Laptop",
        "quantity": 10,
        "price": 8000000,
        "category_id": 1
    }
}
```

---

## PUT /items/{id}

Body:

```json
{
    "name": "Laptop Gaming",
    "quantity": 15,
    "price": 12000000,
    "category_id": 1
}
```

Response:

```json
{
    "success": true,
    "message": "Item diperbarui",
    "data": {
        "id": 1,
        "name": "Laptop Gaming",
        "quantity": 15,
        "price": 12000000,
        "category_id": 1
    }
}
```

---

## DELETE /items/{id}

Admin Only

Response:

```json
{
    "success": true,
    "message": "Item dihapus",
    "data": null
}
```

---

# Error Response

## 401 Unauthorized

```json
{
    "success": false,
    "message": "Unauthenticated."
}
```

## 404 Not Found

```json
{
    "success": false,
    "message": "Data tidak ditemukan"
}
```

## 422 Validation Error

```json
{
    "success": false,
    "message": "Data yang diberikan tidak valid"
}
```

## 500 Internal Server Error

```json
{
    "success": false,
    "message": "Terjadi kesalahan pada server"
}
```