
# 🥘 Recipe Project (Laravel)

Welcome to the *Recipe Project* repository! This is a full-stack platform built on *Laravel* for a famous chef.

---

## ✨ Features Overview

### 🖥 1. Chef Dashboard (Laravel Blade)
A secure web dashboard for the Chef/Admin to manage content.
* *Recipe CRUD:* Create, View, Update, and Delete recipes.
* *Security:* Admin login feature.

### 📱 2. Mobile API (Laravel REST API)
A dedicated API for the mobile application.
* *Display Recipes:* Fetch all recipes for users.
* *Unique Favourites:* Users can save favourites using their **device_id** (instead of requiring login/registration).
    * Note: Favourites are tied to the device ID, not a user account.

---

## 💾 Data Entities

| Entity | Key Fields | Relationship Note |
| :--- | :--- | :--- |
| *Recipe* | id, name, ingredients, steps | Stores all recipe details. |
| *Favourite* | id, **device_id**, recipe_id | Links a recipe to a specific device. |

---
