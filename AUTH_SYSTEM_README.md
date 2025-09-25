# Authentication System Documentation

## Overview

This CodeIgniter 4 application now includes a complete user authentication system with database connectivity, secure password handling, and user registration capabilities.

## Components Created

### 1. **UserModel.php** (`app/Models/UserModel.php`)
- Handles all user-related database operations
- Features secure password hashing using PHP's `password_hash()`
- Includes user authentication, registration, and validation
- Provides methods for username checking and password updates

### 2. **AuthController.php** (`app/Controllers/AuthController.php`)
- Manages authentication flow (login, registration, logout)
- Handles form validation and error messages
- Manages user sessions
- Provides AJAX endpoint for authentication status checking

### 3. **Registration View** (`app/Views/register.php`)
- Complete registration form with validation
- Responsive design matching the existing black & white theme
- Client-side and server-side validation
- Password visibility toggles and real-time validation

### 4. **Updated Login Form** (`app/Views/index.php`)
- Enhanced login form with proper error handling
- Flash messages for success/error notifications
- CSRF protection
- Link to registration page

### 5. **Database Migration** (`app/Database/Migrations/CreateUsersTable.php`)
- Creates `users` table with proper structure
- Includes default admin user (username: `admin`, password: `admin123`)
- Proper indexing and constraints

### 6. **Updated Routes** (`app/Config/Routes.php`)
- Authentication routes group (`/auth/login`, `/auth/register`, etc.)
- Backward compatibility with existing routes
- AJAX endpoint for authentication checking

## Database Schema

```sql
CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NULL,
    updated_at DATETIME NULL
);
```

## Usage

### Setting Up the Database

1. Run the setup script:
   ```powershell
   .\setup_auth.ps1
   ```

2. Or manually run the migration:
   ```bash
   php spark migrate
   ```

### Available Routes

- **Login**: `/auth/login` or `/login`
- **Registration**: `/auth/register`
- **Logout**: `/auth/logout`
- **Auth Check (AJAX)**: `/auth/check`

### Default Credentials

- **Username**: `admin`
- **Password**: `admin123`

### User Registration

Users can register with:
- Username (3-50 characters, unique)
- Password (minimum 6 characters)
- Password confirmation

### Authentication Flow

1. **Unauthenticated users** are redirected to login page
2. **Login form** validates credentials against database
3. **Successful login** creates session and redirects to dashboard
4. **Session management** maintains authentication state
5. **Logout** destroys session and redirects to login

## Security Features

- **Password Hashing**: Uses PHP's `PASSWORD_DEFAULT` algorithm
- **CSRF Protection**: All forms include CSRF tokens
- **Session Management**: Secure session handling
- **Input Validation**: Both client-side and server-side validation
- **SQL Injection Prevention**: Using CodeIgniter's Query Builder

## Customization

### Adding User Fields

To add more user fields (email, name, etc.):

1. Update the migration file
2. Modify the `UserModel` validation rules and allowed fields
3. Update registration form and controller

### Changing Validation Rules

Modify validation rules in:
- `UserModel.php` (model-level validation)
- `AuthController.php` (controller-level validation)

### Styling

The views use the existing black & white theme with:
- Bootstrap 5.1.3
- Font Awesome 6.0.0
- Custom CSS variables for consistent theming

## Integration with Existing Code

The authentication system integrates seamlessly with your existing ProductController:

- Uses same session service
- Maintains consistent styling
- Preserves existing functionality
- Updates authentication checks to use new session keys

## Testing

1. **Registration**: Visit `/auth/register` and create a new account
2. **Login**: Use `/auth/login` with either the default admin account or newly created account
3. **Protection**: Try accessing `/` without authentication (should redirect to login)
4. **Logout**: Use logout functionality to end session

## Files Modified/Created

### New Files
- `app/Models/UserModel.php`
- `app/Controllers/AuthController.php`
- `app/Views/register.php`
- `app/Database/Migrations/CreateUsersTable.php`
- `setup_auth.ps1`

### Modified Files
- `app/Views/index.php` (updated login form)
- `app/Config/Routes.php` (added authentication routes)
- `app/Controllers/ProductController.php` (updated authentication check)

## Troubleshooting

### Common Issues

1. **Migration fails**: Ensure database connection is configured in `app/Config/Database.php`
2. **Session issues**: Check session configuration in `app/Config/App.php`
3. **Route conflicts**: Ensure no conflicting routes in Routes.php
4. **CSRF errors**: Ensure CSRF tokens are included in forms

### Debugging

- Enable debugging in `.env` file: `CI_ENVIRONMENT = development`
- Check logs in `writable/logs/`
- Use CodeIgniter's built-in debugging tools

## Future Enhancements

Potential improvements you could add:
- Email verification for registration
- Password reset functionality
- User roles and permissions
- Remember me functionality
- OAuth integration (Google, Facebook, etc.)
- Two-factor authentication
- User profile management

---

**System Created by**: Jan Russel E. Peñafiel  
**Date**: <?= date('F d, Y') ?>  
**Framework**: CodeIgniter 4  
**Theme**: Black & White Responsive Design