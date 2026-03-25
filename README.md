# Blog-Site-with-Comment-System

## Project Overview
This project is a blog website developed while learning Laravel. The goal of this project was to practice real-world web application development using Laravel, including authentication, role-based access control, CRUD operations, pagination, filtering, comment systems, and admin panel management.

The website allows users to read blog posts, comment on posts, browse categories, and view articles. An admin panel is available to manage posts, articles, users, comments, and website settings.

Role-based access control is implemented using Laravel middleware to restrict admin functionalities.

## Application Overview
### Front-End (Public Website)
#### Home Page
- Displays all blog posts.
- Shows 9 posts per page using pagination.
- Visitors can read posts and view post details.

#### Comment System
- Users must be logged in to comment.
- If a user clicks the comment button without logging in, they are redirected to the login page.
- After successful login, the user is redirected back to the post they were viewing.

#### Categories Page
- Displays all categories.
- Clicking View shows posts related to that category.
- Posts are displayed with pagination.

#### Articles Page
- Displays the latest article added to the system.

#### About Page
- Contains information about the website.

#### Contact Page
- Users can send messages through a contact form.
- Submitted messages are stored and visible in the admin panel.

### Back-End (Admin Panel)
#### Dashboard
Displays important statistics including:
- Total Posts
- Total Users
- Total Views
- Pending Posts
- Admin Accounts
- Categories
- Comments
- Rejected Posts
Also displays:
- Latest 5 Posts
- Latest 5 Comments

#### Post Management
All Posts
- Displays all posts with pagination.
- Search functionality available.
- Filter posts by:
- Status
- Category

#### Rejected Posts
- Shows all rejected posts.
- Includes search functionality.

#### Add New Post
- Admin can create new blog posts.

#### Article Management
All Articles
- Displays all articles with pagination.
- Search functionality available.
- Filter by:
- Status
- Category

#### Add New Article
- Admin can create new articles.

#### User Post Management
- Displays posts submitted by normal users.
- Posts appear in Pending status.
- Admin can Accept or Reject user posts.

#### Category Management
- View all categories
- Create new categories
- Delete categories

#### Comment Management
- Admin can view and manage all comments.

#### User Management
Admin can:
- Create new users
- Delete users

#### Website Settings
Admin can update:
- Site Title
- Tag Line
- Website Logo
- Favicon
- Social Media Links

## Technologies Used
- Laravel
- PHP
- MySQL
- HTML
- CSS
- Bootstrap
- JavaScript

## Key Laravel Concepts Used
- Laravel Authentication
- Middleware
- Role-Based Access Control
- Pagination
- Eloquent ORM
- Blade Template Engine
- Form Validation
- CRUD Operations

## Requirements
- PHP 8.0+
- Composer
- MySQL
- Laravel 10+

## Installation Guide
Follow these 8 steps to install and set up the project:

### Step 1
#### Clone the Repository
```
git clone https://github.com/your-username/your-repository-name.git
cd your-repository-name
```

### Step 2
#### Install Dependencies
```
composer install
```

### Step 3
#### Setup Environment File
```
cp .env.example .env
```

### Step 4
#### Generate Application Key
```
php artisan key:generate
```

### Step 5
#### Configure Database
Update the .env file with your database credentials.
```
DB_DATABASE=blog_site
DB_USERNAME=root
DB_PASSWORD=
```

### Step 6
#### Run Migrations
```
php artisan migrate
```

### Step
#### 7 Run Seeder
```
php artisan db:seed
```

### Step 8
#### Start Development Server
```
php artisan serve
```
Then open:
```
http://127.0.0.1:8000
```

## Learning Objectives
- This project helped practice:
- Laravel MVC Architecture
- Role-based middleware authentication
- Blog system development
- Comment system implementation
- Admin panel management
- Pagination and filtering
- Real-world CRUD operations

Author
- Amit Singha
- Backend Developer (PHP & Laravel)